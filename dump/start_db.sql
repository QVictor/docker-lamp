CREATE DATABASE IF NOT EXISTS db;
USE db;



CREATE TABLE `db`.`news`
(
    `id`            INT          NOT NULL AUTO_INCREMENT,
    `title`         VARCHAR(256) NOT NULL,
    `date`          VARCHAR(256) NOT NULL,
    `short_content` VARCHAR(256) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `news` (`id`, `title`, `date`, `short_content`)
VALUES (NULL, 'title 1', '2022-03-01 14:58:31', 'short_content 1'),
       (NULL, 'title 2', '2022-03-02 14:58:31', 'short_content 2'),
       (NULL, 'title 3', '2022-03-03 14:58:31', 'short_content 3'),
       (NULL, 'title 4', '2022-03-04 14:58:31', 'short_content 4');



CREATE TABLE `db`.`category`
(
    `id`         INT(11)      NOT NULL AUTO_INCREMENT,
    `name`       VARCHAR(256) NOT NULL,
    `sort_order` INT(11)      NOT NULL,
    `status`     INT(11)      NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`)
VALUES (NULL, 'Телевизоры', '1', '1'),
       (NULL, 'Холодильники', '2', '1'),
       (NULL, 'Микроволновки', '3', '1');


CREATE TABLE `db`.`product`
(
    `id`             INT(11)      NOT NULL AUTO_INCREMENT,
    `name`           VARCHAR(256) NOT NULL,
    `category_id`    INT(11)      NOT NULL,
    `code`           INT(11)      NOT NULL,
    `price`          FLOAT        NOT NULL,
    `availability`   INT(1)       NOT NULL,
    `brand`          VARCHAR(256) NOT NULL,
    `image`          VARCHAR(256) NOT NULL,
    `description`    TEXT         NOT NULL,
    `is_new`         INT(11)      NOT NULL,
    `is_recommended` INT(11)      NOT NULL,
    `status`         INT(11)      NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;


INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`,
                       `is_new`, `is_recommended`, `status`)
VALUES (NULL, 'Волшебная палочка 1', '1', '1', '20000', '1', 'Ollivander', '/template/images/home/holod_1.jpg',
        'Волшебная палочка (англ. Wand) — орудие каждого волшебника, при помощи которого произнесенное вслух или про себя заклинание, сопровождаемое определённым движением палочки, даёт желаемый результат. Палочка как бы фокусирует в себе волю волшебника и выстреливает преобразующий заряд в нужном направлении. В редких случаях особо сильные маги способны обходиться без волшебной палочки, преобразуя пространство и предметы только силой мысли. Волшебники хранят секрет изготовления и использования палочек, не доверяя его никому из других волшебных разумных созданий.',
        '1', '1', '1')