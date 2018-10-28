building SQL tables with postgres
notes

log into database
* heroku pg:psql
* or psql <address>
using postgres
 build the botom tear

 serial is a growing int;
 you can drop and reacreate
 or you can allter table

 COMMANDS:

 '\dt' will show tables
 '\d <name>' will show table
 'DROP TABLE users;' // vary dangerous and powerfull to delete tabel

 CREATE TABLE users
 (
     id SERIAL PRIMARY KEY
   , username VARCHAR(50) UNIQUE NOT NULL
   , password VARCHAR(50) NOT NULL
 );

CREATE TABLE speakers
(
     id SERIAL primary KEY
   , name VARCHAR(100) UNIQUE NOT NULL

);

CREATE TABLE sessions
(
   id serial primary KEY
   , month SMALLINT NOT NULL
   , year SMALLINT NOT NULL

);

CREATE TABLE notes
(
   id serial primary key
   , content TEXT text
   , date date
   , user_id INT NOT NULL REFERENCES users(id)
   , speaker_id INT not NULL REFERENCES speakers(id)
   , session_id INT not NULL REFERENCES sessions(id)

);








CREATE TABLE scriptures
(
   id serial primary KEY
   , book VARCHAR(100)
   , chapter VARCHAR(100)
   , verse VARCHAR(100)
   , content TEXT
);


INSERT INTO scriptures (book, chapter, verse, content) VALUES ('Doctrin and Covenants', '88', '49', '');

insert into scriptures (book, chapter, verse, content)
   values ('Doctrin and Covenants','93','28','He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

insert into scriptures (book, chapter, verse, content)
   values ('Mosiah','16','9','He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

insert into scriptures (book, chapter, verse, content)
 values ('John', '1', '5', 'And the light shineth in darkness; and the darkness comprehended it not.');


 week 05 team work actor movie talbe

 CREATE TABLE actor
(
   id SERIAL PRIMARY KEY
   , name VARCHAR(100) NOT NULL
   , birthyear SMALLINT


);

CREATE TABLE movie
(
   id SERIAL PRIMARY KEY
   , title VARCHAR(100) NOT NULL
   , runtime SMALLINT
   , year SMALLINT

);

CREATE TABLE actor_movie
(
   id SERIAL PRIMARY KEY
   , actor_id INT NOT NULL REFERENCES actor(id)
   , movie_id INT NOT NULL REFERENCES movie(id)

);

INSERT INTO actor(name, birthyear) VALUES ('Adam Sandler', 1967);
INSERT INTO actor(name, birthyear) VALUES ('Chris Prat', 1979);
INSERT INTO actor(name, birthyear) VALUES ('Tom Hanks', 1943)
,('Brad Pitt', 1958);

INSERT INTO movie(title, runtime, year) VALUES ('finding nemo', 123,2000),
('Mission Impossible', 200, 2014), ('Hello Dolly', 30,1932);


INSERT INTO actor_movie(actor_id, movie_id) VALUES (2,3), (1,3), (3,2), (1,1), (2,2), (3,3);

HOW TO GET FROM A SPECIIFIC movie

SELECT * FROM movie WHERE title = 'Mission Impossible';
SELECT * FROM movie WHERE title = '%f%';

SELECT * FROM actor WHERE title = 'Mission Impossible';


SELECT * FROM movie M JOIN actor_movie am ON m.id = am.movie_id;

returns:
 id |       title        | runtime | year | id | actor_id | movie_id
----+--------------------+---------+------+----+----------+----------
  3 | Hello Dolly        |      30 | 1932 |  1 |        2 |        3
  3 | Hello Dolly        |      30 | 1932 |  2 |        1 |        3
  2 | Mission Impossible |     200 | 2014 |  3 |        3 |        2
  1 | finding nemo       |     123 | 2000 |  4 |        1 |        1
  2 | Mission Impossible |     200 | 2014 |  5 |        2 |        2
  3 | Hello Dolly        |      30 | 1932 |  6 |        3 |        3


  SELECT a.name, m.title, year FROM movie M
  JOIN actor_movie am ON m.id = am.movie_id
  JOIN actor a ON am.actor_id = a.id
  WHERE m.title = 'Hello Dolly'
  ORDER BY a.birthyear;

  returns:
       name     |    title    | year
--------------+-------------+------
 Chris Farley | Hello Dolly | 1932
 Adam Sandler | Hello Dolly | 1932
 Chris Prat   | Hello Dolly | 1932



 SELECT id, code, name From course;

 SELECT * FROM note n JOIN course c ON n.course_id = c.id
 WHERE c.id = :course_id;
