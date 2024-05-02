<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "article".
 *
 * @property int $id Ідентифікатор статті
 * @property int $user Оператор
 * @property string $metadata Метаданні
 * @property int $section_id Розділ/тематика
 * @property int|null $status Статус
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата корегування
 */
class Article extends \yii\db\ActiveRecord{
    private static $status_title = [
        0 => 'Нова стаття',
        5 => 'Редагується',
        10 => 'Опублікована',
    ];

    public function behaviors(){
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
        ];
    }
    
    public static function tableName(){
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'metadata', 'section_id'], 'required'],
            [['user_id', 'source_id', 'section_id', 'status', 'view', 'share', 'average_score', 'created_at', 'updated_at'], 'integer'],
            [['metadata'], 'string'],
            [['icon'], 'string', 'max' => 50],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
            [['source_id'], 'exist', 'skipOnError' => true, 'targetClass' => Source::class, 'targetAttribute' => ['source_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор статті',
            'user_id' => 'Оператор',
            'metadata' => 'Метаданні',
            'source_id' => 'Ідентифікатор джерела статті',
            'icon' => 'Посилання на іконку для статті',
            'section_id' => 'Розділ/тематика',
            'status' => 'Статус',
            'view' => 'Кількість переглядів',
            'share' => 'Кількість перепостів',
            'average_score' => 'Середня оцінка',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
        ];
    }
    
    
    public function beforeSave($insert) {
        if (!$insert){
            Dictionary::deleteAll(['article_id' => $this->id]);
        }
        $metadata = json_decode($this->metadata);
        foreach($metadata as $tag => $values){
            foreach ($values as $value){
                $term = new Dictionary();
                $term->article_id = $this->id;
                $term->tag_id = Tag::getTagIdByName($tag);
                $term->value = $value;
                $term->save();
            }
        }

        return parent::beforeSave($insert);
    }
    
    public function getTitle(){
        $metadata = json_decode($this->metadata);
        return (isset($metadata->title[0]) ? $metadata->title[0] : '');
    }
    
    public function getText_preview(){
        $metadata = json_decode($this->metadata);
        $text = (isset($metadata->description[0]) ? $metadata->description[0] : '');
        return (strlen($text) > 200 ? mb_substr($text, 0, 200) . '...' : $text);
    }
    
    /*public function getSource(){
        $metadata = json_decode($this->metadata);
        return (isset($metadata->source[0]) ? $metadata->source[0] : '');
    }*/
    
    public function tag_value($tag, $number = 0){
        $metadata = json_decode($this->metadata);
        
        return (isset($metadata->$tag[$number]) ? $metadata->$tag[$number] : '' );
    }
    
    public static function getStatusList(){
        return self::$status_title;
    }
    
    public function getStatusTitle(){
        return self::$status_title[$this->status];
    }
    
    public static function getUserFullName($user_id){
        return User::getFullName($user_id);    
    }
    
    public function getDictionaries()
    {
        return $this->hasMany(Dictionary::class, ['article_id' => 'id']);
    }
    
    public function getFiles(){
        return $this->hasMany(File::class, ['article_id' => 'id']);
    }
    
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }
    
    public function getSource()
    {
        return $this->hasOne(Source::class, ['id' => 'source_id']);
    }
    
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    
    public function getIcon(){
        $path = Yii::$app->params['storage_path'] . date('Y', $this->created_at) . '/' . date('m', $this->created_at) . '/' . $this->id . '/icon.jpg';
        
        if(file_exists($path)){
            $imagedata = file_get_contents($path);
            return base64_encode($imagedata);
        }else{
            return false;
        }
    }
    
    public function DeleteIcon(){
        unlink(Yii::$app->params['storage_path'] . date('Y', $this->created_at) . '/' . date('m', $this->created_at) . '/' . $this->id . '/icon.jpg');        
    }
}
