DROP database Guild;
CREATE datable Guild;
use Guild;

create table User (id int primary key auto_increment, nickname tinytext not null, email string tinytext not null, rank tinyint(1) not null, APIKey varchar(511) not null, fname string tinytext not null, lname string tinytext not null, birthDate DATETIME not null);