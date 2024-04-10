-- Création de la DataBase --
DROP database Guild;
CREATE database Guild;
use Guild;

-- Création des tables --
create table User (id int primary key auto_increment, nickname tinytext not null, email string tinytext not null, rank tinyint(1) not null, APIKey varchar(511) not null, 
fname string tinytext not null, lname string tinytext not null, birthDate DATETIME not null);
create table Character (id int primary key auto_increment, level tinyint not null, archetype tinytext not null);
create table Event (id int primary key auto_increment, name tinytext not null, date DATETIME not null, location tinytext not null, ListOfAttendees tinytext not null,
levelMaximum tinyint not null, levelMinimum tinyint not null);
create table Equipment (id int primary key auto_increment, name tinytext not null);
create table Area (id int primary key auto_increment, name tinytext not null, description tinytext not null);
create table InstanceType (id int primary key auto_increment, description tinytext not null);
create table Prerequisites (id int primary key auto_increment, levelMinimum tinyint not null, levelMaximum tinyint not null);
create table APIKey (id int primary key auto_increment, codeAPI varchar(511) not null);
create table Rank (id int primary key auto_increment, name tinytext not null);
create table Message (id int primary key auto_increment, content varchar(1024) not null, date DATETIME not null, title tinytext not null, sender tinytext not null, addressee tinytext not null);
create table Denounciation (id int primary key auto_increment, name tinytext not null);
create table DenounciationType (id int primary key auto_increment, name tinytext not null);

-- Création des clés étrangères --
alter table Area add (numDescription int, foreign key (numDescription) references InstanceType(id));
alter table Denounciation add (numName int, foreign key(numName)references DenounciationType(id));
alter table User add (numSender int foreign key(numSender)references Message(id));
alter table User add (numSender int, numAddressee int, foreign key(numSender) references Message(id), foreign key(numAddressee) references Message(id));