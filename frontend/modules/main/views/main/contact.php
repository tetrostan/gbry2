<div class="row contact">
    <div class="col-lg-6 col-sm-6">
        <?php
        $form = \yii\bootstrap\ActiveForm::begin([
            'enableClientValidation' => true,
            'enableAjaxValidation' => false,
        ]);
        ?>

        <?php echo $form->field($model, 'name'); ?>
        <?php echo $form->field($model, 'email'); ?>
        <?php echo $form->field($model, 'subject'); ?>
        <?php echo $form->field($model, 'body')->textarea(['rows' => 6]); ?>
        <?php echo $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
            'template' => '<div class="row">
                                <div class="col-lg-3">{image}</div>
                                <div class="col-lg-6">{input}</div>
                           </div>',
            'captchaAction' => \yii\helpers\Url::to(['main/captcha']),
        ]); ?>

        <?php echo \yii\helpers\Html::submitButton('Send', ['class' => 'btn btn-success']) ?>

        <?php \yii\bootstrap\ActiveForm::end(); ?>
    </div>
</div>