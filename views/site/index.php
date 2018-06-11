<?php 
use app\models\Comments;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$model = new Comments();
$request  = Yii::$app->request; 
$session = Yii::$app->session;
$user_session = $session->get('user_id');
$comments = $model->getAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Comments PAGE</title>
    <meta charset="utf-8">
</head>
    <body>
        <div id="comments-header">
            <h1>Comments Page</h1>
        </div>
        <div id="comments-form">
            <h3>Please add your comment</h3>
            <label>Comments:</label>
            <?php 
            $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'comment')->textInput(['maxlength' => true])->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Submit', ['name' => 'comments']); ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div id="comments-panel">
            <?php foreach ($comments as $key => $comment) :?>
                <p <?php if ($comment->user_id == $user_session) 
                    echo 'style="font-weight:bold;"'?>>
                    <?php 
                    echo $comment->comment;?> <span class="comment-date">(<?php echo $comment->created_at.')';?></span>
                </p>
            <?php endforeach;?>
        </div>
    </body>
</html>