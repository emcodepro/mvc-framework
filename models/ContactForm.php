<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 04-Mar-21
 * Time: 10:30
 */

namespace app\models;


use emcode\phpmvc\Model;

class ContactForm extends Model
{
    public $subject = '';
    public $email = '';
    public $body = '';


    function rules()
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels()
    {
        return [
            'subject' => 'Subject',
            'email' => 'Email',
            'body' => 'Enter your text'
        ];
    }

    public function send()
    {
        return true;
    }
}