<?php

use humhub\widgets\Button;
use yii\helpers\Html;
use yii\helpers\Url;
use humhub\modules\ui\form\widgets\ActiveForm;
?>

<?php $this->beginContent('@admin/views/setting/_advancedLayout.php') ?>

<div class="clearfix">
    <?= Button::back(Url::to(['setting/oembed']),  Yii::t('AdminModule.settings', 'Back to overview')) ?>
    <h4 class="pull-left">
        <?php
        if ($prefix == "") {
            echo Yii::t('AdminModule.settings', 'Add OEmbed provider');
        } else {
            echo Yii::t('AdminModule.settings', 'Edit OEmbed provider');
        }
        ?>
    </h4>
</div>

<br>

<?php $form = ActiveForm::begin(['id' => 'authentication-settings-form']); ?>


<?= $form->errorSummary($model); ?>

<div class="form-group">
    <?= $form->field($model, 'prefix')->textInput(['class' => 'form-control']); ?>
    <p class="help-block"><?= Yii::t('AdminModule.settings', 'Url Prefix without http:// or https:// (e.g. youtube.com)'); ?></p>
</div>

<div class="form-group">
    <?= $form->field($model, 'endpoint')->textInput(['class' => 'form-control']); ?>
    <p class="help-block"><?= Yii::t('AdminModule.settings', 'Use %url% as placeholder for URL. Format needs to be JSON. (e.g. http://www.youtube.com/oembed?url=%url%&format=json)'); ?></p>
</div>


<?= Html::submitButton(Yii::t('AdminModule.settings', 'Save'), ['class' => 'btn btn-primary', 'data-ui-loader' => ""]); ?>
<?php ActiveForm::end(); ?>

<?php if ($prefix != ""): ?>
    <?= Html::a(Yii::t('AdminModule.settings', 'Delete'), Url::to(['oembed-delete', 'prefix' => $prefix]), ['class' => 'btn btn-danger pull-right', 'data-method' => 'POST']); ?>
<?php endif; ?>

<?php $this->endContent(); ?>
