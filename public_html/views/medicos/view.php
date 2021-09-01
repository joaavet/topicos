<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = "Card Dr. {$medico->Nome}";
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-9">
        <div class="col-md-4">
            <img src="<?php echo $medico->imagem?>" class="img-responsive img-circle" alt="<?php echo $medico->Nome?>">
        </div>
        <div class="col-md-8">
            <h1><?php echo $medico->Nome ?></h1>
            <p>Mussum Ipsum, cacilds vidis litro abertis. Viva Forevis aptent taciti sociosqu ad litora torquent. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis. Quem num gosta di mim que vai caçá sua turmis! Praesent vel viverra nisi. Mauris aliquet nunc non turpis scelerisque, eget. </p>
            <div class="col-md-6">
                <div class="row">
                    <h2>Dados</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo $medico->Crm ?></li>
                        <li class="list-group-item"><?php echo $medico->email ?></li>
                        <li class="list-group-item"><?php echo $medico->Endereco ?></li>
                    </ul>    
                </div>
            </div>
            <div class="col-md-6">
                <h2>Clínicas</h2>
                <ul class="list-group list-group-flush">
                <?php $auxClinica = [] ?>
                <?php foreach($medico->medicoHasEspecialidades as $key => $clinica): ?>
                    <?php $auxClinica[$clinica->clinica->Clinica_id]['Nome'] = $clinica->Clinicas->Nome ?>
                    <?php $auxClinica[$clinica->clinica->Clinica_id]['id'] = $clinica->Clinicas->Clinica_id ?>
                <?php endforeach; ?>
                
                <?php foreach($auxClinica as $key => $clinica): ?>
                    <li class="list-group-item"><?=$cinica['Nome']?></li>
                <?php endforeach; ?>
                </ul>
            </div>
            <hr>
        </div>
    </div>
    <div class="col-md-3">
    <img src="<?=$qrCode->writeDataUri()?>" class="img-responsive">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-12">
        <h2>Especialidades</h2>
    </div>
    <?php foreach($medico->medicoHasEspecialidades as $key => $especialidade): ?>
        <div class="col-lg-3">
        <img src="<?php echo $especialidade->especialidades->imagem?>" class="img-responsive" alt="<?php echo $especialidade->especialidades->Titulo?>">
        <h2><?php echo $especialidade->especialidades->Titulo?></h2>
        <?php echo $especialidade->especialidades->SubTitulo?>
        <p><a class="btn btn-primary" href="/<?php echo Url::to('especialidades/view')?>/<?php echo $especialidade->especialidades->Especialidades_id?>-<?php echo $especialidade->especialidades->Titulo?>" role="button">Ver Detalhes »</a></p>
        </div>
        <?php if((++$key > 0)  and ($key % 4 == 0)):?>
        </div>
        <hr>  
        <div class="row">
        <?php endif;?>
    <?php endforeach; ?>
</div>