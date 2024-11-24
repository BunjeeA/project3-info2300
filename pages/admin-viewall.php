<?php

$page_title = "Admin View All";

$music_query = exec_sql_query(
    $db,
    "SELECT * FROM music;"
);
$music = $music_query->fetchAll();

$tags_table_query = exec_sql_query(
    $db,
    "SELECT * FROM tags;"
);
$all_tags = $tags_table_query->fetchAll();

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

    <title>Admin View All</title>
</head>

<body>
    <main>
        <?php if (!is_user_logged_in()) { ?>

            <h3>Please Log In</h3>

            <?php echo login_form('/admin-viewall', $session_messages); ?>

        <?php } else { ?>
            <h2><?php echo $page_title; ?></h2>
            <a href="<?php echo logout_url(); ?>">Log Out</a>

            <section class="admin-layout">
                <div style="display: flexbox; flex-direction: column;">
                    <h3>Filter By Tag</h3>

                    <?php
                    foreach ($all_tags as $one_tag) {
                        $tagName = $one_tag["tag_name"];

                        include "/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/admin-filter-tag.php";
                    } ?>
                </div>

                <div>
                    <?php
                    foreach ($music as $song) {
                        $id = $song["id"];
                        $music_name = $song["music_name"];
                        $artist = $song["artist"];
                        $image = "public/uploads/music/" . $song["media_name"];
                        $album = $song["album"];
                        $runtime = $song["runtime"];
                        $source = $song["source"];


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

                        if (isset($_GET["tag"])) {
                            $filter_tag = $_GET["tag"];
                            if (strpos(strtoupper($tags), $filter_tag) !== false) {
                                include "/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/music-record.php";
                            }
                        } else {
                            include "/Users/bunjee/Desktop/Projects/info2300/purple-shark-project3-main/includes/music-record.php";
                        }
                    } ?>
                </div>
            </section>
        <?php } ?>
    </main>
</body>

</html>
