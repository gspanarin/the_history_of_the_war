<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `common\models\Article`.
 */
class ArticleSearch extends Article{
    
    public $section_array = [];
	public $term_name = '';
	public $term_value = '';
	public $title = '';
	public $query_str = '';
	public $subject = '';
	public $source = '';
	public $publisher = '';
	public $creator = '';
	public $date_event = '';
	
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'section_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['metadata', 'section_array', 'term_name', 'term_value', 'title', 'query_str', 'subject', 'source', 'publisher', 'creator', 'date_event'], 'safe'],
        ];
    }

	

	
    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['created_at' => SORT_DESC]]
        ]);
        
        $this->load($params);


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
			
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'section_id' => $this->section_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'metadata', $this->metadata]);
        if (count($this->section_array) > 0){
            $query->OrFilterWhere(['IN', 'section_id', $this->section_array]);
			$query->OrFilterWhere(['IN', 'section_id_2', $this->section_array]);
			$query->OrFilterWhere(['IN', 'section_id_3', $this->section_array]);
		}
                
		if ($this->term_name != '' && $this->term_value != ''){
			$query->leftJoin ('dictionary', 'dictionary.article_id = article.id');
			$query->andWhere(['dictionary.term_name' => $this->term_name]);
			$query->andWhere(['dictionary.value' => $this->term_value]);
		}
		
		if ($this->title != ''){
			$query->leftJoin ('dictionary', 'dictionary.article_id = article.id');
			$query->andWhere(['dictionary.term_name' => 'title']);
			$query->andWhere(['LIKE', 'dictionary.value', $this->title ]);
		}
		
		if ($this->query_str != ''){
			$query->leftJoin ('dictionary', 'dictionary.article_id = article.id');
			$query->andWhere(['LIKE', 'dictionary.value', $this->query_str ]);
		}
		
		if ($this->creator != ''){
			$query->leftJoin ('dictionary', 'dictionary.article_id = article.id');
			$query->andWhere(['dictionary.term_name' => 'creator']);
			$query->andWhere(['LIKE', 'dictionary.value', $this->creator ]);
		}
		
		if ($this->publisher != ''){
			$query->leftJoin ('dictionary', 'dictionary.article_id = article.id');
			$query->andWhere(['dictionary.term_name' => 'publisher']);
			$query->andWhere(['LIKE', 'dictionary.value', $this->publisher ]);
		}
		
		if ($this->subject != ''){
			$query->leftJoin ('dictionary', 'dictionary.article_id = article.id');
			$query->andWhere(['dictionary.term_name' => 'subject']);
			$query->andWhere(['LIKE', 'dictionary.value', $this->subject ]);
		}
		
		if ($this->date_event != ''){
			$query->leftJoin ('dictionary', 'dictionary.article_id = article.id');
			$query->andWhere(['dictionary.term_name' => 'date_event']);
			$query->andWhere(['LIKE', 'dictionary.value', $this->date_event ]);
		}
                
                
                
		//dd($query);
        /*$tags = [];
		if (isset($params['ArticleSearch'])){
		foreach($params['ArticleSearch'] as $key => $value)
            if (strpos($key, 'tag_') !== false)
                $tags[] = [
                    'key' => substr($key,4),
                    'value' => $value
                ];
		}*/
        //dd($query);
		return $dataProvider;
    }
}
