<div class="travels form">
<?php echo $this->Form->create('Travel'); ?>
	<fieldset>
		<legend><?php echo __('Add Travel'); ?></legend>
	<?php
		echo $this->Form->input('start_spot');
		echo $this->Form->input('goal_spot');
		echo $this->Form->input('starttime');
		echo $this->Form->input('goaltime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Travels'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
