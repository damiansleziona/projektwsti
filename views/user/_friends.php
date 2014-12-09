<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

	<b><?php echo CHtml::encode(User::model()->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data['id']), array('view', 'id'=>$data['id'])); ?>
	<br />

	<b><?php echo CHtml::encode(User::model()->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data['firstname']); ?>
	<br />

	<b><?php echo CHtml::encode(User::model()->getAttributeLabel('lastname')); ?>:</b>
	<?php echo CHtml::encode(User::model()->lastname); ?>
	<br />

	<b><?php echo CHtml::encode(User::model()->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode(User::model()->username); ?>
	<br />

	<b><?php echo CHtml::encode(User::model()->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode(User::model()->password); ?>
	<br />

	<b><?php echo CHtml::encode(User::model()->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode(User::model()->email); ?>
	<br />

	<b><?php echo CHtml::encode(User::model()->getAttributeLabel('roles')); ?>:</b>
	<?php echo CHtml::encode(User::model()->roles); ?>
	<br />


</div>