<?php

/**
 * This is the model class for table "scan_exception".
 *
 * The followings are the available columns in table 'scan_exception':
 * @property integer $id
 * @property string $addr
 * @property string $name
 */
class ScanException extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'scan_exception';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>100),
			array('addr', 'safe'),
			// The following rule is used by search().
			array('id, addr, name', 'safe', 'on'=>'search'),
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
			'addr' => 'Subnet',
			'name' => 'Name',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('addr',$this->addr,true);
		$criteria->compare('name',$this->name,true);
        $criteria->order = 'addr ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ScanException the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}