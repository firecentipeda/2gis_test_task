create database test;
create user 'bob'@'localhost' identified by 'pass';
grant all on test.* to 'bob'@'localhost';
use test;
