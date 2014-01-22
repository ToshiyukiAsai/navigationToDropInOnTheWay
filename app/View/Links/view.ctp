<div class="links view">
<h2><?php echo __('Link'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($link['Link']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SpotFrom'); ?></dt>
		<dd>
			<?php echo h($link['Link']['spotFrom']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('SpotTo'); ?></dt>
		<dd>
			<?php echo h($link['Link']['spotTo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Coordinate'); ?></dt>
		<dd>
			<?php echo h($link['Link']['coordinate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Traveltime'); ?></dt>
		<dd>
			<?php echo h($link['Link']['traveltime']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Link'), array('action' => 'edit', $link['Link']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Link'), array('action' => 'delete', $link['Link']['id']), null, __('Are you sure you want to delete # %s?', $link['Link']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Links'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Link'), array('action' => 'add')); ?> </li>
	</ul>
</div>
