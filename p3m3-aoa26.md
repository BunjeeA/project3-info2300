# Project 3, Milestone 3 (p3m3) Grade


**Student's NetID:** aoa26


**Grader Instructions:** Open the student's submission in **Chrome/Chromium**. Launch the development PHP server from the **Run** menu and select **Start Debugging**. No credit is provided if the website is not visible or functional when launching via this method.

- Grade the design journey using Codespace's "Markdown: Open Preview."
- All files must be in the location specified in the assignment's requirements for credit.
- No credit is provided for submitting design and/or code that is taken from the course-provided examples.
- No credit is provided for using methods that are not covered in this class.
- Code must successfully execute and render in the web browser for credit. We are unable to provide partial credit for code that does not execute or fails to render in the browser.


## _Team_ Design Process & Planning
_full or no credit; no partial credit_

**Grader Instructions:** If both team members signed the _team_ design journey, their grades are the **same** for this section.

- (2 / 2) File upload types, database schema, file storage, paths, and URLs are planned.
- (2 / 2) Query string parameters and SQL query planned for filtering by a tag.

**_Team_ Design Process & Planning Total: (4 / 4)**
> Explanation for points lost:


---


**Grader Instructions:** Check the **consumer** lead and **admin** lead's NetIDs in _design-journey.md_. Specify below whether you are grading the **consumer** or **admin** lead's work. (Do not specify their NetID, specify their _role_ instead.)


**_Individual_ Role:** Consumer


## _Individual_ Design Process & Planning
_full or no credit; no partial credit_

- (2 / 2) INSERT/UPDATE query planned.
- (2 / 2) Sample insert/edit form data provided.

**_Individual_ Design Process & Planning Total: (4 / 4)**
> Explanation for points lost:


## _Individual_ Media Seed Files
_full or no credit; no partial credit_

- (2 / 2) Seed media files exist in a `public/uploads/TABLE_NAME` folder.
- (2 / 2) Each seed media file is named using the `id` field of the `entries` table.
- (2 / 2) All placeholder media is replaced with actual media files and is visible within the consumer/admin view all page.

**_Individual_ Media Seed Files Total: (6 / 6)**
> Explanation for points lost:


## _Individual_ Insert/Edit Form
_full, half, or no credit_

**Grader Instructions:**

- Test the insert/edit form using the sample data provided in the design journey.
- If no sample data is provided, use your own data and test it once. If your test data does not work, grade the form as non-functional.
- For each item below, its implementation must be functional for credit. No partial credit is provided for non-functional code.
- If admin portion of website is not implemented when grading a consumer lead, locate the URL for the insert page from `router.php` and manually navigate to the insert page to grade the form.

- (4 / 4) The insert/edit form inserts/updates an entry's non-media data into the database.
- (8 / 8) The insert/edit form uploads a media file and stores it on the server's file system.
  - No credit if the file is stored _inside_ the database.
- (4 / 4) Uploaded media files are stored with a `public/uploads/TABLE_NAME/ID.EXT` **path**.
  - Each media file should be named using the `id` field of the corresponding database record.
  - Each file should have a file extension.
- (0 / 4) The newly uploaded media file is immediately visible in the insert/edit page (or the consumer/admin view all page).
  - No credit if the page must be refreshed to see the new media file.

**_Individual_ Insert/Edit Form Total: (16 / 20)**
> Explanation for points lost:
> -4 Your newly uploaded media file is not immediately visible in insert page.


## _Individual_ Filtering by a Tag
_full, half, or no credit_

**Grader Instructions:**

- Grade this section using the consumer/admin view all page.
- Test filtering with at least 2 tags separately.

- (4 / 4) **All** tags are rendered from the _tags_ table in the database.
  - No credit if the tags are hard-coded in the HTML.
  - No credit if not all _tags_ from the database are rendered.

- (8 / 8) All tag filters are implemented with `<a>` elements and query string parameters.
  - `http_build_query()` is used to generate a secure query string for each tag filter.
  - No credit for tag filters implemented with a `<form>` element.

- (0 / 8) A single SQL query is used to retrieve all entries for a specific tag.
  - The query **only** retrieves the entries for a specific tag.
  - A `WHERE` clause is used to filter the entries by a specific tag.
  - The SQL query includes at least one `JOIN` clause.
  - No credit if additional entries are retrieved that are not for the specific tag.
  - No credit if a loop is used to query the database multiple times to retrieve the entries.
  - No credit if a loop is used with a conditional statement to filter entries.

**_Individual_ Filtering by a Tag Total: (12 / 20)**
> Explanation for points lost:
> -8 You are using a loop with conditionals to filter entries


## Overall

- [x] Student has made good progress on their project.
- [x] Student does not have outstanding issues that will limit our ability to grade their final submission.
    (i.e. missing files, files in incorrect locations, no images in markdown preview, absolute resource URLs, sideways images in design journey, etc.)

> **What did the student do well?**
> Nice job with implementing your form! You have nicely structured code.

> **Do you have any additional feedback for the student?**
> You're very close with updating the media on the page right when the form is uploaded. Make sure you query all of the newly inserted results as the last thing you do before you run the page. Right now your database is incorrect for tagging items. Make sure that your `music` table does not have any tags inside of it and that your `music_tags` table has 1 tag per row per item, not two. This leads to you having to use conditionals to filter entries which will not satisfy the assignment requirements.

**Overall Total: (42 / 54)**
