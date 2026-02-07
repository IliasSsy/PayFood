CREATE DATABASE NOT EXISTS PayFood;
USE PayFood;

CREATE TABLE IF NOT EXISTS `transactions`
(
    'transaction_id' INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `amount` DECIMAL(10, 2) NOT NULL,
    `status` VARCHAR(100) NOT NULL,
    `description` VARCHAR(100) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (`transaction_id`)
    UNIQUE INDEX `user_id_idx` (`user_id`)
    INDEX `created_at_idx` (`created_at`)

)

ENGINE = InnoDB
CHARACTER SET = utf8mb4
;