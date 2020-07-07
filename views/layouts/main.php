<?php
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->beginPage();
?>

<html>
    <head>
        <title>Comments Page</title>
        <style>
            .wrapper
            {
                display:grid;
                grid-row-gap: 1em;

            }
            .wrapper > div
            {
                padding: 1em;
                background-color: #FDF5E6;
            }
            
        </style>
        <?php $this->head(); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>


    <body>
        <?php $this->beginBody();?>
        <?php

        NavBar::begin([
        'brandLabel' => 'GraciSL',
        'brandUrl' => Yii::$app->homeurl,
        'options' =>[
            'class'=>'navbar-default navbar-fixed-top'
        ]
        ]);
        $items=[
            ['label'=>'Comments','url'=>['/site/comments']]
        ];
        echo Nav::widget([
            'options'=>['class'=> 'navbar-nav navbar-right'],
            'items'=>$items
        ]);
       NavBar::end();
        ?>
        <div class="container" style="margin-top: 60px">
        <?= $content ?>
        </div>
        <?php $this->endBody();?>
    </body>
</html>
<?php $this->endPage();?>
