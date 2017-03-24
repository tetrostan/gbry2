<?php
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;

?>
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Login</h4>
                    <?php
                    $form = ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::to(['/validate/index']),
                        // 'validationUrl' => \yii\helpers\Url::to(['@login']),
                    ]);
                    ?><!-- Autofocus does not work -->
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>

                    <?= Html::submitButton('Login', ['class' => 'btn btn-success']) ?>
                    <?php ActiveForm::end(); ?>
                </div>
                <div class="col-sm-6">
                    <h4>New User Sign Up</h4>
                    <p>Join today and get updated with all the properties deal happening around.</p>
                    <button type="submit" class="btn btn-info"
                            onclick="window.location.href='<?= Url::to('main/main/register/') ?>'">Join Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>