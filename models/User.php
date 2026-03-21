<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $full_name
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property int $role
 * @property string $auth_key
 *
 * @property Application[] $applications
 * @property CancelComment[] $cancelComments
 */
class User extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role'], 'default', 'value' => 0],
            [['full_name', 'login', 'password', 'email', 'phone', 'auth_key'], 'required'],
            [['role'], 'integer'],
            [['full_name', 'login', 'password', 'email', 'phone', 'auth_key'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'login' => 'Login',
            'password' => 'Password',
            'email' => 'Email',
            'phone' => 'Phone',
            'role' => 'Role',
            'auth_key' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[CancelComments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCancelComments()
    {
        return $this->hasMany(CancelComment::class, ['user_id' => 'id']);
    }

}
