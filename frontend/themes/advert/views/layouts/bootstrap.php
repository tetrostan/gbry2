<?php
use yii\helpers\Html;

\frontend\assets\MainAsset::register($this); // $this - View class
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->title ?> </title>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?> <!-- js & css scripts -->
</head>

<body>
<?php $this->beginBody() ?>
<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <?php Yii::$app->session->getFlash('success') ?>
<?php endif; ?>

<!-- через $this обращаемся к классу View-->
<!-- `//` означает что мы находимся в папке frontend/views-->
<!-- render() belongs to the View class -->
<?= $this->render("//common/head") ?>
<? //= __FILE__ ?>
<?= $content ?>

<?= $this->render("//common/footer") ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>