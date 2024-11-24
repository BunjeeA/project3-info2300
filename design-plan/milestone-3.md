# Project 3, Milestone 3: **Team** Design Journey

[← Table of Contents](design-journey.md)

**Make the case for your decisions using concepts from class, as well as other design principles, theories, examples, and cases from outside of class (includes the design prerequisite for this course).**

You can use bullet points and lists, or full paragraphs, or a combo, whichever is appropriate. The writing should be solid draft quality.


## Milestone 2 Team Feedback Revisions
> Explain what your **team** collectively revised in response to the Milestone 2 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

We did not make any collective revisions because our feedback was focused on our individual code.



## File Upload - Types of Files
> What types of files will you allow users to upload?
> Can users upload any type of file? Can user only upload one type of file?
> Or can users upload several different types of files?
> List the file extensions of the types of files your users may upload.

- .jpg, .jpeg, .png

## File Upload - Updated DB Schema
> Plan any updates you need to make to your database schema to support file uploads.
>
> 1. Copy your Project 3 DB Schema for the _entries_ table here.
> 2. Modify the schema to include any file upload information you desire to store in your database.
>    If you don't need to modify anything, explain why.

Entries table name: music

```
CREATE TABLE music (
    id INTEGER NOT NULL UNIQUE,
    music_name VARCHAR(20) NOT NULL,
    media_name VARCHAR(20) NOT NULL,
    media_ext VARCHAR(20) NOT NULL,
    artist VARCHAR(20) NOT NULL,
    album VARCHAR(20) NOT NULL,
    runtime VARCHAR(20) NOT NULL,
    tag1 INTEGER,
    tag2 INTEGER,
    PRIMARY KEY (id AUTOINCREMENT) FOREIGN KEY (tag1) REFERENCES music_tags(tag1_id) FOREIGN KEY (tag2) REFERENCES music_tags(tag2_id)
);
```


## File Upload - File Storage
> Plan the file path to store the uploaded files on the server's file system.
> Store the uploaded files in a subfolder of the `public/uploads` folder using the entries table name as the subfolder name.

public/uploads/albums


## File Upload - Path and URL
> Assume that a user completed the insert/edit entry form.
> The **id** for the new record is **154**.
>
> 1. Plan the file system path to store the uploaded file.
> 2. Plan the URL to load the uploaded file in your website's HTML.

**File System Storage Path:**

```
public/uploads/music/154.jpg
```

**Resource URL:**

```
<picture>
  <img src="<?php echo htmlspecialchars($image); ?>">
</picture>
```


## File Upload - Form Input
> Write the HTML of an `<input>` element that allows users to upload a file.

```html
<input id="media-upload" type="file" name="media" accept=".jpg, .jpeg, .png">
```


## File Upload - PHP File Upload Data
> Use the `name` attribute of the file input you planned above to plan how you will
> access the uploaded file data in PHP using the `$_FILES` superglobal.

> Write the PHP code to access the uploaded file data from the `$_FILES` superglobal.
> Only include the data you will extract from the `$_FILES` superglobal. For example, the file name.
> Hint: <https://www.php.net/manual/en/features.file-upload.post-method.php>

```
$upload = $_FILES["media"];
```


## Filtering by a Tag - Query String Parameters
> Plan the query string for filtering by a tag for the "view all" pages.
> (This plan should be exactly the same for both the consumer and admin views.)
> Include the query string parameter and its value.
> Document the value with the field from your database in all CAPITOL letters.

Example: `?category=ID` where `ID` is the `id` field from the `categories` table.

`?tag=DRAKE` where `DRAKE` is the `tag_name` field from the `tags` table.


## Filtering by a Tag - SQL Query Plan
> Plan the SQL query to retrieve all entries with a specific tag using the query string parameter.

```sql
"SELECT * FROM music WHERE tag1 = :tagId OR tag2 = :tagId",
array(':tagId' => $tagId) ;
```


## Contributors

I affirm that I have contributed to the team requirements for this milestone.

Consumer Lead: Abolaji Awoyomi

Admin Lead: Richard Berlinghof


[← Table of Contents](design-journey.md)
