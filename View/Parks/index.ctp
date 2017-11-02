<div class="parks index">
	<h2><?php echo __('Parks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('sno'); ?></th>
			<th><?php echo $this->Paginator->sort('area'); ?></th>
			<th><?php echo $this->Paginator->sort('cunli'); ?></th>
			<th><?php echo $this->Paginator->sort('size'); ?></th>
			<th><?php echo $this->Paginator->sort('class'); ?></th>
			<th><?php echo $this->Paginator->sort('location'); ?></th>
			<th><?php echo $this->Paginator->sort('longitude'); ?></th>
			<th><?php echo $this->Paginator->sort('latitude'); ?></th>
			<th><?php echo $this->Paginator->sort('admin'); ?></th>
			<th><?php echo $this->Paginator->sort('land_zone'); ?></th>
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($parks as $park): ?>
	<tr>
		<td><?php echo h($park['Park']['id']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['name']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['sno']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['area']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['cunli']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['size']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['class']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['location']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['longitude']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['latitude']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['admin']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['land_zone']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['note']); ?>&nbsp;</td>
		<td><?php echo h($park['Park']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $park['Park']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $park['Park']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $park['Park']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $park['Park']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
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
		<li><?php echo $this->Html->link(__('New Park'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Issues'), array('controller' => 'issues', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
	</ul>
</div>
