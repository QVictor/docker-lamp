CREATE DATABASE IF NOT EXISTS db;
USE db;

CREATE TABLE `db`.`news` (
                             `id` INT NOT NULL AUTO_INCREMENT ,
                             `title` VARCHAR(256) NOT NULL ,
                             `date` VARCHAR(256) NOT NULL ,
                             `short_content` VARCHAR(256) NOT NULL ,
                             PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `news` (`id`, `title`, `date`, `short_content`)
VALUES (NULL, 'title 1', '2022-03-01 14:58:31', 'short_content 1'),
       (NULL, 'title 2', '2022-03-02 14:58:31', 'short_content 2'),
       (NULL, 'title 3', '2022-03-03 14:58:31', 'short_content 3'),
       (NULL, 'title 4', '2022-03-04 14:58:31', 'short_content 4')