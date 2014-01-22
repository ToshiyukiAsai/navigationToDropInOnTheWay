<div class="logs form">
<?php echo $this->Form->create('Log'); ?>
	<fieldset>
		<legend><?php echo __('Add Log'); ?></legend>
	<?php
		echo $this->Form->input('latlng');
		echo $this->Form->input('travel_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Logs'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Travels'), array('controller' => 'travels', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel'), array('controller' => 'travels', 'action' => 'add')); ?> </li>
	</ul>
</div>
