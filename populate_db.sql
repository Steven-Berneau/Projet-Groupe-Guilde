-- Clean start
DROP database if exists Guild;
CREATE database if not exists Guild;
use Guild;

-- Create tables
create table `User` (id int primary key auto_increment, nickname tinytext not null, email tinytext not null, `password` tinytext not null, fname tinytext not null, lname tinytext not null, birthDate DATETIME not null);

create table `API_key` (id int primary key auto_increment, api_key varchar(511) not null);

create table `Denunciation` (id int primary key auto_increment, description text(65535) not null);

create table `Denunciation_type` (id int primary key auto_increment, label tinytext not null);

create table `Event` (id int primary key auto_increment, date datetime not null, levelMinimum tinyint(255) default 1 not null, levelMaximum tinyint(255) not null);

create table `Area` (id int primary key auto_increment, name tinytext not null, description tinytext not null);

create table `Instance_type` (id int primary key auto_increment, description tinytext not null);

create table `Character` (id int primary key auto_increment, archetype tinytext not null, level tinyint(255) not null);

create table `Rank` (id int primary key auto_increment, name tinytext not null);

create table `Equipment` (id int primary key auto_increment, gear text(1023) not null);

create table `Message` (id int primary key auto_increment, title tinytext not null, contents text(65535) not null, date datetime not null);
-- table de liaisons

create table `Participates` (id int primary key auto_increment, numCharacter int not null, numEvent int not null, foreign key(numCharacter) references `Character`(id), foreign key (numEvent) references `Event`(id));


-- Create foreign key to grant jointures capability.

-- describes
alter table `Area` add (numDescription int, foreign key(numDescription) references `Instance_type`(id));

-- writes, receives
alter table `Message` add (sender int not null, addressee int not null, foreign key (sender) references `User`(id), foreign key (addressee) references `User`(id));

-- reports, defines, to_be_reported
alter table `Denunciation` add (numUser int, numUserDenunciated int, numTypeDenunciation int, foreign key (numUser) references `User`(id), foreign key(numUserDenunciated) references `User`(id), foreign key(numTypeDenunciation) references `Denunciation_type`(id));

-- organizes, requires, occurs
alter table `Event` add (numUser int, numEquipment int, numArea int, foreign key (numUser) references `User`(id), foreign key (numEquipment) references `Equipment`(id), foreign key (numArea) references `Area`(id));

-- entitles
alter table `User` add (numRank int, foreign key (numRank) references `Rank`(id));

alter table `Character` add (numUser int, foreign key (numUser) references User(id));

alter table `API_key` add (numUser int, foreign key (numUser) references User(id));