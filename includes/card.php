<?php
$query_string = http_build_query(array(
    "name" => $song_title,
    "id" => $music_id
));
?>

<a class = "cardA" href="/entry-details?<?php echo $query_string ?>">
    <div class="card">
        <h2><?php echo htmlspecialchars($song_title); ?></h2>
        <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($album); ?> Album Cover">
        <object><a href="<?php echo htmlspecialchars($source); ?>"><p>Source</p></a></object>
    </div>
</a>
