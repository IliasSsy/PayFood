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
         `transaction_id`,
         `amount`, 
         `status`, 
         `description`, 
         `createdAt`, 
        )
        VALUES 
            (
             :transactionId,
             :amount, 
             :status
             :description, 
             :createdAt,
             )";

        try {
            $preparedResponce = $this->dbConnection->prepare($sqlResponce);
            $preparedResponce->execute($transaction->convertInfoToArray());
            return (int)$this->dbConnection->lastInsertId();
            } catch (PDOException $e) {
                if (str_contains($e->getMessage(), 'Duplicate entry')) {

                    if (str_contains($e->getMessage(), 'transationId')) {
                        throw new RuntimeException('Transaction already exists');
                    }
                }
    }

        function convertInfoToArray(array $transactionInfo): array
        {
            return new Transaction(
                (int)$transactionInfo['userId'],
                (int)$transactionInfo['transactionId'],
                (int)$transactionInfo['amount'],
                $transactionInfo['description'],
                $transactionInfo['createdAt'],
                $transactionInfo['status']
            );
        }
    }

}
