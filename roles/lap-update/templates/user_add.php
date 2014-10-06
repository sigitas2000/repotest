<?php

$yii='{{ yii_dir }}/framework/yii.php';
$config='{{ project_dir }}/protected/config/main.php';
require($yii);
Yii::createWebApplication($config);

$login = '{{ app_user }}';
$pass = '{{ app_pass }}';

// Backend
// $r = Yii::app()->db->createCommand("delete from user where login = '$login'");
$r = Yii::app()->db->createCommand("select * from user where login = '$login' limit 1")->queryAll();
if (empty($r)) {
    $user = new User('registration');
    $user->login = "$login";
    $user->setPassword("$pass");
    $user->is_active = 1;
    $user->save();
}
 
// Frontend
$r = Yii::app()->db->createCommand("delete from partner where login = '$login'");
$r = Yii::app()->db->createCommand("select * from partner where login = '$login' limit 1")->queryAll();
if (empty($r)) {
    $user = Yii::app()->db->createCommand("select * from user where login = '$login' limit 1")->queryAll()[0];
    $r= Yii::app()->db->createCommand("
        INSERT INTO partner (
            id,
            login,
            password_hash,
            salt,
            is_active
        ) VALUES (
            null,
            '$user[login]',
            '$user[password_hash]',
            '$user[salt]',
            1
        )
    ")->query();
}
