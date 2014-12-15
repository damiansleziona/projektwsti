<?php
/* @var $this MessageController */
/* @var $model Message */

$this->breadcrumbs=array(
	'Messages'=>array('index'),
	'Wyślij wiadomość',
);

$this->menu=array(
	array('label'=>'List Message', 'url'=>array('index')),
	array('label'=>'Manage Message', 'url'=>array('admin')),
);
?>

<h1>Create Message</h1>

<?php $this->renderPartial('_send', array('model'=>$model, 'to_user_id'=>$to_user_id)); ?>