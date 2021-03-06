<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
       <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?php

        if( Yii::$app->user->isGuest === true ){

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [

                        ['label' => 'Admin panel', 'options' => ['class' => 'header']],


                       ['label' => 'login', 'url' => ['admin/login'], 'visible' => Yii::$app->user->isGuest],

                    ],
                ]
            );
        }else{

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [

                        ['label' => 'Admin panel', 'options' => ['class' => 'header']],
                        ['label' => 'Categories', 'icon' => 'list', 'url' => ['/category'] ,
                         'items' => [

                             ['label' => 'All categories', 'icon' => 'dashboard', 'url' => ['/category'],],
                             ['label' => 'Add category', 'icon' => 'plus', 'url' => ['/category/create'],],
                         ],

                        ],

                        ['label' => 'Products', 'icon' => 'list', 'url' => ['/product'] ,
                         'items' => [

                             ['label' => 'All Products', 'icon' => 'dashboard', 'url' => ['/product'],],
                             ['label' => 'Add Product', 'icon' => 'plus', 'url' => ['/product/create'],],
                         ],



                        ],

                        ['label' => 'Users', 'icon' => 'file-code-o', 'url' => ['/user']],
                        ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                        ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],

                        [
                            'label' => 'Same tools',
                            'icon' => 'share',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                                ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                                [
                                    'label' => 'Level One',
                                    'icon' => 'circle-o',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                        [
                                            'label' => 'Level Two',
                                            'icon' => 'circle-o',
                                            'url' => '#',
                                            'items' => [
                                                ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                                ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ]
            );
        }


        ?>
        <?=

            \yii\helpers\Html::a(
            'Sign out',
            ['/admin/logout'],
            ['data-method' => 'post', 'class' => 'btn']
        ) ?>

    </section>

</aside>
