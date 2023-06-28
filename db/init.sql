DROP table if exists esgi_user;
DROP table if exists esgi_film;
DROP table if exists esgi_note;
DROP table if exists esgi_comment;

CREATE TABLE esgi_user (
     id SERIAL PRIMARY KEY,
     firstname VARCHAR(60) NOT NULL,
     lastname VARCHAR(120) NOT NULL,
     email VARCHAR(255) NOT NULL,
     pwd VARCHAR(255) NOT NULL,
     country VARCHAR(255) NOT NULL,
     token VARCHAR(255) DEFAULT NULL,
     status INT NOT NULL,
     date_inserted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     date_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     UNIQUE (email)
);


CREATE TABLE esgi_film (
     id SERIAL PRIMARY KEY,
     title VARCHAR(255) NOT NULL,
     description VARCHAR(255) NOT NULL,
     year INTEGER,
     length INTEGER,
     category VARCHAR(255)
);


CREATE TABLE esgi_note (
   id SERIAL PRIMARY KEY,
   film_id INTEGER NOT NULL,
   user_id INTEGER NOT NULL,
   note INTEGER,
   FOREIGN KEY (film_id) REFERENCES esgi_film (id),
   FOREIGN KEY (user_id) REFERENCES esgi_user (id)
);

CREATE TABLE esgi_comment (
     id SERIAL PRIMARY KEY,
     film_id INTEGER NOT NULL,
     user_id INTEGER NOT NULL,
     content TEXT,
     date_inserted TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
     FOREIGN KEY (film_id) REFERENCES esgi_film (id),
     FOREIGN KEY (user_id) REFERENCES esgi_user (id)
);
