<?php

namespace app\models;

use yii\base\Model;

class CommentForm extends Model
{
    public $nickname;
    public $email;
    public $comment;
    public function rules()
    {
        return[
            [['nickname','email','comment'],'required'],
            ['email','email']
        ];
    }
}