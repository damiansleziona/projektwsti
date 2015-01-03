<?php

/**
 * This is the model class for table "user_relation".
 *
 * The followings are the available columns in table 'user_relation':
 * @property integer $relation_id
 * @property integer $user1_id
 * @property integer $user2_id
 * @property integer $active
 */
class UserRelation extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_relation';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user1_id, user2_id, active', 'required'),
			array('user1_id, user2_id, active', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('relation_id, user1_id, user2_id, active', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'relation_id' => 'Relation',
			'user1_id' => 'User1',
			'user2_id' => 'User2',
			'active' => 'Active',
		);
	}

	public static function fethFriends($userId) {
		$connection=Yii::app()->db;
    	$sql = 'SELECT * FROM user_relation AS r LEFT JOIN user AS u ON r.user2_id=u.id WHERE r.user1_id='.$userId.' AND active = 1';
    	$command=$connection->createCommand($sql);
    	$rawData = $command->queryAll();
    	return $rawData;
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

		$criteria->compare('relation_id',$this->relation_id);
		$criteria->compare('user1_id',$this->user1_id);
		$criteria->compare('user2_id',$this->user2_id);
		$criteria->compare('active',$this->active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserRelation the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
