<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Statistic;


class StatisticSearch extends Section{

    public function scenarios(){
        return Model::scenarios();
    }

    
    public function search($params){
        $query = Section::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'module' => $this->module,
            'controller' => $this->controller,
            'action' => $this->action,
            'created_at' => $this->created_at,

        ]);



        return $dataProvider;
    }
    
    
    //$model = ModelName::find()->where(['between', 'date', "2014-12-31", "2015-02-31" ])->all();
    
}
