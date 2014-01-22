<div class="travels view">
<h2><?php echo __('Travel'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Spot'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['start_spot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goal Spot'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['goal_spot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Starttime'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['starttime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goaltime'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['goaltime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($travel['Travel']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Travel'), array('action' => 'edit', $travel['Travel']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Travel'), array('action' => 'delete', $travel['Travel']['id']), null, __('Are you sure you want to delete # %s?', $travel['Travel']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Travels'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Travel'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Logs'); ?></h3>
	<?php if (!empty($travel['Log'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Latlng'); ?></th>
		<th><?php echo __('Travel Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travel['Log'] as $log): ?>
		<tr>
			<td><?php echo $log['id']; ?></td>
			<td><?php echo $log['latlng']; ?></td>
			<td><?php echo $log['travel_id']; ?></td>
			<td><?php echo $log['created']; ?></td>
			<td><?php echo $log['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'logs', 'action' => 'view', $log['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'logs', 'action' => 'edit', $log['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'logs', 'action' => 'delete', $log['id']), null, __('Are you sure you want to delete # %s?', $log['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
