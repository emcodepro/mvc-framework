<?php

use emcode\phpmvc\Application;

/**
 * Created by PhpStorm.
 * User: grand
 * Date: 02-Mar-21
 * Time: 18:40
 */

class m0001_add_password_column {
    public function up()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(255) NOT NULL");
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password");
    }
}