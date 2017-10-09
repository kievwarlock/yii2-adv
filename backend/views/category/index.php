<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Category;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name:ntext',
           // 'parent',

            [
                'attribute' => 'parent',
                'value' => function($data){
                    $category_name =  Category::find()->where( ['parent' => $data->id ] )->asArray()->one();
                    return $category_name['name'] ? $category_name['name'] : 'Пусто' ;
                },
            ],
            'description:ntext',
            'meta_title:ntext',
            // 'meta_description:ntext',
            // 'alias:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
