<div class="parks view">
<h2><?php echo __('Park'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($park['Park']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($park['Park']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sno'); ?></dt>
		<dd>
			<?php echo h($park['Park']['sno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo h($park['Park']['area']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cunli'); ?></dt>
		<dd>
			<?php echo h($park['Park']['cunli']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Size'); ?></dt>
		<dd>
			<?php echo h($park['Park']['size']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class'); ?></dt>
		<dd>
			<?php echo h($park['Park']['class']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Location'); ?></dt>
		<dd>
			<?php echo h($park['Park']['location']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($park['Park']['longitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($park['Park']['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admin'); ?></dt>
		<dd>
			<?php echo h($park['Park']['admin']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Land Zone'); ?></dt>
		<dd>
			<?php echo h($park['Park']['land_zone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($park['Park']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($park['Park']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Park'), array('action' => 'edit', $park['Park']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Park'), array('action' => 'delete', $park['Park']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $park['Park']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Parks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Park'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Issues'), array('controller' => 'issues', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Issues'); ?></h3>
	<?php if (!empty($park['Issue'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Is Active'); ?></th>
		<th><?php echo __('Park Id'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Pic'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Created By'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Modified By'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($park['Issue'] as $issue): ?>
		<tr>
			<td><?php echo $issue['id']; ?></td>
			<td><?php echo $issue['is_active']; ?></td>
			<td><?php echo $issue['park_id']; ?></td>
			<td><?php echo $issue['status']; ?></td>
			<td><?php echo $issue['pic']; ?></td>
			<td><?php echo $issue['created']; ?></td>
			<td><?php echo $issue['created_by']; ?></td>
			<td><?php echo $issue['modified']; ?></td>
			<td><?php echo $issue['modified_by']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'issues', 'action' => 'view', $issue['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'issues', 'action' => 'edit', $issue['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'issues', 'action' => 'delete', $issue['id']), array('confirm' => __('Are you sure you want to delete # %s?', $issue['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
