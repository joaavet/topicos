<?php

namespace app\models\Search\MedicoSearch;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Medicos;

/**
 * MedicosSearch represents the model behind the search form of `app\models\Medicos`.
 */
class MedicoSearch extends Medicos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Medico_id', 'ibge', 'destaque', 'status'], 'integer'],
            [['Crm', 'Nome', 'Endereco', 'Bairro', 'email', 'tem_clinica', 'site', 'imagem', 'criado_em', 'atualizado_em'], 'safe'],
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
        $query = Medicos::find();

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
            'Medico_id' => $this->Medico_id,
            'ibge' => $this->ibge,
            'criado_em' => $this->criado_em,
            'atualizado_em' => $this->atualizado_em,
            'destaque' => $this->destaque,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'Crm', $this->Crm])
            ->andFilterWhere(['like', 'Nome', $this->Nome])
            ->andFilterWhere(['like', 'Endereco', $this->Endereco])
            ->andFilterWhere(['like', 'Bairro', $this->Bairro])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'tem_clinica', $this->tem_clinica])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'imagem', $this->imagem]);

        return $dataProvider;
    }
}
