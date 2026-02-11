<?php
declare(strict_types=1);

namespace App\Model;

class Transaction
{
    function __construct(
        private ?int   $transactionId,
        private int  $userId,
        private float $amount,
        private string $transactionType,
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

    function getTransationType(): string
    {
        return $this->transactionType;
    }

    public function setTransationType(string $status): void
    {
        $this->transactionType = $transactionType;
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