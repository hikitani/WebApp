<?php
    require "../Model/db.php";

    function prepareField($value)
    {
        return trim(strip_tags($value));
    }

    if (!empty($_POST)) {

        $data = $_POST;
        $email = prepareField($data['user_email']);
        $login = prepareField($data['user_login']);
        $password = $data['user_password'];
        $errors = [];

        $user = R::dispense('users');

        // Проверка mail
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = [
                'name' => 'user_email',
                'text' => 'E-mail адрес указан неверно'
            ];
        }

        // Проверка логина
        if(!preg_match("/^[a-zA-Z0-9]+$/", $login))
        {
            $errors[] = [
                'name' => 'user_login',
                'text' => 'Логин может состоять только из букв английского алфавита и цифр'
            ];
        }

        if(strlen($login) < 3 or strlen($login) > 30)
        {
            $errors[] = [
                'name' => 'user_login',
                'text' => 'Логин должен быть не меньше 3-х символов и не больше 30'
            ];
        }

        // Проверка пароля
        if (strlen($password) < 6 or strlen($login) > 32) {
            $errors[] = [
                'name' => 'user_password',
                'text' => 'Длина пароля дожна быть не меньше 6-ти символов и не больше 32'
            ];
        }

        // Проверка существования

        if (R::count('users', "login = ?", [ $login ]) > 0) {
            $errors[] = [
                'name' => 'user_login',
                'text' => 'Пользователь с таким логин уже существует'
            ];
        }

        if (R::count('users', "email = ?", [ $email ]) > 0) {
            $errors[] = [
                'name' => 'user_email',
                'text' => 'Пользователь с такой почтой уже существует'
            ];
        }

        // Если нет ошибок, то добавляем в БД нового пользователя

        if (empty($errors))
        {
            // Регистрация
            $user->login = $login;
            $user->email = $email;
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->created = date('Y-m-d');

            R::store($user);
            echo json_encode([
                'user' => $user
            ], JSON_UNESCAPED_SLASHES);
            $user;
            header("Location: /index.php");
            exit();
        } else {
            echo json_encode([
                'errors' => $errors
            ], JSON_UNESCAPED_SLASHES);
            $errors;
        }
    }
?>