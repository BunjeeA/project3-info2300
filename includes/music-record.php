<?php
$query_string = http_build_query(array(
    "name" => $music_name
));
?>
<a href="/admin-edit?<?php echo $query_string ?>">
    <div class="row-container">
        <div>
            ID: <?php echo htmlspecialchars($id); ?>
        </div>
        <div>
            Name: <?php echo htmlspecialchars($music_name); ?>
        </div>
        <div>
            Artist: <?php echo htmlspecialchars($artist); ?>
        </div>
        <div>
            Album: <?php echo htmlspecialchars($album); ?>
        </div>
        <div>
            Runtime: <?php echo htmlspecialchars($runtime); ?>
        </div>
        <div>
            Tags: <?php echo htmlspecialchars($tags); ?>
        </div>
        <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($album); ?>">
        <a href="<?php echo $source ?>">Source</a>
    </div>
</a>
