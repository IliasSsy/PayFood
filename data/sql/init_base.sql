CREATE DATABASE NOT EXISTS PayFood;
USE PayFood;

CREATE TABLE IF NOT EXISTS `user`
(
    `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(255) NOT NULL,
    `middle_name` VARCHAR(255) DEFAULT NULL,
    `last_name` VARCHAR(255) NOT NULL,
    `balance` DECIMAL(10, 2) DEFAULT 0.00,
    `email` VARCHAR(255) NOT NULL,
    `avatar_path` VARCHAR(255) DEFAULT NULL,

    PRIMARY KEY (`user_id`),
UNIQUE INDEX `email_idx` (`email`)
)

ENGINE = InnoDB
CHARACTER SET = utf8mb4
COLLATE utf8mb4_unicode_ci
;
