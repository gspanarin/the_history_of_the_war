<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use \yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;


/**
 * This is the model class for table "article".
 *
 * @property int $id Ідентифікатор статті
 * @property int $user Оператор
 * @property string $metadata Метаданні
 * @property int $section_id Розділ/тематика
 * @property int $section_id_2 Другий Розділ/тематика
 * @property int $section_id_3 Третій Розділ/тематика
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

    /*
     * Перевизначаємо функцію load
     * додаємо обробку массиву елементів тегів
     * @param array $data асоціативний масив клю поля => значення поля
     * @param string|null $formName назва форми, з якої завантажуються данні
     * @param int $id Ідентифікатор статті
     * @return type boolean
     */
    public function load($data, $formName = null){
        if (!empty($data['Article'] )){
            $metadata = [];
            foreach($data['Article'] as $key => $values)
                if (substr($key, 0, 4) == 'tags')
                    foreach ($values as $value)
                        if (trim($value) != '')
                            $metadata[substr($key, 5)][] = $value;
            $this->metadata = json_encode($metadata, JSON_UNESCAPED_UNICODE);
        }
        
        return parent::load($data, $formName);
    }
            
    
    /**
     * 
     * @return type
     */
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
        return '{{%article}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'metadata', 'section_id'], 'required'],
            [['user_id', 'source_id', 'section_id', 'section_id_2', 'section_id_3', 'status', 'view', 'share', 'average_score', 'created_at', 'updated_at'], 'integer'],
            [['metadata'], 'string'],
            [['icon'], 'string', 'max' => 50],
            [['section_id', 'section_id_2', 'section_id_3'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
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
			'section_id_2' => 'Другий Розділ/тематика',
			'section_id_3' => 'Третій Розділ/тематика',
            'status' => 'Статус',
            'view' => 'Кількість переглядів',
            'share' => 'Кількість перепостів',
            'average_score' => 'Середня оцінка',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
            'current_icon' => 'Поточна іконка',
        ];
    }
    
    
	public function refreshTag(){
		
		$metadata = json_decode($this->metadata);
		$new_metadata = new \stdClass();
		foreach($metadata as $tag => $values){
			foreach ($values as $value){
				$value = trim($value);
				
				if ($tag == 'language' && $value == '6'){
					$new_metadata->$tag[] = 'Українська';
				}elseif ($tag == 'language' && $value == '7'){
					$new_metadata->$tag[] = 'Англійська';
				}elseif ($tag == 'language' && $value == '8'){
					$new_metadata->$tag[] = 'Російська';
					
					
				}elseif ($tag == 'date:event'){
					$new_metadata->date_event[] = $value;
				}elseif ($tag == 'date:archived'){
					$new_metadata->date_archived[] = $value;
					
				
				}elseif ($tag == 'subject:name'){
					$new_metadata->subject_name[] = $value;
				}elseif ($tag == 'subject:organization'){
					$new_metadata->subject_organization[] = $value;
				}elseif ($tag == 'subject:PlaceName'){
					$new_metadata->subject_PlaceName[] = $value;
				}elseif ($tag == 'date:publication'){
					$new_metadata->date_publication[] = $value;
				}elseif ($tag == 'subject:military_unit'){
					$new_metadata->subject_military_unit[] = $value;
				}elseif ($tag == 'subject:spatial'){
					$new_metadata->subject_spatial[] = $value;
				}elseif ($tag == 'rightsHolder'){
					$new_metadata->provenance[] = $value;
				}elseif ($tag == 'creator:phоto'){
					$new_metadata->creator_phоto[] = $value;	
				}elseif ($tag == 'coverage'){
					$new_metadata->subject_PlaceName[] = $value;			
				}elseif ($tag == 'date'){
					$new_metadata->date_event[] = $value;			
						
				
					
				}elseif ($tag == 'type' && $value == '1'){
					$new_metadata->$tag[] = 'Текст';
				}elseif ($tag == 'type' && $value == '2'){
					$new_metadata->$tag[] = 'Аудіоматеріал';
				}elseif ($tag == 'type' && $value == '3'){
					$new_metadata->$tag[] = 'Відеоматеріал';
				}elseif ($tag == 'type' && $value == '4'){
					$new_metadata->$tag[] = 'Зображення';
				}elseif ($tag == 'type' && $value == '5'){
					$new_metadata->$tag[] = 'Комбінований матеріал';
					
				
				}elseif ($tag == 'subject'){
					if (strpos($value, ',')){
						$values_arr = explode(',', $value);
						foreach ($values_arr as $item){
							$new_metadata->$tag[] = trim($item);
						}
					}else{
						$new_metadata->$tag[] = $value;
					}

					
				}else{
					$new_metadata->$tag[] = $value;
				}
			}
		}
		
		
		
		$this->metadata = json_encode($new_metadata, JSON_UNESCAPED_UNICODE);
		
		//dd($new_metadata);
	}
	
    public function beforeSave($insert) {
        $metadata = json_decode($this->metadata);
        $tag = 'date_archived';
        if (!isset($metadata->$tag)){
            $metadata->$tag = [$this->created_at ? date('Y-m-d', $this->created_at) : date('Y-m-d', \time())];
            $this->metadata = json_encode($metadata, JSON_UNESCAPED_UNICODE);  
        }
		
		//dd($this->metadata);
        //$this->created_at = strtotime($metadata->$tag[0]);
        if ($insert){
            //$metadata
        }else{
            Dictionary::deleteAll(['article_id' => $this->id]);
        }
                
        foreach($metadata as $tag => $values){
            foreach ($values as $value){
				if (trim($value) != ''){
					$term = new Dictionary();
					$term->article_id = $this->id;
					$term->term_name = $tag; 
					$term->value = $value;
					$term->save();
				}
            }
        }
		
        return parent::beforeSave($insert);
    }
    
    
    public function beforeDelete(){
        //Видаляємо сформовані у словнику терміни
        /*foreach ($this->dictionaries as $child) {
            $child->delete();
        }*/
		Dictionary::deleteAll(['article_id' => $this->id]);
        
        return parent::beforeDelete();
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
    
    
    /**
     * Отримуємо значення тегу за його назвою та номером
     * @param type string $tag
     * @param type int $number
     * @return type string
     */
    public function tag_value(string $tag, int $number = 0){
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
		$path = str_replace("//", "/", Yii::$app->params['storage_path'] . date('Y', $this->created_at) . '/' . date('m', $this->created_at) . '/' . $this->id . '/icon.jpg');
        
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
	
	
	
	public function processCountViewPost(){
        $session = Yii::$app->session;
		//$session->remove('article_view');
		
		
        if (!isset($session['article_view'])) {
            $session->set('article_view', [$this->id]);
			
            $this->updateCounters(['view' => 1]);
        } else {
            if (!ArrayHelper::isIn($this->id, $session['article_view'])) {
                $array = $session['article_view'];
                array_push($array, $this->id);
                $session->remove('article_view');
                $session->set('article_view', $array);
                $this->updateCounters(['view' => 1]);
            }
        }
		
		
        return true;
    }
	
	public function getDate_archived(){
		//Заготовка. Треба доробити
		//Повертає данні конкретного значення із поля з json
		//у прикладі - дата архівування
		
		/*SELECT
			json_extract(metadata, '$.date_archived[0]') AS title
		FROM 
			article
		WHERE 
			id < 400
*/

		$metadata = json_decode($this->metadata);
        return (isset($metadata->date_archived[0]) ? $metadata->date_archived[0] : ''); 
	}
}
