<?php
declare(strict_types=1);

namespace App\Model;

use InvalidArgumentException;
use PDO;
use PDOException;
use RuntimeException;

class TransactionTable
{
    function __construct(private PDO $dpConnection)
    {
    }

    function saveTransactionToDatabase(Transaction $transaction): int
    {
        $sqlResponce = "INSERT INTO `transaction` 
        (
         `amount`, 
         `status`, 
         `description`, 
         `created`, 
         `birth_date`, 
         `email`, 
         `phone`, 
         `avatar_path`
        )
        VALUES 
            (
             :first_name, 
             :last_name, 
             :middle_name, 
             :gender, 
             :birth_date, 
             :email, 
             :phone, 
             :avatar_path
             )";
    }
}
