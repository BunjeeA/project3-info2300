# Project 3, Milestone 3: **Administrator** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 2 Feedback Revisions
> Explain what you individually revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

Made entire tiles clickable and added JOIN clause to SQL query, also removed id from the string query.


## Edit Form - UPDATE query
> Plan your query to update an entry in your catalog.

```sql
UPDATE music
SET music_name = new_name,
    media = new_media,
    artist = new_artist,
    album = new_album,
    runtime = new_runtime
WHERE music.id = id;
```


## Edit Form - Sample Test Data
> Document sample test data to edit an entry in your catalog.
> Upload a sample file to the `design-plan/admin` folder for us to upload when editing the entry.

**Sample Edit Data:**

- music_name: Passionfruit
- media_name: 1
- media_ext: jpg
- artist: Drak
- album: Less Life
- runtime: 2:00

**Sample Upload File:** `design-plan/admin/1.jpg`


## Contributors

I affirm that I am submitting my work for the administrator requirements in this milestone.

Admin Lead: Richard Berlinghof


[← Table of Contents](../design-journey.md)
