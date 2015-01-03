<?php

/**
 * This is the model class for table "message_send".
 *
 * The followings are the available columns in table 'message_send':
 * @property integer $id
 * @property integer $from_user_id
 * @property integer $to_user_id
 * @property string $send_date
 * @property integer $is_read
 * @property integer $message_id
 */
class MessageSend extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'message_send';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from_user_id, to_user_id, send_date, message_id', 'required'),
			array('from_user_id, to_user_id, is_read, message_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, from_user_id, to_user_id, send_date, is_read, message_id', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'from_user_id' => 'From User',
			'to_user_id' => 'To User',
			'send_date' => 'Send Date',
			'is_read' => 'Is Read',
			'message_id' => 'Message',
		);
	}

	public static function fetchUserMessages($userId) {
		$connection=Yii::app()->db;
    	$sql = 'SELECT m.id,s.from_user_id,m.subject,m.content,m.cr_date FROM message_send AS s LEFT JOIN message AS m ON s.message_id=m.id WHERE s.to_user_id='.$userId;
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

		$criteria->compare('id',$this->id);
		$criteria->compare('from_user_id',$this->from_user_id);
		$criteria->compare('to_user_id',$this->to_user_id);
		$criteria->compare('send_date',$this->send_date,true);
		$criteria->compare('is_read',$this->is_read);
		$criteria->compare('message_id',$this->message_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MessageSend the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
