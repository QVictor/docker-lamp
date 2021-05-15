<?php

class User
{
    public static function register($name, $email, $password)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) '
            . 'VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Проверяет имя: не меньше, чем 2 символа
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    public static function checkUserData($email, $password)
    {

        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user)
            return $user['id'];
        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    public static function isGuest()
    {
        if (!isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);
            $result->execute();

            return $result->fetch();
        }
    }

    /**
     * Изменить имя и пароль пользователя с id = $userId
     *
     * @param $userId
     * @param $newName
     * @param $newPassword
     * @return bool
     */
    public static function edit($userId, $newName, $newPassword)
    {
        if ($userId) {
            $db = Db::getConnection();

            $sql = 'UPDATE user SET name=:name, password = :password WHERE id= :id';

            $result = $db->prepare($sql);
            $result->bindParam(':name', $newName, PDO::PARAM_STR);
            $result->bindParam(':password', $newPassword, PDO::PARAM_STR);
            $result->bindParam(':id', $userId, PDO::PARAM_INT);
            $res = $result->execute();

            if ($res)
                return $userId;
            return false;
        }
    }
}