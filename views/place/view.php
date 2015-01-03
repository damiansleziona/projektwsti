<?php
/* @var $this PlaceController */
/* @var $model Place */

$this->breadcrumbs=array(
	'Places'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Place', 'url'=>array('index')),
	array('label'=>'Create Place', 'url'=>array('create')),
	array('label'=>'Update Place', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Place', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Place', 'url'=>array('admin')),
);
?>

<h1>View Place #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'cr_user_id',
		'short_description',
		'description',
		'voivodeship',
		'city',
		'latitude',
		'longitude',
	),
)); ?>

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4739.555723443378!2d19.00832929999999!3d50.1271456!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spl!2spl!4v1419100673337" width="600" height="450" frameborder="0" style="border:0"></iframe>
<?php
$this->widget('application.extensions.slider.Slider',array(
'items'=>array(
array(Yii::app()->getBaseUrl(true).'/images/box_h.png', 'image1'),
array(Yii::app()->getBaseUrl(true).'/images/hbox_tl.png', 'image2'),
),
'options'=>array(
'speed'=>'3000',
),
));
?>