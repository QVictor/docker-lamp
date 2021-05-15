<?php

class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once ROOT . '/views/cabinet/index.php';
        return true;
    }

    /**
     * Изменить данные пользователя
     * @return bool
     */
    public function actionEditUserData()
    {
        $userId = User::checkLogged();

        $newName = '';
        $newPassword = '';

        $result = false;

        if (isset($_POST['submit'])) {
            $errors = false;

            $newName = $_POST['name'];
            $newPassword = $_POST['password'];

            if (!User::checkName($newName)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }

            if (!User::checkPassword($newPassword)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors == false) {
                $userId = User::edit($userId, $newName, $newPassword);
                if (!$userId) {
                    $errors[] = 'Ошибка при изменении данных пользователя';
                } else {
                    $result = true;
                }
            }
        }

        $user = User::getUserById($userId);

        if ($userId) {
            $name = $user['name'];
            $password = $user['password'];
        }

        require_once ROOT . '/views/cabinet/edit.php';
        return true;
    }
}