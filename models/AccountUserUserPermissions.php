<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_user_user_permissions".
 *
 * @property int $id
 * @property int $user_id
 * @property int $permission_id
 *
 * @property AuthPermission $permission
 * @property AccountUser $user
 */
class AccountUserUserPermissions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_user_user_permissions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'permission_id'], 'required'],
            [['user_id', 'permission_id'], 'integer'],
            [['user_id', 'permission_id'], 'unique', 'targetAttribute' => ['user_id', 'permission_id']],
            [['permission_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthPermission::class, 'targetAttribute' => ['permission_id' => 'id']],
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
            'user_id' => Yii::t('app', 'User ID'),
            'permission_id' => Yii::t('app', 'Permission ID'),
        ];
    }

    /**
     * Gets query for [[Permission]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPermission()
    {
        return $this->hasOne(AuthPermission::class, ['id' => 'permission_id']);
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
