<?php
define("MAX_FILE_SIZE", 10000000);

$upload_error = array(
  "general_error" => false,
  "too_large" => false
);

$upload_name = NULL;
$upload_ext = NULL;


if (isset($_POST["upload"])) {
  $upload = $_FILES["media"];
  $form_valid = true;

  $upload_title = trim($_POST["song_name"]);
  $upload_artist = trim($_POST["artist"]);
  $upload_album = trim($_POST["album"]);
  $upload_runtime = trim($_POST["runtime"]);
  $upload_source = trim($_POST["source"]);
  $upload_tag1 = 1;
  $upload_tag2 = 2;

  if ($upload["error"] == UPLOAD_ERR_OK) {
    $upload_name = basename($upload["name"]);
    $upload_ext = strtolower(pathinfo($upload_name, PATHINFO_EXTENSION));

    if (!in_array($upload_ext, array("jpg", "jpeg", "png"))) {
      $form_valid = false;
      $upload_feedback["general_error"] = true;
    }
  } else if (($upload["error"] == UPLOAD_ERR_INI_SIZE) || ($upload["error"] == UPLOAD_ERR_FORM_SIZE)) {
    $form_valid = false;
    $upload_feedback["too_large"] = true;
  } else {
    $form_valid = false;
    $upload_feedback["general_error"] = true;
  }

  if ($form_valid) {
    // insert upload into DB
    $form_submit = exec_sql_query(
      $db,
      "INSERT INTO music (music_name, media_name, media_ext, source, artist, album, runtime) VALUES (:music_name, :media_name, :media_ext, :media_source, :media_artist, :media_album, :media_runtime)",
      array(
        ":music_name" => $upload_title,
        ":media_name" => $upload_name,
        ":media_ext" => $upload_ext,
        ":media_source" => $upload_source,
        ":media_artist" => $upload_artist,
        ":media_album" => $upload_album,
        ":media_runtime" => $upload_runtime
      )
    );

    if ($form_submit) {
      // We successfully inserted the record into the database, now we need to
      // move the uploaded file to it's final resting place: public/uploads directory

      // get the newly inserted record's id
      $record_id = $db->lastInsertId("id");

      // uploaded file should be in folder with same name as table with the primary key as the filename.
      // Note: THIS IS NOT A URL; this is a FILE PATH on the server!
      //       Do NOT include / at the beginning of the path; path should be a relative path.
      //          NO: /public/...
      //         YES:  public/...
      $upload_storage_path = "public/uploads/music/" . $record_id . "." . $upload_ext;

      // Move the file to the public/uploads/clipart folder
      // Note: THIS FUNCTION REQUIRES A PATH. NOT A URL!
      if (move_uploaded_file($upload["tmp_name"], $upload_storage_path) == false) {
        error_log("Failed to permanently store the uploaded file on the file server. Please check that the server folder exists.");
      }
    }
  }
}

$filter_tag = $_GET["tag"] ?? NULL;
$tagId = null;
$showform = TRUE;
$pageHeader = "Songs";

if (in_array($filter_tag, array("RAP", "DRAKE", "TRAVIS SCOTT", "ROCK", "AC/DC", "POP", "MICHAEL JACKSON", "KENDRICK LAMAR", "ANDRE 3000", "THE BEATLES"))) {

  if ($filter_tag == "RAP") {
    $tagId = 1;
    $pageHeader = "Rap Songs";
  } else if ($filter_tag == "DRAKE") {
    $tagId = 2;
    $pageHeader = "Drake Songs";
  } else if ($filter_tag == "TRAVIS SCOTT") {
    $tagId = 3;
    $pageHeader = "Travis Scott Songs";
  } else if ($filter_tag == "ROCK") {
    $tagId = 4;
    $pageHeader = "Rock Songs";
  } else if ($filter_tag == "AC/DC") {
    $tagId = 5;
    $pageHeader = "AC/DC Songs";
  } else if ($filter_tag == "POP") {
    $tagId = 6;
    $pageHeader = "Pop Songs";
  } else if ($filter_tag == "MICHAEL JACKSON") {
    $tagId = 7;
    $pageHeader = "Michael Jackson Songs";
  } else if ($filter_tag == "KENDRICK LAMAR") {
    $tagId = 8;
    $pageHeader = "Kendrick Lamar Songs";
  } else if ($filter_tag == "ANDRE 3000") {
    $tagId = 9;
    $pageHeader = "Kendrick Lamar Songs";
  } else if ($filter_tag == "THE BEATLES") {
    $tagId = 10;
    $pageHeader = "The Beatles Songs";
  }
  $result = exec_sql_query(
    $db,
    "SELECT
    music.id AS id,
    music.music_name,
    music.media_name,
    music.media_ext AS 'file_ext',
    music.source,
    music.artist,
    music.album,
    music.runtime,
    music_tags.id AS music_tags_id,
    music_tags.tag_id
FROM
    music_tags
LEFT JOIN
    music ON music_tags.music_id = music.id
WHERE
    music_tags.tag_id = :tagId",
    array(':tagId' => $tagId)
  );
  $records = $result->fetchAll();
  $result1 = exec_sql_query($db, 'SELECT * FROM tags;');
  $records2 = $result1->fetchAll();
  $showform = FALSE;
} else {
  $result = exec_sql_query(
    $db,
    "SELECT music.id AS id,
    music.music_name AS 'music_name',
    music.media_ext AS 'file_ext',
    music.source AS 'source',
    music.artist AS 'artist',
    music.album AS 'album',
    music.runtime AS 'runtime'
    FROM music"
  );
  $records = $result->fetchAll();
  $result1 = exec_sql_query($db, 'SELECT * FROM tags;');
  $records2 = $result1->fetchAll();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/site.css">

  <title>Music Catalog</title>
</head>

<body>

  <div class="nav">
    <a class="return" href="/">
      <h1>Music Catalog</h1>
    </a>
    <div class="nav-links">
      <!-- <a href="/">Home</a> -->
      <!-- <a href="/admin-viewall">Admin View All</a> -->
      <!-- <a href="/login">Login</a> -->
    </div>
  </div>

  <div class="content">
    <aside>
      <div class="scroll">
        <!-- <h5>Welcome to our music catalog!</h5> -->

        <h1>Filter By Tags:</h1>

        <div class="filter-tags">
          <?php
          $filter = exec_sql_query($db, 'SELECT * FROM tags;');
          $filter_tags = $filter->fetchAll();

          foreach ($filter_tags as $tags) {
            $tagId = $tags["id"];
            $tagName = $tags["tag_name"];

            include "/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/filter-tag.php";
          } ?>
        </div>
      </div>
    </aside>

    <main>
      <?php
      if ($showform == TRUE) {
        include '/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/page-header.php';
        include '/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/form.php';
      }
      else{
        include '/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/page-header.php';
      }

      ?>

      <div id="cardContainer">
        <?php
        foreach ($records as $record) {
          $music_id = $record['id'];
          $song_title = $record['music_name'];
          $source = $record['source'];
          $image = "/public/uploads/music/" . $record["id"] . "." . $record["file_ext"];
          $artist = $record['artist'];
          $album = $record['album'];
          $runtime = $record['runtime'];

          include '/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/card.php';
        }
        ?>
      </div>
    </main>
  </div>

</body>

</html>
