<?php
namespace common\models;

use \yii\db\ActiveRecord;
use frontend\components\Common;

/**
 * This is the model class for table "subscribe".
 *
 * @property integer $idsubscribe
 * @property string $imail
 * @property string $date_subscribe
 */
class Subscribe extends ActiveRecord
{
    const EVENT_NOTIFICATION_ADMIN = 'new-notification-admin';

    public function init()
    {
        $this->on(self::EVENT_NOTIFICATION_ADMIN, [$this, 'notification']);
    }

    public function notification($event)
    {
        $model = User::find()->where(['roles' => 'admin'])->all();
        foreach ($model as $r) {
            Common::sendMail('Notification', 'New subscribe', $r['email']);
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date_subscribe'], 'safe'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsubscribe' => 'Idsubscribe',
            'email' => 'Email',
            'date_subscribe' => 'Date Subscribe',
        ];
    }

    /**
     * @inheritdoc
     * @return SubscribeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubscribeQuery(get_called_class());
    }
}
