<div class="spots index">

<pre>
<?php echo count($arounds); ?>
<?php print_r($arounds); ?>
</pre>

	<h2><?php echo __('Spots'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('big_category'); ?></th>
			<th><?php echo $this->Paginator->sort('middle_category'); ?></th>
			<th><?php echo $this->Paginator->sort('small_category'); ?></th>
			<th><?php echo $this->Paginator->sort('big_area'); ?></th>
			<th><?php echo $this->Paginator->sort('small_area'); ?></th>
			<th><?php echo $this->Paginator->sort('information_id'); ?></th>
			<th><?php echo $this->Paginator->sort('kana'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('introduce'); ?></th>
			<th><?php echo $this->Paginator->sort('passcode'); ?></th>
			<th><?php echo $this->Paginator->sort('address'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('fax'); ?></th>
			<th><?php echo $this->Paginator->sort('referrer'); ?></th>
			<th><?php echo $this->Paginator->sort('airport1'); ?></th>
			<th><?php echo $this->Paginator->sort('airport2'); ?></th>
			<th><?php echo $this->Paginator->sort('airport3'); ?></th>
			<th><?php echo $this->Paginator->sort('station1'); ?></th>
			<th><?php echo $this->Paginator->sort('station2'); ?></th>
			<th><?php echo $this->Paginator->sort('station3'); ?></th>
			<th><?php echo $this->Paginator->sort('bus1'); ?></th>
			<th><?php echo $this->Paginator->sort('bus2'); ?></th>
			<th><?php echo $this->Paginator->sort('bus3'); ?></th>
			<th><?php echo $this->Paginator->sort('parking_flag'); ?></th>
			<th><?php echo $this->Paginator->sort('parking_fee'); ?></th>
			<th><?php echo $this->Paginator->sort('access1'); ?></th>
			<th><?php echo $this->Paginator->sort('access2'); ?></th>
			<th><?php echo $this->Paginator->sort('access3'); ?></th>
			<th><?php echo $this->Paginator->sort('manager'); ?></th>
			<th><?php echo $this->Paginator->sort('business_day'); ?></th>
			<th><?php echo $this->Paginator->sort('business_hour'); ?></th>
			<th><?php echo $this->Paginator->sort('url'); ?></th>
			<th><?php echo $this->Paginator->sort('establishment1'); ?></th>
			<th><?php echo $this->Paginator->sort('establishment2'); ?></th>
			<th><?php echo $this->Paginator->sort('establishment3'); ?></th>
			<th><?php echo $this->Paginator->sort('establishment4'); ?></th>
			<th><?php echo $this->Paginator->sort('establishment5'); ?></th>
			<th><?php echo $this->Paginator->sort('point'); ?></th>
			<th><?php echo $this->Paginator->sort('youtube'); ?></th>
			<th><?php echo $this->Paginator->sort('staytime'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($spots as $spot): ?>
	<tr>
		<td><?php echo h($spot['Spot']['id']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['big_category']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['middle_category']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['small_category']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['big_area']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['small_area']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['information_id']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['kana']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['name']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['introduce']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['passcode']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['address']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['phone']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['fax']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['referrer']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['airport1']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['airport2']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['airport3']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['station1']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['station2']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['station3']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['bus1']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['bus2']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['bus3']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['parking_flag']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['parking_fee']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['access1']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['access2']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['access3']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['manager']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['business_day']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['business_hour']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['url']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['establishment1']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['establishment2']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['establishment3']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['establishment4']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['establishment5']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['point']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['youtube']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['staytime']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['created']); ?>&nbsp;</td>
		<td><?php echo h($spot['Spot']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $spot['Spot']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $spot['Spot']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $spot['Spot']['id']), null, __('Are you sure you want to delete # %s?', $spot['Spot']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Spot'), array('action' => 'add')); ?></li>
	</ul>
</div>
