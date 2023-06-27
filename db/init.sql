DROP table if exists esgi_user;

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
