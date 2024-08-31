<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;


//Переключатель в списке разделов
//https://github.com/dixonsatit/yii2-toggle-column
    
    


/**
 * This is the model class for table "section".
 *
 * @property int $id Ідентифікатор розділу
 * @property string $alias Аліас розділу
 * @property int|null $status Статус розділу
 * @property string $title Назва
 * @property string|null $description Детальний опис
 * @property string|null $icon Іконка
 * @property int|null $pid Батьківський розділ
 * @property int|null $sort Порядок сортування
 * @property int|null $created_at Дата створення
 * @property int|null $updated_at Дата корегування
 */
class Section extends \yii\db\ActiveRecord implements \dixonstarter\togglecolumn\ToggleActionInterface{
    
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
    
    
    public function beforeSave($insert) {
        if ($this->sort == null)
            $this->sort = $this->getLastSortValue() + 1;

        return parent::beforeSave($insert);
    }
    
    
    /**
     * {@inheritdoc}
     */
    public static function tableName(){
        return '{{%section}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias', 'title'], 'required'],
            [['status', 'pid', 'created_at', 'updated_at', 'sort'], 'integer'],
            [['description'], 'string'],
            [['alias', 'title', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Ідентифікатор розділу',
            'alias' => 'Аліас розділу',
            'status' => 'Статус розділу',
            'title' => 'Назва',
            'description' => 'Детальний опис',
            'icon' => 'Іконка',
            'pid' => 'Батьківський розділ',
            'sort' => 'Порядок',
            'created_at' => 'Дата створення',
            'updated_at' => 'Дата корегування',
        ];
    }
    
    
    static function getSectionsList($id = null){
        $params['status'] = 1;
        if ($id != null)
            $params['id'] = $id;
                
        $query = Section::find()->where($params)->orderBy(['sort' => SORT_ASC])->all();
        $list = [];
		//dd($query);
        $tree = Section::getTree($query, 0);
        for($i = 0; $i < count($tree); $i++)
            $list[$tree[$i]['id']] = $tree[$i]['title'];

        return $list;
    }
    
    
    static function getTree($items, $pid = 1, $level = 0){
        $list = [];
        for ($i = 0; $i < count($items); $i++){
            if ($items[$i]->pid == $pid ){
                $list[] = [
                    'id' => $items[$i]->id,
                    'title' => str_repeat(' -- ', $level) . $items[$i]->title
                    ];
                $new_level = $level + 1;
                $list = array_merge($list, Section::getTree($items, $items[$i]->id, $new_level));
            }
        }
        
        return $list;
    }

    public function getSortButton(){
        $next = $this->getLastSortValue();
        $sort = '';
        if ($this->sort == null){
            $sort = ' - ';
        }elseif ($this->sort == 1 && $next > 1){
            $sort = ' ⬇ ';
        }elseif ($this->sort == $next){
            $sort = ' ⬆ ';
        }else{
            $sort = ' ⬇ ⬆ ';
        }
        
        return $sort;
    }
    
    public function getLastSortValue(){
        $next = Section::find()->where(['pid' => $this->pid])->orderBy([ 'sort' => SORT_DESC])->one();

        return empty($next->sort) ? 0 : $next->sort;
    }
    
    use \dixonstarter\togglecolumn\ToggleActionTrait;
    public function getToggleItems(){
        // custom array for toggle update
        return  [
            'on' => ['value'=>1, 'label'=>'Publish'],
            'off' => ['value'=>0, 'label'=>'Panding'],
        ];
    }
    
        
    public function getBranches_list($section_id){
        
    }
    
    public function getArticle_count(){
        //!!!!!!!   переробити цим методом: !!!!!!!!!!!
        // возвращает всех покупателей массивом, индексированным их идентификаторами
        // SELECT * FROM `customer`
        //$customers = Customer::find()
        //    ->indexBy('id')
        //    ->all();

        $sections = section::find()->select(['id'])->where(['like', 'alias',  $this->alias . '%', false])->all();
        $ids = [];
        foreach ($sections as $section)
            $ids[] = $section['id'];
        
        return Article::find()->Where(['in', 'section_id', $ids])->orWhere(['in', 'section_id_2', $ids])->orWhere(['in', 'section_id_2', $ids])->count();
    }
    
    
    public function getSectionTree(){
        //Дуже класний запит для побудови переліку категорій з підкатегоріми рекурсивно із запиту
        
       
        /*
        
        
        WITH RECURSIVE category_path (id, alias, title, path, pid, article_count) AS
(
	SELECT 
		id, alias, title, title as path, pid, (SELECT COUNT(id) FROM article AS a WHERE a.section_id = id) as article_count 
	FROM 
		section
	WHERE pid = 1 
	UNION ALL
		SELECT 
			s.id, 
			s.alias, 
			s.title, 
			CONCAT(cp.path, ' > ', s.title), 
			s.pid, 
			(SELECT COUNT(id) FROM article AS a WHERE a.section_id = s.id)
		FROM 
			category_path AS cp JOIN section AS s
      ON 
			cp.id = s.pid
)
SELECT * FROM category_path
ORDER BY alias;
        
        
        
        "1"	"Корньова рубрика тематичного рубрикатору"	"Корньова рубрика тематичного рубрикатору"
        "14"	"Волонтерський рух в Україні"	"Корньова рубрика тематичного рубрикатору > Волонтерський рух в Україні"
        "18"	"Допомога тваринам"	"Корньова рубрика тематичного рубрикатору > Волонтерський рух в Україні > Допомога тваринам"
        "16"	"Підтримка ВПО"	"Корньова рубрика тематичного рубрикатору > Волонтерський рух в Україні > Підтримка ВПО"
        "15"	"Підтримка ЗСУ"	"Корньова рубрика тематичного рубрикатору > Волонтерський рух в Україні > Підтримка ЗСУ"
        "17"	"Підтримка цивільного населення"	"Корньова рубрика тематичного рубрикатору > Волонтерський рух в Україні > Підтримка цивільного населення"
        "2"	"Державна політика"	"Корньова рубрика тематичного рубрикатору > Державна політика"
        "4"	"Відновлення міст, сіл, містечок"	"Корньова рубрика тематичного рубрикатору > Державна політика > Відновлення міст, сіл, містечок"
        "5"	"Декомунізація, деколонізація"	"Корньова рубрика тематичного рубрикатору > Державна політика > Декомунізація, деколонізація"
        "6"	"Державна допомога населенню"	"Корньова рубрика тематичного рубрикатору > Державна політика > Державна допомога населенню"
        "3"	"Заяви та звернення українських політиків, держслужбовців"	"Корньова рубрика тематичного рубрикатору > Державна політика > Заяви та звернення українських політиків, держслужбовців"
        "7"	"Докази російської агресії"	"Корньова рубрика тематичного рубрикатору > Докази російської агресії"
        "9"	"Некрологи"	"Корньова рубрика тематичного рубрикатору > Докази російської агресії > Некрологи"
        "10"	"Особисті історії"	"Корньова рубрика тематичного рубрикатору > Докази російської агресії > Особисті історії"
        "8"	"Руйнування, злочини"	"Корньова рубрика тематичного рубрикатору > Докази російської агресії > Руйнування, злочини"
        "11"	"Докази українського спротиву"	"Корньова рубрика тематичного рубрикатору > Докази українського спротиву"
        "13"	"Інформаційний спротив (викриття фейків, маніпуляцій)"	"Корньова рубрика тематичного рубрикатору > Докази українського спротиву > Інформаційний спротив (викриття фейків, маніпуляцій)"
        "12"	"Спротив цивільних"	"Корньова рубрика тематичного рубрикатору > Докази українського спротиву > Спротив цивільних"
        "24"	"Культура під час війни"	"Корньова рубрика тематичного рубрикатору > Культура під час війни"
        "25"	"Бібліотеки України у війні"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Бібліотеки України у війні"
        "28"	"Вірші про війну"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Вірші про війну"
        "34"	"Графічні карикатури, шаржі"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Графічні карикатури, шаржі"
        "33"	"Гумор, прозовий та віршований"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Гумор, прозовий та віршований"
        "26"	"Культурне життя під час війни"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Культурне життя під час війни"
        "32"	"Малюнки"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Малюнки"
        "30"	"Мурали"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Мурали"
        "27"	"Пісні про війну"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Пісні про війну"
        "31"	"Плакати"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Плакати"
        "29"	"Проза про війну"	"Корньова рубрика тематичного рубрикатору > Культура під час війни > Проза про війну"
        "19"	"Міжнародна підтримка"	"Корньова рубрика тематичного рубрикатору > Міжнародна підтримка"
        "23"	"Вуличні акції"	"Корньова рубрика тематичного рубрикатору > Міжнародна підтримка > Вуличні акції"
        "20"	"Міжнародне співробітництво"	"Корньова рубрика тематичного рубрикатору > Міжнародна підтримка > Міжнародне співробітництво"
        "21"	"Підтримка зарубіжними організаціями"	"Корньова рубрика тематичного рубрикатору > Міжнародна підтримка > Підтримка зарубіжними організаціями"
        "22"	"Підтримка окремими людьми"	"Корньова рубрика тематичного рубрикатору > Міжнародна підтримка > Підтримка окремими людьми"
*/
        
    }
}
