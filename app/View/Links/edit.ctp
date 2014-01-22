<div class="links form">
<?php echo $this->Form->create('Link'); ?>
	<fieldset>
		<legend><?php echo __('Edit Link'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('spotFrom');
		echo $this->Form->input('spotTo');
		echo $this->Form->input('coordinate');
		echo $this->Form->input('traveltime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Link.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Link.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Links'), array('action' => 'index')); ?></li>
	</ul>
</div>
