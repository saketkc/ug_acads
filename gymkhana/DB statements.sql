CREATE DATABASE iitb;
USE iitb;
/* 'admin' table */
CREATE TABLE admin (username varchar (32) NOT NULL, password varchar (32) NOT NULL);
/* Password is stored as MD5 salted with 'iitbombay' (without quotes) */
/* 'cms' table */
CREATE TABLE cms (id int NOT NULL AUTO_INCREMENT PRIMARY KEY, ldapid varchar (50) NOT NULL, hostel varchar (6) NOT NULL, roomno int NOT NULL, category varchar (10) NOT NULL, subject varchar (255) NOT NULL, complaint varchar (1000) NOT NULL);
/* 'pointstally' table */
CREATE TABLE pointstally (id INT NOT NULL, name varchar (32), sports int, cult int, tech int);
/* 'poster' table */
CREATE TABLE poster (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, path_poster varchar (255) NOT NULL, category varchar (32) NOT NULL, subcat varchar (32) NOT NULL, location varchar (255) NOT NULL, event_date date NOT NULL, contact varchar (255) NOT NULL);
/* Entries in 'admin' table */
INSERT INTO admin (username, password) VALUES ('gsecaaug', md5 ('ishangsecaaugiitbombay'));
INSERT INTO admin (username, password) VALUES ('gsecaapg', md5 ('bandanagsecaapgiitbombay'));
INSERT INTO admin (username, password) VALUES ('gseccult', md5 ('poornagseccultiitbombay'));
INSERT INTO admin (username, password) VALUES ('gsecsports', md5 ('rajeshgsecsportsiitbombay'));
INSERT INTO admin (username, password) VALUES ('gsecha', md5 ('chandramouligsechaiitbombay'));
/* Entries in 'pointstally table' */
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 1', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 2', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 3', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 4', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 5', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 6', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 7', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 8', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 9', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 10', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 11', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 12', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 13', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Hostel 14', 0, 0, 0);
INSERT INTO pointstally (name, sports, cult, tech) VALUES ('Tansa', 0, 0, 0);