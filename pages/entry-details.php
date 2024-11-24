<?php
$id = $_GET['id'];


$get_song = exec_sql_query(
  $db,
  "SELECT music.music_name AS 'music_name',
  music.media_ext AS 'file_ext',
  music.artist AS 'artist',
  music.album AS 'album',
  music.runtime AS 'runtime'
  FROM music
  WHERE id = :id",
  array(':id' => $id)
);
$song = $get_song->fetchAll();
$song = $song[0];

$get_tags = exec_sql_query(
  $db,
  "SELECT
    music_tags.id AS id,
    music_tags.music_id AS music_id,
    music_tags.tag_id AS tag_id,
    tags.id AS tagId,
    tags.tag_name AS tag_name
FROM
    music_tags
JOIN
    tags ON music_tags.tag_id = tags.id
WHERE
    music_tags.music_id = :songId",
  array(':songId' => $id)
);
// $get_tags = exec_sql_query(
//   $db,
//   "SELECT music_tags.id AS id,
//   music_tags.tag1_id AS 'tag1_id',
//   music_tags.tag2_id AS 'tag2_id',
//   tags.tag_name AS 'tag1_name',
//   tags.tag_name AS 'tag2_name'
//   FROM tags JOIN music_tags
//   ON (music_tags.tag1_id = tags.id OR music_tags.tag2_id = tags.id)
//   WHERE music_tags.music_id = :id",
//   array(':id' => $id)
// );

// $tags = $get_tags->fetchAll();

$image = "/public/uploads/music/" . $id . "." . $song["file_ext"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="styles/site.css">

  <title>Entry Details</title>
</head>

<body>
  <div class="nav">
    <a class="return" href="/">
      <h1>Music Catalog</h1>
    </a>
    <div class="nav-links">
      <!-- <a href="/">Home</a> -->
      <!-- <a href="/admin-viewall">Admin View All</a>
      <a href="/login">Login</a> -->
    </div>
  </div>

  <a class="back" href="/">
    <h2>&lt; Back</h2>
  </a>

  <div class="entry">
    <div class="entryLeft">
      <h3><?php echo $song["music_name"]; ?></h3>
      <img src="<?php echo htmlspecialchars($image); ?>" width="500px" height="500px" alt="<?php echo htmlspecialchars($album); ?> Album Cover">
      <a href="<?php echo htmlspecialchars($source); ?>"><p>Source</p></a>
    </div>

    <div class="entryRight">
      <p>Artist: <?php echo $song["artist"]; ?></p>
      <p>Album: <?php echo $song["album"]; ?></p>
      <p>Duration: <?php echo $song["runtime"]; ?></p>
      <p>Tags:</p>

      <div class="tags">
        <?php
        $tags = $get_tags->fetchAll();
        foreach ($tags as $tag) {
          $tagId = $tag["id"];
          $tagName = $tag["tag_name"];

          include "/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/entry-tag.php";
        } ?>
      </div>
    </div>
  </div>

</body>

</html>
