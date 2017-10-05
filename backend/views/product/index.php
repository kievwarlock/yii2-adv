<?php

use yii\helpers\Html;
use app\models\Product;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php

    //dvar_dump($dataProvider);
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name ? $data->category->name : 'Пусто' ;
                },
            ],
            [
                'attribute' => 'description',

            ],
           //'description::ntext',

            'price',
            'image',
            // 'meta_title',
            // 'meta_description',
            // 'sale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
