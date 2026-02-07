<?php
declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;
use PDO;
use PDOException;
use RuntimeException;

class UserTable
{
    function __construct(PDO $dbConnection)
    {
    }

    function saveUserToDatabase(user $user): int
    {
        $sqlResponce = "INSERT INTO `user` 
        (
         `first_name`, 
         `last_name`, 
         `middle_name`, 
         `email`, 
        )
        VALUES 
            (
             :first_name, 
             :last_name, 
             :middle_name, 
             :email
             )";

        try {
        $preparedResponce = $this->dbConnection->prepare($sqlResponce);
        $preparedResponce->execute($user->convertInfoToArray());
        return (int)$this->dbConnection->lastInsertId();
        } catch (PDOException $e) {
        if (str_contains($e->getMessage(), 'Duplicate entry')) {

            if (str_contains($e->getMessage(), 'email')) {
                throw new RuntimeException('Email already exists');
                }
            }
        throw $e;
        }
    }

    function deleteUserFromDatabase(int $userId): void
    {
        $sqlResponce = "DELETE FROM `user` WHERE `user_id` = :user_id";
        $preparedResponce = $this->dbConnection->prepare($sqlResponce);
        $preparedResponce->execute([':user_id' => $userId]);
    }

    function convertInfoToArray(array $userInfo): array
    {
        return new User(
            (int)$userInfo['user_id'],
            $userInfo['first_name'],
            $userInfo['last_name'],
            !empty($userInfo['middle_name']) ? $userInfo['middle_name'] : null,
            $userInfo['email']

        );
    }
}