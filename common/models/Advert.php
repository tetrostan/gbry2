<?php
namespace common\models;

use frontend\components\Common;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "advert".
 *
 * @property integer $idadvert
 * @property integer $price
 * @property string $address
 * @property integer $fk_agent
 * @property integer $bedroom
 * @property integer $livingroom
 * @property integer $parking
 * @property integer $kitchen
 * @property string $general_image
 * @property string $description
 * @property string $location
 * @property integer $hot
 * @property integer $sold
 * @property string $type
 * @property integer $recommend
 * @property integer $created_at
 * @property integer $updated_at
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'advert';
    }

    public function behaviors()
    {
        return [
            // добавляет в модель Advert даты создания и обновления объявления
            TimestampBehavior::className(),
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['step2'] = ['general_image'];

        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price'], 'required'],
            [['price', 'fk_agent', 'bedroom', 'livingroom', 'parking', 'kitchen', 'hot', 'sold', 'type', 'recommend'], 'integer'],
            [['description'], 'string'],
            [['address'], 'string', 'max' => 255],
            [['location'], 'string', 'max' => 50],
            // ['general_image', 'file', 'extensions' => ['jpg','png','gif']]
        ];
    }

    public function getTitle()
    {
        return Common::getTitleAdvert($this);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idadvert' => 'Idadvert',
            'price' => 'Price',
            'address' => 'Address',
            'fk_agent' => 'Fk Agent Detail',
            'bedroom' => 'Bedroom',
            'livingroom' => 'Livingroom',
            'parking' => 'Parking',
            'kitchen' => 'Kitchen',
            'general_image' => 'General Image',
            'description' => 'Description',
            'location' => 'Location',
            'hot' => 'Hot',
            'sold' => 'Sold',
            'type' => 'Type',
            'recommend' => 'Recommend',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getUser()
    {
        // relationship tables user with advert
        return $this->hasOne(User::className(), ['id' => 'fk_agent']);
    }

    // Готовые события в ActiveRecord
    // событие срабатывает:
    //    beforeValidate -  до валидации
    //    afterValidate - после валидации
    //    beforeSave - до сохранения в БД
    //    afterSave - после сохранения в БД
    //    beforeFind - до выборки
    //    afterFind - после выборки
    public function afterValidate()
    {
        // запомнить id пользователя, котрый добавил текущее обявление
        $this->fk_agent = \Yii::$app->user->identity->id;
    }

    public function afterSave()
    {
        \Yii::$app->locator->cache->set('id', $this->idadvert);
    }

    /**
     * @inheritdoc
     * @return AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AdvertQuery(get_called_class());
    }
}