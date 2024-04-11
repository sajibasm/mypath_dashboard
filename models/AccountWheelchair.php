<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_wheelchair".
 *
 * @property int $id
 * @property string $type_wc
 * @property string $wc_identify
 * @property int|null $number_w
 * @property string $d_type
 * @property string $tire_mat
 * @property int|null $wc_wdt
 * @property int|null $wc_ht
 * @property int|null $user_id
 *
 * @property AccountUser $user
 */
class AccountWheelchair extends \yii\db\ActiveRecord
{
    public $username;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_wheelchair';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_wc', 'wc_identify', 'd_type', 'tire_mat'], 'required'],
            [['number_w', 'wc_wdt', 'wc_ht', 'user_id'], 'integer'],
            [['type_wc', 'wc_identify', 'd_type', 'tire_mat'], 'string', 'max' => 20],
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
            'type_wc' => Yii::t('app', 'Type'),
            'wc_identify' => Yii::t('app', 'Name'),
            'number_w' => Yii::t('app', 'Number Of Wheel'),
            'd_type' => Yii::t('app', 'Drive Type'),
            'tire_mat' => Yii::t('app', 'Tire Material'),
            'wc_wdt' => Yii::t('app', 'Weight'),
            'wc_ht' => Yii::t('app', 'Height'),
            'user_id' => Yii::t('app', 'User'),
            'username' => Yii::t('app', 'User'),

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
