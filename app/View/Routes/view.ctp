<div class="routes view">
<h2><?php echo __('Route'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($route['Route']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Links'); ?></dt>
		<dd>
			<?php echo $this->Html->link($route['Links']['id'], array('controller' => 'links', 'action' => 'view', $route['Links']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staytime Sum'); ?></dt>
		<dd>
			<?php echo h($route['Route']['staytime_sum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Traveltime Sum'); ?></dt>
		<dd>
			<?php echo h($route['Route']['traveltime_sum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Center Latlng'); ?></dt>
		<dd>
			<?php echo h($route['Route']['center_latlng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($route['Route']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($route['Route']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Route'), array('action' => 'edit', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Route'), array('action' => 'delete', $route['Route']['id']), null, __('Are you sure you want to delete # %s?', $route['Route']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Routes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Route'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Links'), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Links'), array('controller' => 'links', 'action' => 'add')); ?> </li>
	</ul>
</div>
