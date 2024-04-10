-- Clean start
DROP database Guild;
CREATE datable Guild;
use Guild;

-- Create tables
create table User (id int primary key auto_increment, nickname tinytext not null, email string tinytext not null, rank tinyint(1) not null, APIKey varchar(511) not null, fname string tinytext not null, lname string tinytext not null, birthDate DATETIME not null);

create table Denunciation (id int primary key auto_increment, name tinytext not null);
create table Denunciation_type (id int primary key auto_increment, name tinytext not null);

create table Event (id int primary key auto_increment, date DATETIME not null, listofAttendees text(1023), location tintytext not null, levelMinimum tinyint(255), levelMaximum tinyint(255) not null);

-- Create foreign key to grant jointures capability.
