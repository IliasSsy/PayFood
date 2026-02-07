<?php
declare(strict_types=1);

namespace App\Model;

class Transaction
{
    function __construct(
        private ?int   $transactionId,
        private int  $userId,
        private float $amount,
        private string $status,
        private string $description,
        private string $createdAt
    )
    {
    }

    function getTransactionId(): ?int
    {
        return $this->transactionId;
    }

    function getUserId(): ?int
    {
        return $this->userId;
    }

    function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    function makeArray(): array
    {
        return [
            'transactionId' => $this->transactionId,
            'userId' => $this->userId,
            'amount' => $this->amount,
            'status' => $this->status,
            'description' => $this->description,
            'createdAt' => $this->createdAt
        ];
    }
}