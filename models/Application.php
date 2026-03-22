<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $user_id
 * @property int $service_id
 * @property string $date
 * @property string $time
 * @property string $adress
 * @property int|null $tool_id
 * @property int $self_tool
 * @property int $pay_type_id
 * @property int $status_id
 * @property string $created_at
 *
 * @property CancelComment $cancelComment
 * @property Feedback $feedback
 * @property PayType $payType
 * @property Service $service
 * @property Status $status
 * @property Tool $tool
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    public $rule;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tool_id'], 'default', 'value' => null],
            [['user_id', 'service_id', 'date', 'time', 'adress', 'self_tool', 'pay_type_id', 'status_id'], 'required'],
            [['user_id', 'service_id', 'tool_id', 'self_tool', 'pay_type_id', 'status_id'], 'integer'],
            [['date', 'time', 'created_at'], 'safe'],
            [['adress'], 'string'],
            [['pay_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => PayType::class, 'targetAttribute' => ['pay_type_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
            [['tool_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tool::class, 'targetAttribute' => ['tool_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],

            ['rule', 'compare', 'compareValue' => 1, 'message' => 'Подтвердите своё согласие на обработку персональных данных'],

            ['date', 'compare', 'compareValue' => date('Y-m-d'), 'operator' => '>=', 'message' => 'Дата должна быть не раньше сегодняшней'],

            ['time', 'compare', 'compareValue' => '07:00', 'operator' => '>=', 'message' => 'Режим работы сервиса с 7.00 до 22.00'],
            ['time', 'compare', 'compareValue' => '22:00', 'operator' => '<=', 'message' => 'Режим работы сервиса с 7.00 до 22.00'],

            ['time', 'validateTime'],
        ];
    }

    public function validateTime($attribute, $params)
    {
        if ($this->date === date('Y-m-d')) {
            if ($this->time < date('H:i')) {
                return $this->addError('time', 'Время должно быть позже текущего');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'user_id' => 'ФИО',
            'service_id' => 'Услуга',
            'date' => 'Желаемая дата',
            'time' => 'Желаемое время',
            'adress' => 'Адрес выполнения услуги',
            'tool_id' => 'Средства для уборки',
            'self_tool' => 'Использовать свои средства',
            'pay_type_id' => 'Способ оплаты',
            'rule' => 'Согласие на обработку персональных данных',
            'status_id' => 'Статус заявки',
            'created_at' => 'Дата создания заявки',
        ];
    }

    /**
     * Gets query for [[CancelComment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCancelComment()
    {
        return $this->hasOne(CancelComment::class, ['application_id' => 'id']);
    }

    /**
     * Gets query for [[Feedback]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFeedback()
    {
        return $this->hasOne(Feedback::class, ['application_id' => 'id']);
    }

    /**
     * Gets query for [[PayType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayType()
    {
        return $this->hasOne(PayType::class, ['id' => 'pay_type_id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[Tool]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTool()
    {
        return $this->hasOne(Tool::class, ['id' => 'tool_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
