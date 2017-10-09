<?php

use yii\helpers\Html;
use app\models\Category;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\InputFile;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?php

    $categories = Category::find()->all();
    $items = ArrayHelper::map($categories,'id','name');
    $params = [
        'prompt' => 'Укажите категорию'
    ];
    echo $form->field($model, 'category_id')->dropDownList($items,$params);
    ?>

    <?=

    $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
    ]);


    ?>



    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'meta_title')->textInput() ?>

    <?= $form->field($model, 'meta_description')->textInput() ?>

    <?=
    //$form->field($model, 'image')->textInput()
    $form->field($model, 'image')->widget(InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple'      => false       // возможность выбора нескольких файлов
    ]);

    ?>

    <?= $form->field($model, 'sale')->checkbox([
       '0' => 'Not Sale',
       '1' => 'Sale',
    ],
    [
       'prompt' => 'Выберите статус...'
     ]
    );
    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
