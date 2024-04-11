<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account_user".
 *
 * @property int $id
 * @property string $password
 * @property string|null $last_login
 * @property int $is_superuser
 * @property string $email
 * @property string $name
 * @property string $com_num
 * @property int $is_active
 * @property int $is_admin
 *
 * @property AccountProfile $accountProfile
 * @property AccountUserGroups[] $accountUserGroups
 * @property AccountUserUserPermissions[] $accountUserUserPermissions
 * @property AccountWheelchair[] $accountWheelchairs
 * @property DjangoAdminLog[] $djangoAdminLogs
 * @property AuthGroup[] $groups
 * @property AuthPermission[] $permissions
 */
class AccountUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'is_superuser', 'email', 'name', 'com_num', 'is_active', 'is_admin'], 'required'],
            [['last_login'], 'safe'],
            [['is_superuser', 'is_active', 'is_admin'], 'integer'],
            [['password'], 'string', 'max' => 128],
            [['email'], 'string', 'max' => 254],
            [['name', 'com_num'], 'string', 'max' => 100],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'password' => Yii::t('app', 'Password'),
            'last_login' => Yii::t('app', 'Last Login'),
            'is_superuser' => Yii::t('app', 'Superuser'),
            'email' => Yii::t('app', 'Email'),
            'name' => Yii::t('app', 'Name'),
            'com_num' => Yii::t('app', 'Com Num'),
            'is_active' => Yii::t('app', 'Status'),
            'is_admin' => Yii::t('app', 'Admin'),
        ];
    }

    /**
     * Gets query for [[AccountProfile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountProfile()
    {
        return $this->hasOne(AccountProfile::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[AccountUserGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountUserGroups()
    {
        return $this->hasMany(AccountUserGroups::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[AccountUserUserPermissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountUserUserPermissions()
    {
        return $this->hasMany(AccountUserUserPermissions::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[AccountWheelchairs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccountWheelchairs()
    {
        return $this->hasMany(AccountWheelchair::class, ['user_id' => 'id']);
    }

//    /**
//     * Gets query for [[Groups]].
//     *
//     * @return \yii\db\ActiveQuery
//     */
//    public function getGroups()
//    {
//        return $this->hasMany(AuthGroup::class, ['id' => 'group_id'])->viaTable('account_user_groups', ['user_id' => 'id']);
//    }
//
//    /**
//     * Gets query for [[Permissions]].
//     *
//     * @return \yii\db\ActiveQuery
//     */
//    public function getPermissions()
//    {
//        return $this->hasMany(AuthPermission::class, ['id' => 'permission_id'])->viaTable('account_user_user_permissions', ['user_id' => 'id']);
//    }
}
