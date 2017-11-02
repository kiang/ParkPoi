<div class="parks form">
    <?php echo $this->Form->create('Park'); ?>
    <fieldset>
        <legend><?php echo __('Edit Park'); ?></legend>
        <?php
        echo $this->Form->input('id');
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