<?php
echo $this->Form->create('Member', array('url' => 'login'));
?><div class="Members form"><?php
    echo $this->Form->input('username', array(
        'type' => 'text',
        'label' => '帳號',
        'div' => 'form-group col',
        'class' => 'form-control',
    ));
    echo $this->Form->input('password', array(
        'type' => 'password',
        'label' => '密碼',
        'div' => 'form-group col',
        'class' => 'form-control',
    ));
    echo $this->Form->submit('登入', array('class' => 'btn btn-primary btn-lg btn-block', 'div' => false));
    echo $this->Html->link('Facebook 登入', array('action' => 'fb'), array('class' => 'btn btn-primary btn-lg btn-block'));
    echo $this->Form->end();
    ?></div>