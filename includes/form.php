<form action="/" method="post" enctype="multipart/form-data">
        <h2>Insert Entry Form:</h2>

        <!-- MAX_FILE_SIZE must precede the file input field -->
        <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>">

        <?php if ($upload_error["too_large"]) { ?>
          <p class="feedback">The file you tried to upload is too big. Please select a file smaller than 10MB.</p>
        <?php } ?>

        <?php if ($upload_error["general_error"]) { ?>
          <p class="feedback">Something went wrong. Please select an JPG, JPEG or PNG file to upload.</p>
        <?php } ?>

        <div>
          <label for="song_name">Song Title:</label>
          <input id="song_name" type="text" name="song_name"">
        </div>

        <div>
        <label for="artist">Artist:</label>
          <input id="artist" type="text" name="artist">
        </div>


        <div>
          <label for="album">Album:</label>
          <input id="album" type="text" name="album">
        </div>


        <div>
          <label for="runtime">Runtime:</label>
          <input id="runtime" type="text" name="runtime">
        </div>


        <div>
          <label for="media">Media:</label>
          <input id="media" type="file" name="media">
        </div>

        <div>
          <label for="source">Media Source:</label>
          <input id="source" type="text" name="source">
        </div>

        <div class="unique">
          <button type="submit" name="upload">Insert Entry</button>
        </div>
      </form>
