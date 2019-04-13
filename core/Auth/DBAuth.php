<?php

namespace Core\Auth;

use Core\Database\Database;

/**
 * Class DBAuth
 * @package Core\Auth
 */
class DBAuth
{
    /**
     * @var Database
     */
    private $db;

    /**
     * DBAuth constructor.
     * @param Database $db
     */
    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * @return bool
     */
    public function getUserId(): bool
    {
        if ($this->logged()) {
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password): bool
    {
        $user = $this->db->prepare('SELECT * 
                                            FROM users 
                                            WHERE username = ?', [$username], null, true);
        if ($user) {
            if ($user->password === sha1($password)) {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function logged(): bool
    {
        return isset($_SESSION['auth']);
    }
}
