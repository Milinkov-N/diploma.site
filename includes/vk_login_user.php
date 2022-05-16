<?php

session_start();

if(!empty($_GET['code'])) {

    // ЕСЛИ КОД ПОЛУЧЕН, ТО ПОЛУЧАЕМ ОТ API VK ТОКЕН И ЗАПРОШЕННЫЕ ДАННЫЕ (имя, фамилию и id)
    $appID      = '7835093';
    $secureKey  = 'j0Q4gRfGaNn5GtFfxNXi';
    $url_script = 'http://diploma.site/includes/vk_login_user.php';
    $token = json_decode(file_get_contents('https://oauth.vk.com/access_token?client_id='.$appID.'&client_secret='.$secureKey.'&code='.$_GET['code'].'&redirect_uri='.$url_script), true);
    $fields = 'first_name,last_name';
    $uinf = json_decode(file_get_contents('https://api.vk.com/method/users.get?uids='.$token['user_id'].'&fields='.$fields.'&access_token='.$token['access_token'].'&v=5.80'), true);
    $vk_name = $uinf['response'][0]['first_name'];
    $vk_surname = $uinf['response'][0]['last_name'];
    $vk_uid = $token['user_id'];
    // $vk_name = 'Евгения';
    // $vk_surname = 'Санникова';
    // $vk_uid = '196085432';

    // ПРОВЕРЯЕМ НАЛИЧИЕ ДАННЫХ НА ЭТОГО ПОЛЬЗОВАТЕЛЯ В БД
    require_once('connectDB.php');

    $stmt = $pdo->prepare("SELECT id, name, surname, vk_user_id FROM user WHERE name = :name AND surname = :surname");

    $stmt->bindParam(':name', $vk_name);
    $stmt->bindParam(':surname', $vk_surname);
    // $stmt->bindParam(':vk_user_id', $vk_uid);

    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_LAZY)) {
        $id_db = $row['id'];
        $namedb = $row['name'];
        $surnamedb = $row['surname'];
        $vk_uid_db = $row['vk_user_id'];
    }

    // ЕСЛИ ОН УЖЕ ЗАРЕГИСТРИРОВАН, ТО ПРОСТО СОЗДАЁМ СЕССИЮ И ПЕРЕАДРЕСУЕМ ЕГО НА САЙТ
    if($vk_uid == $vk_uid_db) {

        $_SESSION["vk_user_id"] = $vk_uid;
        header('Location: /content.php');

    } elseif(empty($vk_uid_db)) {

        // ЕСЛИ ЭТОТ ПОЛЬЗОВАТЕЛЬ ВПЕРВЫЕ НА САЙТЕ, ТО РЕГИСТРИУЕМ ЕГО ПО ПОЛУЧЕННЫМ ДАННЫМ
        if(empty($namedb) && empty($surnamedb)) {

            $reg_stmt = $pdo->prepare("INSERT INTO user (id, name, surname, vk_user_id) VALUES (NULL, :name, :surname, :vk_uid);");

            $reg_stmt->bindParam(':name', $vk_name);
            $reg_stmt->bindParam(':surname', $vk_surname);
            $reg_stmt->bindParam(':vk_uid', $vk_uid);

            $reg_stmt->execute();

            $_SESSION["vk_user_id"] = $vk_uid;
            header('Location: /content.php');

        } else {

            // ЕСЛИ НЕ ВПЕРВЫЕ, ТО ЗАНОСИМ В ЕГО АККАУНТ VK ID
            $update_stmt = $pdo->prepare("UPDATE `diplomadb`.`user` SET `vk_user_id` = :vk_uid WHERE (`id` = :id);");

            $update_stmt->bindParam(':id', $id_db);
            $update_stmt->bindParam(':vk_uid', $vk_uid);

            $update_stmt->execute();

            $_SESSION["vk_user_id"] = $vk_uid;
            header('Location: /content.php');
            
        }
    }  
}

?>