<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_profile".
 *
 * @property int $id
 * @property string $height
 * @property string $weight
 * @property string $gender
 * @property string|null $age
 * @property int|null $user_id
 *
 * @property AccountUser $user
 */
class AccountProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['height', 'weight', 'gender'], 'required'],
            [['user_id'], 'integer'],
            [['height', 'weight', 'gender', 'age'], 'string', 'max' => 20],
            [['user_id'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountUser::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'height' => Yii::t('app', 'Height'),
            'weight' => Yii::t('app', 'Weight'),
            'gender' => Yii::t('app', 'Gender'),
            'age' => Yii::t('app', 'Age'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(AccountUser::class, ['id' => 'user_id']);
    }
}
