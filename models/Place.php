<?php

/**
 * This is the model class for table "place".
 *
 * The followings are the available columns in table 'place':
 * @property integer $id
 * @property string $name
 * @property integer $cr_user_id
 * @property string $short_description
 * @property string $description
 * @property string $voivodeship
 * @property string $city
 * @property string $latitude
 * @property string $longitude
 * @property integer $category
 * @property string $visibility
 */
class Place extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'place';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cr_user_id, short_description, description, voivodeship, city, latitude, longitude, category, visibility', 'required'),
			array('cr_user_id, category', 'numerical', 'integerOnly'=>true),
			array('name, short_description', 'length', 'max'=>256),
			array('voivodeship, city', 'length', 'max'=>128),
			array('latitude, longitude', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, cr_user_id, short_description, description, voivodeship, city, latitude, longitude, category, visibility', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'cr_user'=>array(self::BELONGS_TO, 'User', 'cr_user_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'cr_user_id' => 'Cr User',
			'short_description' => 'Short Description',
			'description' => 'Description',
			'voivodeship' => 'Voivodeship',
			'city' => 'City',
			'latitude' => 'Latitude',
			'longitude' => 'Longitude',
			'category' => 'Category',
			'visibility' => 'Visibility',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cr_user_id',$this->cr_user_id);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('voivodeship',$this->voivodeship,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('latitude',$this->latitude,true);
		$criteria->compare('longitude',$this->longitude,true);
		$criteria->compare('category',$this->category);
		$criteria->compare('visibility',$this->visibility,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Place the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
