<?php
$name = $_GET['name'];

$query_string = http_build_query(array(
  "name" => $name
));

$get_song = exec_sql_query(
  $db,
  "SELECT * FROM music WHERE music.music_name = \"" . $name . "\";"
);

$song = $get_song->fetchAll();
$song = $song[0];

$id = $song["id"];

$tags_query = exec_sql_query(
  $db,
  "SELECT
   music_tags.music_id as id,
   tags.tag_name as tag_name
   FROM music_tags
   INNER JOIN tags ON music_tags.tag_id = tags.id
   WHERE music_tags.music_id = " . $id . ";"
);
$tag_results = $tags_query->fetchAll();

$tags = "";
foreach ($tag_results as $tag_entry) {
  $tags = $tags . " " . $tag_entry["tag_name"];
}

$sticky_values = array(
  "name" => $song["music_name"],
  "artist" => $song["artist"],
  "album" => $song["album"],
  "runtime" => $song["runtime"],
  "source" => $song["source"]
);

define("MAX_FILE_SIZE", 1000000);

$upload_message = array(
  "gen_error" => false,
  "file_too_large" => false
);

$source = $song['source'];
$media_name = $song['id'];
$media_ext = $song['media_ext'];

if (isset($_POST["sumbit"])) {
  $source = trim($_POST["source"]);
  if ($source == "") {
    $source = NULL;
  }

  $media = $_FILES["media"];

  $new_name = $_POST['song_name'];
  $new_artist = $_POST['artist'];
  $new_album = $_POST['album'];
  $new_runtime = $_POST['runtime'];
  $new_source = $_POST['source'];

  $sticky_values['name'] = $_POST['song_name'];
  $sticky_values['artist'] = $_POST['artist'];
  $sticky_values['album'] = $_POST['album'];
  $sticky_values['runtime'] = $_POST['runtime'];
  $sticky_values['source'] = $_POST['source'];

  $name = $new_name;

  $form_valid = true;

  if ($media["error"] == UPLOAD_ERR_OK) {
    $media_name = basename($media["name"]);
    $media_ext = strtolower(pathinfo($media_name, PATHINFO_EXTENSION));
  }

  if ($form_valid) {
    $update = exec_sql_query(
      $db,
      "UPDATE music
      SET music_name = \"" . $new_name . "\",
          media_name = \"" . $song['id'] . "." . $media_ext . "\",
          media_ext = \"" . $media_ext . "\",
          artist = \"" . $new_artist . "\",
          album = \"" . $new_album . "\",
          runtime = \"" . $new_runtime . "\",
          source = \"" . $new_source . "\"
      WHERE music.id = " . $song['id'] . ";"
    );

    $storage_path = "public/uploads/music/" . $song['id'] . "." . $media_ext;

    move_uploaded_file($media["tmp_name"], $storage_path);
    if (move_uploaded_file($media["tmp_name"], $storage_path) == false) {
      error_log("Could not store uploaded file into system folder.");
    }
  }
}

$query_string = http_build_query(array(
  "name" => $name
));

require_once "/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/sessions.php";
$session_messages = array();
process_session_params($db, $session_messages);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/site.css">

  <title>Admin Edit</title>
</head>

<body>
  <?php if (!is_user_logged_in()) { ?>

    <h3>Please Log In</h3>

    <?php echo login_form('/admin-viewall', $session_messages); ?>

  <?php } else { ?>
    <a href="/admin-viewall">Admin View All</a>
    <a href="<?php echo logout_url(); ?>">Log Out</a>
    <form method="post" action="/admin-edit?<?php echo $query_string ?>" class="baseball-form" enctype="multipart/form-data" novalidate>
      <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>">
      <input id="song_id" type="hidden" name="song_id" value="<?php echo $song["id"]; ?>">

      <label for="song_name">Name:</label>
      <input id="song_name" type="text" name="song_name" value="<?php echo $sticky_values['name']; ?>">

      <label for="artist">Artist:</label>
      <input id="artist" type="text" name="artist" value="<?php echo $sticky_values['artist']; ?>">

      <label for="album">Album:</label>
      <input id="album" type="text" name="album" value="<?php echo $sticky_values["album"]; ?>">

      <label for="runtime">Runtime:</label>
      <input id="runtime" type="text" name="runtime" value="<?php echo $sticky_values["runtime"]; ?>">

      <label for="media">Media:</label>
      <input id="media" type="file" name="media">

      <label for="source">Source:</label>
      <input id="source" type="text" name="source" value="<?php echo $sticky_values["source"]; ?>">

      <button type="submit" name="sumbit">
        Submit Edit
      </button>
    </form>

    <p>The tags for this entry are: <?php echo $tags ?></p>
  <?php } ?>
</body>

</html>
