<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class ArticleSearchForm extends Model
{
    public $section_id;
    public $query_str;
    public $subject;
	public $source;
    public $publisher;
    public $creator;
	public $title;
	


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
			['section_id', 'trim'],
			
            ['query_str', 'trim'],
            ['query_str', 'string', 'min' => 2, 'max' => 127],

            ['subject', 'trim'],
            ['subject', 'string', 'max' => 127],
			
			['source', 'trim'],
            ['source', 'string', 'max' => 127],
			
			['publisher', 'trim'],
            ['publisher', 'string', 'max' => 127],
			
			['creator', 'trim'],
            ['creator', 'string', 'max' => 127],
			
			['title', 'trim'],
            ['title', 'string', 'max' => 127],
        ];
    }

}
