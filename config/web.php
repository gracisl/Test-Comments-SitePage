<?php
return [
        'id' =>'comments.localhost',
        'basePath' => realpath(__DIR__.'/../'),
        'components'=> [
                'request'=>[
                        'enableCookieValidation'=>true,
                        'enableCsrfValidation'=>true,
                        'cookieValidationKey'=>'xxxxxxxx'
                ],

        ]
];