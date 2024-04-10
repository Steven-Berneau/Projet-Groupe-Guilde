-- Clean start
DROP database Guild;
CREATE database Guild;
use Guild;

-- Create tables
create table User (id int primary key auto_increment, nickname tinytext not null, email string tinytext not null, fname string tinytext not null, lname string tinytext not null, birthDate DATETIME not null);

create table API_key (id int primary key auto_increment, api_key varchar(511) not null);

create table Denunciation (id int primary key auto_increment, name tinytext not null);
create table Denunciation_type (id int primary key auto_increment, name tinytext not null);

create table Event (id int primary key auto_increment, date datetime not null, listofAttendees text(1023), location tintytext not null);

create table Area (id int primary key auto_increment, name tinytext not null, description string tinytext not null);
create table Instance_type (id int primary key auto_increment, description tinytext not null, levelMinimum tinyint(255) not null, levelMaximum tinyint(255) not null);

create table Character (id int primary key auto_increment, archetype tinytext not null, level tinyint(255) not null);

create table Rank (id int primary key auto_increment, name tinytext not null);

create table Equipment (id int primary key auto_increment, name text(1023) not null);

create table Message (id int primary key auto_increment, title tinytext not null, contents text(65535) not null, date datetime not null, sender int not null, addressee int not null, foreign key (sender) references User(id), foreign key (addressee) references User(id));

-- Create foreign key to grant jointures capability.
alter table Area add (numDescription int, foreign key(numDescription) references Instance_type(id));

alter table Denunciation add (numUser int, numName int, foreign key numUser() references User(id), foreign key(numName) references Denunciation_type(id));

alter table Event add (numUser int, numEquipment int, numCharacter int, numArea int, foreign key (numUser) references User(id), foreign key (numEquipment), references Equipment(id), foreign key (numCharacter) references Character(id), foreign key (numArea) references Area(id));

alter table User add (numAPI_key int, numCharacter int, numRank int, foreign key (numAPI_key) references API_key(id), foreign key (numCharacter) references Character(id), foreign key (numRank) references Rank(id));
