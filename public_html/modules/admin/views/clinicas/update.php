<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clinicas */

$this->title = 'Update Clinicas: ' . $model->Clinica_id;
$this->params['breadcrumbs'][] = ['label' => 'Clinicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Clinica_id, 'url' => ['view', 'id' => $model->Clinica_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clinicas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
