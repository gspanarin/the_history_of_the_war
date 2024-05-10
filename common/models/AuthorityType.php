<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "authority_type".
 *
 * @property int $id Ідентифікатор виду авторитетного джерела
 * @property string $name Назва виду авторитетного джерела
 * @property string|null $description Короткий опис
 *
 * @property Authority[] $authorities
 */
class AuthorityType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authority_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор виду авторитетного джерела',
            'name' => 'Назва виду авторитетного джерела',
            'description' => 'Короткий опис',
        ];
    }

    /**
     * Gets query for [[Authorities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorities()
    {
        return $this->hasMany(Authority::class, ['authority_type_id' => 'id']);
    }
    
    public static function getList(){
        return  AuthorityType::find()
            ->select(['name', 'id'])
            ->indexBy('id')
            ->column();
    }
    
    public static function getListIdsName(){
        return  AuthorityType::find()
            ->select(['name'])
            ->indexBy('id')
            ->column();
    }
}
