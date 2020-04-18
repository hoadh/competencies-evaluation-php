create table clazzes
(
    id         int auto_increment
        primary key,
    name       varchar(255) not null,
    coach      varchar(255) not null,
    program_id int          not null
);

create table evaluation_details
(
    evaluation_id int not null,
    outcome_id    int not null,
    evaluate      int not null,
    primary key (evaluation_id, outcome_id)
);

create table evaluations
(
    id           int auto_increment
        primary key,
    student_id   int      not null,
    template_id  int      not null,
    created_date datetime null
);

create table outcomes
(
    id           int auto_increment
        primary key,
    title        varchar(500)         not null,
    parent_id    int        default 0 null,
    can_evaluate tinyint(1) default 1 not null,
    template_id  int                  not null,
    `order`      varchar(10)          null
);

create table programs
(
    id   int auto_increment
        primary key,
    name varchar(255) not null,
    type varchar(255) not null
);

create table students
(
    id       int auto_increment
        primary key,
    name     varchar(255) not null,
    code     varchar(255) not null,
    clazz_id int          not null
);

create table templates
(
    id         int auto_increment
        primary key,
    name       varchar(255) not null,
    program_id int          not null
);

