<?php
/**
 * Created by PhpStorm.
 * User: shuav
 * Date: 8/26/2020
 * Time: 9:19 AM
 */
require_once 'includes/application.php';
$app = new Application();
$users = $app->getUsers();
foreach ($users as $user){
    if($user->id == 1){
        continue;
    }

}