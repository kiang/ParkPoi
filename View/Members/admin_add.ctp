<div class="members form">
    <?php echo $this->Form->create('Member'); ?>
    <fieldset>
        <legend>新增帳號</legend>
        <?php
        echo $this->Form->input('Member.username', array(
            'type' => 'text',
            'label' => '帳號',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.group_id', array(
            'type' => 'select',
            'label' => '群組',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.password', array(
            'type' => 'password',
            'label' => '密碼',
            'value' => '',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.nickname', array(
            'type' => 'text',
            'label' => '暱稱',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.email', array(
            'type' => 'text',
            'label' => '信箱',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Member.user_status', array(
            'type' => 'radio',
            'legend' => '狀態',
            'options' => array('Y' => 'Y', 'N' => 'N'),
            'div' => 'form-group',
        ));
        ?>
    </fieldset>
    <?php echo $this->Form->end('送出'); ?>
</div>
