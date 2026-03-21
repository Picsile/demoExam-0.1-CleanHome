<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class RegisterForm extends Model
{
    public $full_name;
    public $login;
    public $password;
    public $email;
    public $phone;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['full_name', 'login', 'password', 'email', 'phone'], 'required'],
            [['full_name', 'login', 'password', 'email', 'phone'], 'string', 'max' => 255],

            ['login', 'string', 'min' => 6],
            ['login', 'match', 'pattern' => '/^[a-z0-9]+$/i', 'message' => 'логин (латиница и цифры, не менее 6 символов)'],

            ['password', 'string', 'min' => 8],
            ['password', 'match', 'pattern' => '/^(?=.*[0-9])(?=.*[!@#$%^&*])[а-яёa-z0-9!@#$%^&*]+$/iu', 'message' => 'пароль (минимум 8 символов, должен содержать хотя бы одну цифру и один специальный символ)'],

            ['full_name', 'match', 'pattern' => '/^[а-яё\s]+$/iu', 'message' => 'ФИО (символы кириллицы и пробелы)'],

            ['phone', 'match', 'pattern' => '/^\+7\([\d]{3}\)\-[\d]{3}\-[\d]{2}\-[\d]{2}$/', 'message' => 'телефон (формат: +7(XXX)-XXX-XX-XX)'],

            // email has to be a valid email address
            ['email', 'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'full_name' => 'ФИО',
            'login' => 'Логин',
            'password' => 'Пароль',
            'email' => 'Адрес электронной почты',
            'phone' => 'Номер телефона',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function register(): User | false
    {
        if ($this->validate()) {
            $user = new User();
            $user->load($this->attributes, '');
            $user->password = Yii::$app->security->generatePasswordHash($user->password);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->save();
        }
        return $user ?? false;
    }
}
