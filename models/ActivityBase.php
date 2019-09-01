<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $dateStart
 * @property string $dateEnd
 * @property int $duration
 * @property string $author
 * @property string $file
 * @property int $repeatedType
 * @property int $isBlocked
 * @property int $useNotification
 * @property string $email
 * @property string $createAt
 * @property int $isDeleted
 * @property int $user_id
 *
 * @property Users $user
 */
class ActivityBase extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'dateStart', 'user_id'], 'required'],
            [['description'], 'string'],
            [['dateStart', 'dateEnd', 'createAt'], 'safe'],
            [['duration', 'repeatedType', 'isBlocked', 'useNotification', 'isDeleted', 'user_id'], 'integer'],
            [['title', 'author', 'email'], 'string', 'max' => 150],
            [['file'], 'string', 'max' => 350],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'dateStart' => Yii::t('app', 'Date Start'),
            'dateEnd' => Yii::t('app', 'Date End'),
            'duration' => Yii::t('app', 'Duration'),
            'author' => Yii::t('app', 'Author'),
            'file' => Yii::t('app', 'File'),
            'repeatedType' => Yii::t('app', 'Repeated Type'),
            'isBlocked' => Yii::t('app', 'Is Blocked'),
            'useNotification' => Yii::t('app', 'Use Notification'),
            'email' => Yii::t('app', 'Email'),
            'createAt' => Yii::t('app', 'Create At'),
            'isDeleted' => Yii::t('app', 'Is Deleted'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
