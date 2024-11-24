-- database: ../test.sqlite
-- Note: Do not delete the line above! It is helpful for testing your init.sql file.
CREATE TABLE users (
    id INTEGER NOT NULL UNIQUE,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT)
);

-- password: monkey
INSERT INTO
    users (id, name, email, username, password)
VALUES
    (
        1,
        'Richard Berlinghof',
        'rb788@cornell.edu',
        'richard',
        '$2y$10$QtCybkpkzh7x5VN11APHned4J8fu78.eFXlyAMmahuAaNcbwZ7FH.'
    );

--- Sessions ---
CREATE TABLE sessions (
    id INTEGER NOT NULL UNIQUE,
    user_id INTEGER NOT NULL,
    session TEXT NOT NULL UNIQUE,
    last_login TEXT NOT NULL,
    PRIMARY KEY(id AUTOINCREMENT) FOREIGN KEY(user_id) REFERENCES users(id)
);

--- Tags Table ---
CREATE TABLE tags (
    id INTEGER NOT NULL UNIQUE,
    tag_name VARCHAR(20) NOT NULL UNIQUE,
    PRIMARY KEY (id AUTOINCREMENT)
);

INSERT INTO
    tags (tag_name)
VALUES
    ('Rap');

INSERT INTO
    tags (tag_name)
VALUES
    ('Drake');

INSERT INTO
    tags (tag_name)
VALUES
    ('Travis Scott');

INSERT INTO
    tags (tag_name)
VALUES
    ('Rock');

INSERT INTO
    tags (tag_name)
VALUES
    ('AC/DC');

INSERT INTO
    tags (tag_name)
VALUES
    ('Pop');

INSERT INTO
    tags (tag_name)
VALUES
    ('Michael Jackson');

INSERT INTO
    tags (tag_name)
VALUES
    ('Kendrick Lamar');

INSERT INTO
    tags (tag_name)
VALUES
    ('Andre 3000');

INSERT INTO
    tags (tag_name)
VALUES
    ('The Beatles');

--- Music Table ---
CREATE TABLE music (
    id INTEGER NOT NULL UNIQUE,
    music_name VARCHAR(20) NOT NULL,
    media_name VARCHAR(20) NOT NULL,
    media_ext VARCHAR(20) NOT NULL,
    source VARCHAR(20) NOT NULL,
    artist VARCHAR(20) NOT NULL,
    album VARCHAR(20) NOT NULL,
    runtime VARCHAR(20) NOT NULL,
    PRIMARY KEY (id AUTOINCREMENT)
);

-- 1) Passionfruit
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Passionfruit',
        '1.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/7/70/Drake_-_More_Life_cover.jpg',
        'Drake',
        'More Life',
        '4:58'
    );

-- 2) God's Plan
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        "God's Plan",
        '2.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/9/90/Scorpion_by_Drake.jpg',
        'Drake',
        'Scorpion',
        '3:18'
    );

-- 3) Jimmy Cooks
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Jimmy Cooks',
        '3.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/en/c/c7/Honestly%2C_Nevermind_-_Drake.png',
        'Drake',
        'Honestly, Nevermind',
        '3:38'
    );

-- 4) Fair Trade
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Fair Trade',
        '4.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/en/7/79/Drake_-_Certified_Lover_Boy.png',
        'Drake',
        'Certified Lover Boy',
        '4:51'
    );

-- 5) 90210
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        '90210',
        '5.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/7/7b/Rodeo_-_Album_Cover_by_Travis_Scott%2C_September_4%2C_2015.jpg',
        'Travis Scott',
        'Rodeo',
        '5:39'
    );

-- 6) MY EYES
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'MY EYES',
        '6.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/en/2/23/Travis_Scott_-_Utopia.png',
        'Travis Scott',
        'UTOPIA',
        '4:11'
    );

-- 7) SKELETONS
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'SKELETONS',
        '7.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/pt/6/63/Astroworld_Travis.jpg',
        'Travis Scott',
        'ASTROWORLD',
        '2:25'
    );

-- 8) sdp interlude
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'sdp interlude',
        '8.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/en/6/61/Travis_Scott_-_Birds_in_the_Trap_Sing_McKnight.png',
        'Travis Scott',
        'Birds In The Trap Sing McKnight',
        '3:11'
    );

-- 9) Highway to Hell
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Highway to Hell',
        '9.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/a/ac/Acdc_Highway_to_Hell.JPG',
        'AC/DC',
        'Highway to Hell',
        '3:28'
    );

-- 10) Thunderstruck
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Thunderstruck',
        '10.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/a/a8/Razorsedge.jpg',
        'AC/DC',
        'The Razors Edge',
        '4:52'
    );

-- 11) Hey Ya!
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Hey Ya!',
        '11.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/4/47/Outkast-speakerboxx-lovebelow.jpg',
        'Andre 3000',
        'Speakerboxxx/The Love Below',
        '3:55'
    );

-- 12) You Rock My World
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'You Rock My World',
        '12.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/9/98/Mjinvincible.jpg',
        'Michael Jackson',
        'Invincible',
        '5:37'
    );

-- 13) HUMBLE.
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'HUMBLE.',
        '13.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/en/5/51/Kendrick_Lamar_-_Damn.png',
        'Kendrick Lamar',
        'DAMN.',
        '2:57'
    );

-- 14) Come Together
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Come Together',
        '14.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/4/42/Beatles_-_Abbey_Road.jpg',
        'The Beatles',
        'Abbey Road (Remastered)',
        '4:19'
    );

-- 15) Bombs Over Baghdad
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Bombs Over Baghdad',
        '15.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/0/0b/OutKast_-_Stankonia.JPG',
        'Andre 3000',
        'Stankonia',
        '5:04'
    );

-- 16) Lady Madonna
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Lady Madonna',
        '16.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/b/be/The_Beatles_1_album_cover.jpg',
        'The Beatles',
        '1 (Remastered)',
        '2:16'
    );

-- 17) Beat It
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Beat It',
        '17.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/0/09/Thriller_25_cover.jpg',
        'Michael Jackson',
        'Thriller 25 Super Deluxe Edition',
        '4:18'
    );

-- 18) Alright
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Alright',
        '18.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/en/f/f6/Kendrick_Lamar_-_To_Pimp_a_Butterfly.png',
        'Kendrick Lamar',
        'To Pimp A Butterfly',
        '3:39'
    );

-- 19) One Dance
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'One Dance',
        '19.jpeg',
        'jpeg',
        'https://upload.wikimedia.org/wikipedia/en/a/af/Drake_-_Views_cover.jpg',
        'Drake',
        'Views',
        '2:53'
    );

-- 20) Die Hard
INSERT INTO
    music (
        music_name,
        media_name,
        media_ext,
        source,
        artist,
        album,
        runtime
    )
VALUES
    (
        'Die Hard',
        '20.png',
        'png',
        'https://upload.wikimedia.org/wikipedia/en/e/e1/Kendrick_Lamar_-_Mr._Morale_%26_the_Big_Steppers.png',
        'Kendrick Lamar',
        'Mr. Morale & The Big Steppers',
        '3:58'
    );

---Music_Tags Table ---
CREATE TABLE music_tags (
    id INTEGER NOT NULL UNIQUE,
    music_id INTEGER,
    tag_id INTEGER,
    PRIMARY KEY (id AUTOINCREMENT) FOREIGN KEY (music_id) REFERENCES music(id) FOREIGN KEY (tag_id) REFERENCES tags(id)
);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (1, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (1, 2);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (2, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (2, 2);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (3, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (3, 2);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (4, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (4, 2);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (5, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (5, 3);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (6, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (6, 3);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (7, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (7, 3);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (8, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (8, 3);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (9, 4);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (9, 5);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (10, 4);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (10, 5);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (11, 6);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (11, 9);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (12, 6);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (12, 7);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (13, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (13, 8);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (14, 4);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (14, 10);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (15, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (15, 9);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (16, 6);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (16, 10);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (17, 4);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (17, 7);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (18, 1);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (18, 8);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (19, 6);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (19, 2);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (20, 6);

INSERT INTO
    music_tags (music_id, tag_id)
VALUES
    (20, 8);
