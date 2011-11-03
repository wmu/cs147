create table activity (userid int, time string, type string, entry1 int, entry2 int, entry3 int, primary key(userid, time,type));
create table username (userid int primary key, username string);
create table points (userid int primary key, points int);
