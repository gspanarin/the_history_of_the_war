<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "authority".
 *
 * @property int $id Ідентифікатор авторитетного значення
 * @property int $authority_type_id Ідентифікатор виду авторитетного джерела
 * @property string $value Авторитетне значення
 *
 * @property AuthorityType $authorityType
 */
class Authority extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authority';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['authority_type_id', 'value'], 'required'],
            [['authority_type_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['authority_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => AuthorityType::class, 'targetAttribute' => ['authority_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор авторитетного значення',
            'authority_type_id' => 'Ідентифікатор виду авторитетного джерела',
            'value' => 'Авторитетне значення',
        ];
    }

    /**
     * Gets query for [[AuthorityType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorityType()
    {
        return $this->hasOne(AuthorityType::class, ['id' => 'authority_type_id']);
    }
}
