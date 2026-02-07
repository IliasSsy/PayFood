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
         `createdAt`, 
        )
        VALUES 
            (
             :amount, 
             :status
             :description, 
             :createdAt,
             )";
    }
}
