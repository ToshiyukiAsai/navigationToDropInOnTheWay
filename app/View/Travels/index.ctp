<div class="travels index">
	<h2><?php echo __('Travels'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('start_spot'); ?></th>
			<th><?php echo $this->Paginator->sort('goal_spot'); ?></th>
			<th><?php echo $this->Paginator->sort('starttime'); ?></th>
			<th><?php echo $this->Paginator->sort('goaltime'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($travels as $travel): ?>
	<tr>
		<td><?php echo h($travel['Travel']['id']); ?>&nbsp;</td>
		<td><?php echo h($travel['Travel']['start_spot']); ?>&nbsp;</td>
		<td><?php echo h($travel['Travel']['goal_spot']); ?>&nbsp;</td>
		<td><?php echo h($travel['Travel']['starttime']); ?>&nbsp;</td>
		<td><?php echo h($travel['Travel']['goaltime']); ?>&nbsp;</td>
		<td><?php echo h($travel['Travel']['created']); ?>&nbsp;</td>
		<td><?php echo h($travel['Travel']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $travel['Travel']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $travel['Travel']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $travel['Travel']['id']), null, __('Are you sure you want to delete # %s?', $travel['Travel']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Travel'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Logs'), array('controller' => 'logs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Log'), array('controller' => 'logs', 'action' => 'add')); ?> </li>
	</ul>
</div>
