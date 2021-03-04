<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 28-Feb-21
 * Time: 22:05
 */

namespace app\models;


use emcode\phpmvc\Application;
use emcode\phpmvc\DbModel;
use emcode\phpmvc\UserModel;

class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $password = '';
    public $status = self::STATUS_INACTIVE;
    public $confirmPassword = '';

    public static function tableName()
    {
        return 'users';
    }

    function rules()
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],

        ];
    }

    public function save()
    {
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function attributes()
    {
        return ['firstname', 'lastname', 'email', 'password', 'status'];
    }

    public function labels()
    {
        return [
            'firstname' => "First name",
            'lastname' => "Last Name",
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password'
        ];
    }

    public static function primaryKey()
    {
        return 'id';
    }

    public function getFullName()
    {
        return Application::$app->user ? $this->firstname . " " . $this->lastname : null;
    }
}