<?php
    /*
     * Файл авторизации
     */

    require "../Model/db.php";

    function prepareField($value)
    {
        return trim(strip_tags($value));
    }

    if (!empty($_POST)) {

        $data = $_POST;
        $email = prepareField($data['user_email']);
        $password = $data['user_password'];

        $errors = [];

        $user = R::findOne('users', "email = ?", [ $email ]);
        // Проверка существования пользователя
        if ($user) {
            // Проверка введенного пароля
            if (password_verify($password, $user->password)) {
                //Вход
                $_SESSION['logged_user'] = $user;
                echo json_encode([
                    'OK' => 'OK'
                ], JSON_UNESCAPED_SLASHES);
                header('Location: /index.php');
                exit();
            } else {
                // Неверный пароль
                $errors[] = [
                    'name' => 'user_password',
                    'text' => 'Неверный пароль'
                ];
            }
        } else {
            // Такого пользователя не существует
            $errors[] = [
                'name' => 'user_email',
                'text' => 'Такого пользователя не существует '.$email
            ];
        }

        if (!empty($errors)) {
            echo json_encode([
                'errors' => $errors
            ], JSON_UNESCAPED_SLASHES);
        }
    }
?>