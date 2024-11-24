# Project 3, Milestone 2: **Administrator** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 1 Feedback Revisions
> Explain what you revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

Changed the db schema to avoid duplicate data.


## Edit Page URL
> Design the URL for the administrator's edit page.
> What is the URL for the administrator's edit page?

/admin-edit

> What query string parameters will you include in the URL?

| Query String Parameter Name       | Description       |
| --------------------------------- | ----------------- |
| id                                | id of the song    |
| name                              | name of the song  |


## SQL Query Plan
> Plan the SQL query to retrieve a record from one of your query string parameters.

```
SELECT * FROM music WHERE id = id;
```

The id on the left refers to the field in the music table and the id on the right refers to the id parameter in the query string.

> Plan the SQL query to retrieve all tag names for a specific record.

```
SELECT * FROM tags WHERE id = music.tag1 OR id = music.tag2;
```


## Contributors

I affirm that I am submitting my work for the administrator requirements in this milestone.

Admin Lead: Richard Berlinghof


[← Table of Contents](../design-journey.md)
