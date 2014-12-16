<?php
/* @var $this MessageController */
/* @var $data Message */
?>

<div class="view">

	<b><?php echo CHtml::encode(Message::model()->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['id']), array('view', 'id'=>$data['id'])); ?>
	<br />

	<b><?php echo CHtml::encode(MessageSend::model()->getAttributeLabel('from_user_id')); ?>:</b>
	<?php echo CHtml::encode($data['from_user_id']); ?>
	<br />

	<b><?php echo CHtml::encode(Message::model()->getAttributeLabel('subject')); ?>:</b>
	<?php echo CHtml::encode($data['subject']); ?>
	<br />



</div>