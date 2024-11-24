# Project 3, Milestone 2: **Consumer** Design Journey

[← Table of Contents](../design-journey.md)


## Milestone 1 Feedback Revisions
> Explain what you revised in response to the Milestone 1 feedback (1-2 sentences)
> If you didn't make any revisions, explain why.

Fixed sqlite file to avoid duplicate data


## Details Page URL
> Design the URL for the consumer's detail page.
> What is the URL for the detail page?

/entry-details

> What query string parameters will you include in the URL?

| Query String Parameter Name       | Description       |
| --------------------------------- | ----------------- |
| name                              | song's title      |
| id                                | song's id         |


## SQL Query Plan
> Plan the SQL query to retrieve a record from one of your query string parameters.

```
SELECT * FROM music WHERE id = " . $id . ";
```

> Plan the SQL query to retrieve all tag names for a specific record.

```
"SELECT tag_name FROM tags WHERE tags.id = " . $song["tag1"] . " OR tags.id = " . $song["tag2"] . ";"
```


## Contributors

I affirm that I am submitting my work for the consumer requirements in this milestone.

Consumer Lead: Abolaji Awoyomi


[← Table of Contents](../design-journey.md)
