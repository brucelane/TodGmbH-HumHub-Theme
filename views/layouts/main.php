<?php

use yii\helpers\Html;
use humhub\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- start: Meta -->
        <meta charset="utf-8">
        <title><?php echo $this->pageTitle; ?></title>
        <!-- end: Meta -->

        <!-- start: Mobile Specific -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- end: Mobile Specific -->
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>

        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="<?php echo Yii::getAlias(" @web"); ?>/js/html5shiv.js"></script>
        <link id = "ie-style" href = "<?php echo Yii::getAlias("@web"); ?>/css/ie.css" rel="stylesheet" >
        <![endif]-->

        <!--[if IE 9]>
        <link id="ie9style" href="<?php echo Yii::getAlias(" @web"); ?>/css/ie9.css" rel="stylesheet">
        <![endif]-->

        <!-- start: render additional head (css and js files) -->
        <?php echo $this->render('head'); ?>
        <!-- end: render additional head -->


        <!-- start: Favicon and Touch Icons -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72"
              href="<?php echo Yii::getAlias("@web"); ?>//ico/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16"
              href="<?php echo Yii::getAlias("@web"); ?>/ico/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta charset="<?= Yii::$app->charset ?>">
        <!-- end: Favicon and Touch Icons -->

    </head>

    <body>
	
	<script src="<?php echo $this->theme->getBaseUrl() . '/js/lightbox-plus-jquery.min.js'; ?>"></script>

    <!-- TogetherJS Start -->
    <script src="https://togetherjs.com/togetherjs-min.js"></script>
	<!-- TogetherJS End -->
    
    <?php $this->beginBody() ?>
	
    <!-- start: first top navigation bar -->
    <div id="topbar-first" class="topbar">
        <div class="container">

            <div class="topbar-brand hidden-xs">
                <?php echo \humhub\widgets\SiteLogo::widget(); ?>
            </div>
            <!-- TogetherJS Button Start -->
            <div class="topbar-actions pull-right">
                <div class="no-icons">
            <a class="btn btn-info btn-xs" style="margin-top: 14px;" onclick="TogetherJS(this); return false;">Chat</a>
                </div>
            <!-- TogetherJS Button End -->
            </div>

            <div class="topbar-actions pull-right">
				<div class="no-icons">
					<?php echo \humhub\modules\user\widgets\AccountTopMenu::widget(); ?>
				</div>
            
            </div>
            

            <div class="notifications pull-right">
                <?php
                echo \humhub\widgets\NotificationArea::widget(['widgets' => [
                    [\humhub\modules\notification\widgets\Overview::className(), [], ['sortOrder' => 10]],
                ]]);
                ?>
            </div>

        </div>
    </div>
    <!-- end: first top navigation bar -->

    <?php echo \humhub\modules\tour\widgets\Tour::widget(); ?>

    <!-- start: show content (and check, if exists a sublayout -->
    <?php if (isset($this->context->subLayout) && $this->context->subLayout != "") : ?>
        <?php echo $this->render($this->context->subLayout, array('content' => $content)); ?>
    <?php else: ?>
        <?php echo $content; ?>
    <?php endif; ?>
    <!-- end: show content -->

    <!-- start: Modal (every lightbox will/should use this construct to show content)-->
    <div class="modal" id="globalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <?php echo \humhub\widgets\LoaderWidget::widget(); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end: Modal -->

    <?php echo \humhub\models\Setting::GetText('trackingHtmlCode'); ?>
    <?php $this->endBody() ?>
	
	<div class="container">
		<div class="col-md-12 layout-content-container">
			<footer>
				<div class="copyright">
					<span>Copyright 2015-2017 by <a target="_blank" href="http://web-crew.org">WebCrew</a></span>
				</div>
			</footer>
		</div>
	</div>
	

    </body>
    </html>
<?php $this->endPage() ?>