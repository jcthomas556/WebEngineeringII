CREATE TABLE users(
   user_id serial PRIMARY KEY,
   username VARCHAR (255) UNIQUE NOT NULL,
   user_password VARCHAR (225) NOT NULL			
);


INSERT into users (username, user_password) 
VALUES (
    '$username',
    '$passwordHashed'
    );
