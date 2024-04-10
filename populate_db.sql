-- Clean start
DROP database Guild;
CREATE database Guild;
use Guild;

-- Create tables
create table User (id int primary key auto_increment, nickname tinytext not null, email string tinytext not null, rank tinyint(1) not null, APIKey varchar(511) not null, fname string tinytext not null, lname string tinytext not null, birthDate DATETIME not null);

create table Denunciation (id int primary key auto_increment, name tinytext not null);
create table Denunciation_type (id int primary key auto_increment, name tinytext not null);

create table Event (id int primary key auto_increment, date datetime not null, listofAttendees text(1023), location tintytext not null);

create table Area (id int primary key auto_increment, name tinytext not null, description string tinytext not null);
create table Instance_type (id int primary key auto_increment, description tinytext not null, levelMinimum tinyint(255) not null, levelMaximum tinyint(255) not null);

create table Character (id int primary key auto_increment, archetype tinytext not null, level tinyint(255) not null);

create table Rank (id int primary key auto_increment, name tinytext not null);

create table Equipment (id int primary key auto_increment, name text(1023) not null);

create table Message (id int primary key auto_increment, title tinytext not null, contents text(65535) not null, date datetime not null, sender tinitext not null, addressee tinytext not null);

-- Create foreign key to grant jointures capability.
alter table Area add (numDescription int, foreign key(numDescription) references Instance_type(id));

alter table Denunciation add (numName int, foreign key(numNuame) references Denunciation_type(id));

alter table User add (numSender int, numAddressee int, foreign key(numSender) references Message(id), foreign key(numAddressee) references Message(id));