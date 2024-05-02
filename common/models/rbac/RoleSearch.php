<?php

namespace common\models\rbac;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\rbac\Role;

/**
 * PageSearch represents the model behind the search form of `common\models\Page`.
 */
class RoleSearch extends Role{

    public function rules(){
        return [
            //[['id', 'status', 'created_at', 'updated_at'], 'integer'],
            //[['type', 'alias', 'title', 'body'], 'safe'],
        ];
    }

    public function scenarios(){
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params){
        $query = Role::find();
        $query->where(['type' => '1']);
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
            'name' => $this->name,
            'rule_name' => $this->rule_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);



        return $dataProvider;
    }
}
