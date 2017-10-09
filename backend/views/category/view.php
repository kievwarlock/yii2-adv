<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name:ntext',
            //'parent',
            [
                'attribute' => 'parent',
                'value' => function($data){
                    $category_name =  Category::find()->where( ['parent' => $data->id ] )->asArray()->one();
                    return $category_name['name'] ? $category_name['name'] : 'Пусто' ;
                },
            ],
            'description:ntext',
            'meta_title:ntext',
            'meta_description:ntext',
            'alias:ntext',
        ],
    ]) ?>

</div>
