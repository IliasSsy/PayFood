<?php
declare(strict_types=1);

namespace App\Controller;

use App\Table\TransactionTable;
use App\Model\Transaction;
use PDO;

class TransactionController
{
    private TransactionTable $transactionTable;

    public function __construct(PDO $dbConnection)
    {
        $this->transactionTable = new TransactionTable($dbConnection);
    }

    public function create(array $data): void
    {
        $transaction = new Transaction(
            null,
            $data['user_id'],
            $data['amount'],
            $data['transaction_type'],
            $data['description'] ?? null
        );

        $this->transactionTable->create($transaction);
    }

    public function getById(int $id): array
    {
        return $this->transactionTable->getById($id);
    }

    public function getAll(): array
    {
        return $this->transactionTable->getAll();
    }
}
