<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tool".
 *
 * @property int $id
 * @property string $title
 *
 * @property Application[] $applications
 */
class Tool extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tool';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['tool_id' => 'id']);
    }

    public static function getTools(): array
    {
        return static::find()->select('title')->indexBy('id')->column();
    }

    
}
