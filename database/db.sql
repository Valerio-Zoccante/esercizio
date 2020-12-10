CREATE DATABASE IF NOT EXISTS cookies_db;
create table cookies (
  id int(8) not null,
  name varchar(45) not null,
  weight varchar(20) not_null,
  calories int(5),
  primary key (id)
);
INSERT INTO cookies
VALUES
  (1, brownies, 200g, 3000),
  (2, strong_chocolate, 215g, 2000),
  (3, dark_chocolate, 215g, 2700),
  (4, white_chocolate, 155g, 1300),
  (5, vegan_cookies, 157g, 1000);

create table ingredients (
  id int(10) not null auto_increment,
  name varchar(45) not null,
  cookie_id int(8),
  primary key (id),
  foreign key(cookie_id) references cookies(id)
);
INSERT INTO ingredients
VALUES
  (cocoa, 2),
  (cocoa, 1),
  (cocoa, 4),
  (cocoa, 5),
  (cocoa, 3),
  (milk, 2),
  (milk, 1),
  (milk, 4),
  (milk, 5),
  (milk, 3),
  (powder, 1),
  (sugar, 2),
  (coffee, 3),
  (butter, 4),
  (egg, 5);
