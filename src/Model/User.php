<?php
declare(strict_types=1);

namespace App\Model;

class User
{
    function __construct(
        private ?int     $id,
        private string  $firstName,
        private string  $lastName,
        private ?string $middleName,
        private int     $balance,
        private string  $email,
        private ?string $avatarPath
    )
    {
    }

    function getId(): int
    {
        return $this->id;
    }

    function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    function getMiddleName(): ?string
    {
        return $this->middleName;
    }

    public function setMiddleName(?string $middleName): void
    {
        $this->middleName = $middleName;
    }

    function getBalance(): int
    {
        return $this->balance;
    }

    public function setBalance(int $balance): void
    {
        $this->balance = $balance;
    }
    function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    function getAvatarPath(): ?string
    {
        return $this->avatarPath;
    }

    function setAvatarPath(?string $avatarPath): void
    {
        $this->avatarPath = $avatarPath;
    }

    function convertInfoToArray(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'middleName' => $this->middleName,
            'balance' => $this->balance,
            'email' => $this->email,
            'avatarPath' => $this->avatarPath,
        ];
    }

}