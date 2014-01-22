<div class="spots form">
<?php echo $this->Form->create('Spot'); ?>
	<fieldset>
		<legend><?php echo __('Edit Spot'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('big_category');
		echo $this->Form->input('middle_category');
		echo $this->Form->input('small_category');
		echo $this->Form->input('big_area');
		echo $this->Form->input('small_area');
		echo $this->Form->input('information_id');
		echo $this->Form->input('kana');
		echo $this->Form->input('name');
		echo $this->Form->input('introduce');
		echo $this->Form->input('passcode');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('fax');
		echo $this->Form->input('referrer');
		echo $this->Form->input('airport1');
		echo $this->Form->input('airport2');
		echo $this->Form->input('airport3');
		echo $this->Form->input('station1');
		echo $this->Form->input('station2');
		echo $this->Form->input('station3');
		echo $this->Form->input('bus1');
		echo $this->Form->input('bus2');
		echo $this->Form->input('bus3');
		echo $this->Form->input('parking_flag');
		echo $this->Form->input('parking_fee');
		echo $this->Form->input('access1');
		echo $this->Form->input('access2');
		echo $this->Form->input('access3');
		echo $this->Form->input('manager');
		echo $this->Form->input('business_day');
		echo $this->Form->input('business_hour');
		echo $this->Form->input('url');
		echo $this->Form->input('establishment1');
		echo $this->Form->input('establishment2');
		echo $this->Form->input('establishment3');
		echo $this->Form->input('establishment4');
		echo $this->Form->input('establishment5');
		echo $this->Form->input('latlng');
		echo $this->Form->input('youtube');
		echo $this->Form->input('staytime');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Spot.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Spot.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Spots'), array('action' => 'index')); ?></li>
	</ul>
</div>
