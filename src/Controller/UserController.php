<?php
declare(strict_types=1);

namespace App\Controller;

use App\Connection\Database;
use App\Controller\PhotoContreller;
use App\Model\User;
use App\Model\UserTable;
use DataTime;
use Exception;
use InvalidArgumentException;
use JetBrains\PhpStorm\NoReturn;
use PDO;
use RuntimeException;

class UserController
{
    private PhotoContreller $photoContreller;
    private UserTable $userTable;
    private const USER_REQUIRED_FIELDS = [
        'first_name',
        'last_name',
        'email'
    ];

    function __construct(private PDO $dbConnection)
    {
        $this->photoContreller = new PhotoContreller();
        $this->UserTable = new UserTable($this->dbConnection);
    }
}