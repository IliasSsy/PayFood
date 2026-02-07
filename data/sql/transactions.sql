USE PayFood;

CREATE TABLE IF NOT EXISTS `transactions`
(
    'transaction_id' INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `amount` DECIMAL(10, 2) NOT NULL,
    `transactionType` VARCHAR(100) NOT NULL,
    `description` VARCHAR(100) DEFAULT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (`transaction_id`)
    UNIQUE INDEX `user_id_idx` (`user_id`)
    INDEX `created_at_idx` (`created_at`)
    INDEX `status_idx` (`transactionType`)

    CONSTRAINT `transactions_user`
        FOREIGN KEY (`user_id`)
        REFERENCES `users` (`user_id`)
        ON DELETE RESTRICT
        ON UPDATE CASCADE

)

ENGINE = InnoDB
CHARACTER SET = utf8mb4
;