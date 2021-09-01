<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Clinicas".
 *
 * @property int $Clinica_id
 *
 * @property MedicoHasEspecialidades[] $medicoHasEspecialidades
 */
class Clinicas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Clinicas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Clinica_id'], 'required'],
            [['Clinica_id'], 'integer'],
            [['Clinica_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Clinica_id' => Yii::t('app', 'Clinica ID'),
        ];
    }

    /**
     * Gets query for [[MedicoHasEspecialidades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicoHasEspecialidades()
    {
        return $this->hasMany(MedicoHasEspecialidades::className(), ['Clinica_id' => 'Clinica_id']);
    }
}
