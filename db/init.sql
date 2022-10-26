CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT,DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;
CREATE TABLE IF NOT EXISTS users (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  login VARCHAR(20) NOT NULL,
  password VARCHAR(40) NOT NULL,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS products (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  price INTEGER,
  PRIMARY KEY (ID)
);
CREATE TABLE IF NOT EXISTS orders (
    ID INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    price INTEGER,
    PRIMARY KEY (ID)
);
INSERT INTO users (login, password)
SELECT * FROM (SELECT 'vadim', '{SHA}QL0AFWMIX8NRZTKeof9cXsvbvu8=') AS tmp
WHERE NOT EXISTS (
    SELECT login FROM users WHERE login='vadim' AND password='123'
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Americano', 80) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Americano' AND price = 80
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Latte', 100) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Latte' AND price = 100
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Cappuccino', 100) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Cappuccino' AND price = 100
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Espresso', 50) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Espresso' AND price = 50
) LIMIT 1;

INSERT INTO products (name, price)
SELECT * FROM (SELECT 'Moccaccino', 125) AS tmp
WHERE NOT EXISTS (
    SELECT name FROM products WHERE name = 'Moccaccino' AND price = 125
) LIMIT 1;
INSERT INTO orders (name, price)
SELECT * FROM (SELECT 'Gregory', 195) AS tmp
WHERE NOT EXISTS (
        SELECT name FROM orders WHERE name = 'Gregory' AND price = 300
    ) LIMIT 1;

INSERT INTO orders (name, price)
SELECT * FROM (SELECT 'Andrew', 250) AS tmp
WHERE NOT EXISTS (
        SELECT name FROM orders WHERE name = 'Andrew' AND price = 280
    ) LIMIT 1;
