<?php
require "getData.php";

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Button;
?>
</div>
<div class ="row">
    <div class = "col-md-10">
        <nav aria-label="Page navigation">
            <ul class="pagination">
            <li>
                <a href="/index.php?r=site%2Fcomments&page=<?= $Previous;?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo; Previous</span>
                </a>
            </li>
            <?php for($i = 1; $i<= $pages; $i++) : ?>
            <li><a href="/index.php?r=site%2Fcomments&page=<?= $i;?>"><?= $i; ?></a>
            </li>
            <?php endfor;?>
            <li>
                <a href="/index.php?r=site%2Fcomments&page=<?= $Next;?>" aria-label="Next">
                    <span aria-hidden="true">Next &raquo;</span>
                </a>
            </li>
            </ul>
        </nav>
    </div>
</div>
<?php if($_SERVER['REQUEST_URI'] == "/index.php?r=site%2Fcomments&page=".$pages){
$form = ActiveForm::begin([
    'id'=>'comment-form',
    'enableAjaxValidation'=>true
]);?> 
<?=$form->field($model,'nickname');?> 
<?=$form->field($model,'email');?> 
<?=$form->field($model,'comment');?>
<?=Html::submitButton('Отправить комментарий',['id'=>'sendBtn','class'=> 'btn btn-primary']);?>
<?php ActiveForm::end();}?>
<script src= "/scripts/ajax.js" defer></script>
<script src= "/scripts/deleteBtn.js" defer></script>
