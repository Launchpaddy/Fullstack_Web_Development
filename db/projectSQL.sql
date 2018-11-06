
//CREATE DATABASE perform;

CREATE TABLE users
(
   id SERIAL NOT NULL PRIMARY KEY
   , display_name VARCHAR(75) NOT NULL
   , username VARCHAR(75) UNIQUE NOT NULL
   , password VARCHAR(75) NOT NULL
);

CREATE TABLE sports
(
   id SERIAL NOT NULL PRIMARY KEY
   , name VARCHAR(75) NOT NULL
   , user_id INT NOT NULL REFERENCES users(id)

);

CREATE TABLE activities
(
    id SERIAL NOT NULL PRIMARY KEY
   , name VARCHAR(75) NOT NULL
   , day DATE
   , place VARCHAR(50)
   , hour_duration SMALLINT
   , inviroment_quality SMALLINT
   , sport_id INT NOT NULL REFERENCES sports(id)
   , performance_level SMALLINT
   , fun_level SMALLINT
   , health SMALLINT

);


INSERT INTO activities (name, day, place, sport_id)
VALUES ('Serving', '10/19/2018', 'Icenter' '11'), ('passing', '10/5/2018', 'Hart', '11');

INSERT INTO activities (name, day, place, sport_id)
VALUES ('Passing', '10/1/2018', 'Upper Field', '13'), ('Corner Kicks', '10/7/2018', 'park', '13');

INSERT INTO activities (name, day, place, sport_id)
VALUES ('Jump Shots', '9/3/2018', 'Icenter', '12'), ('Free Throughs', '9/13/2018', 'Messa Falls', '12');

INSERT INTO activities (name, day, place, sport_id)
VALUES ('Backhand', '10/8/2018', 'Heritage', '14'), ('Forhands', '10/9/2018', 'Apt', '14');


CREATE TABLE performance
(
   id SERIAL NOT NULL PRIMARY KEY
   , name VARCHAR(75) NOT NULL
   , performance_level SMALLINT
   , fun_level SMALLINT
   , health SMALLINT
   , activitie_id INT NOT NULL REFERENCES activities(id)

);

INSERT INTO performance (name, performance_level, fun_level, activitie_id)
VALUES ('NAME', '75', '80', '8'), ('NAME', '90', '60', '9')
,('NAME', '80', '90', '10'), ('NAME', '30', '40', '11')
, ('NAME', '78', '80', '12'), ('NAME', '65', '40', '13')
, ('NAME', '90', '90', '14'), ('NAME', '100', '100', '15');

INSERT INTO users (display_name, username, password)
VALUES ('Collin Hauter', 'JackedWagon', '#mormon'),
('Skyler MrSteal yo girl', '#better', 'password');



INSERT INTO sports (name, user_id) VALUES ('Volleyball', '2'),
('Basketball', '34'), ('Soccer', '3'),
('Ping Pong', '35');



