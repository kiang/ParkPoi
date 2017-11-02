<div class="parks form">
<?php echo $this->Form->create('Park'); ?>
	<fieldset>
		<legend><?php echo __('Add Park'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('sno');
		echo $this->Form->input('area');
		echo $this->Form->input('cunli');
		echo $this->Form->input('size');
		echo $this->Form->input('class');
		echo $this->Form->input('location');
		echo $this->Form->input('longitude');
		echo $this->Form->input('latitude');
		echo $this->Form->input('admin');
		echo $this->Form->input('land_zone');
		echo $this->Form->input('note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Parks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Issues'), array('controller' => 'issues', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Issue'), array('controller' => 'issues', 'action' => 'add')); ?> </li>
	</ul>
</div>
