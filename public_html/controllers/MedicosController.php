<?php

namespace app\controllers;
use app\models\Medicos;
use Da\QrCode\QrCode;
use Da\QrCode\Format\MeCardFormat; 
use yii; 

class MedicosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $medicos = Medicos::find()->orderBy('Nome')->all();

        return $this->render('index',[
            'medicos' => $medicos,
        ]);
    }

    public function actionView($id)
    {

        $medico =  Medicos::findOne($id);


        $format = new MeCardFormat();
        $format->firstName = $medico->Nome;
        $format->email =  $medico->email;
        $format->note =  $medico->Crm;
        $format->address =  $medico->Endereco . ', '. $medico->Bairro;
        $format->url = 'https://'.$medico-> site;

            $qrCode = (new QrCode($format))
        ->setSize(250)
        ->setMargin(5)
        ->useForegroundColor(0 , 0 , 0);

        // new wp can display the qrcode in many ways
        // saving the result ip a file

    $qrCode->writeFile(Yii::getAlias('@web') . "img/{$medico->Medico_id}-{$medico->Nome}.png"); // writer defauts to PNG when none is specifed
        return $this->render('view',['medico' => $medico, 'qrCode' =>$qrCode]);
    
        
    }

}