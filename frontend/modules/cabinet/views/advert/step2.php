<?php
use yii\bootstrap\ActiveForm;
use \yii\helpers\Html;
use \yii\helpers\Url;

$form = ActiveForm::begin(); ?>

    <div class="row">
        <?php
        echo $form->field($model, 'general_image')->widget(\kartik\file\FileInput::classname(), [
            'options' => [
                'accept' => 'image/*',
            ],
            'pluginOptions' => [
                'uploadUrl' => Url::to(['file-upload-general']), // /cabinet/advert/file-upload-general
                'uploadExtraData' => [
                    'advert_id' => $model->idadvert,
                ],
                'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                'initialPreview' => $image,
                'showUpload' => true,
                'showRemove' => true,
                'dropZoneEnabled' => false,
            ],
        ]);
        ?>
    </div>

    <div class="row">
        <?php
        echo Html::label('Images');
        echo \kartik\file\FileInput::widget([
            'name' => 'images',
            'options' => [
                'accept' => 'image/*',
                'multiple' => true,
            ],
            'pluginOptions' => [
                'uploadUrl' => Url::to(['file-upload-images']),
                'uploadExtraData' => [
                    'advert_id' => $model->idadvert,
                ],
                'overwriteInitial' => false,
                'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                'initialPreview' => $images_add,
                'showUpload' => true,
                'showRemove' => false,
                'dropZoneEnabled' => false,
            ],
        ]);
        ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>