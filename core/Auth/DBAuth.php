<?php

namespace Core\Auth;

use Core\Database\Database;

/**
 * Class DBAuth
 * @package Core\Auth
 */
class DBAuth{

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
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);
        var_dump(sha1('demo'));
        var_dump($user);
        if ($user)
        {
            if ($user->password === sha1($password))
            {
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function logged()
    {
        return isset($_SESSION['auth']);
    }

    /**
     * @return bool
     */
    public function getUserId()
    {
        if ($this->logged())
        {
            return $_SESSION['auth'];
        }
        return false;
    }

}
