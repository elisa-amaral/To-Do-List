create database to_do_list
CHARACTER SET utf8 COLLATE utf8_general_ci;

use to_do_list;

create table status(
    id int not null primary key auto_increment,
    status varchar(25) not null
);

insert into status(status)values('pending');
insert into status(status)values('done');

create table tasks(
    id int not null primary key auto_increment,
    status_id int not null default 1,
    foreign key(status_id) references status(id),
    task text not null,
    date_time datetime not null default current_timestamp
);