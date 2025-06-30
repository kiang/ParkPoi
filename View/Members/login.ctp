<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">
        <h1 class="govuk-heading-xl">登入</h1>
        
        <?php echo $this->Form->create('Member', array('url' => 'login', 'class' => 'govuk-form')); ?>
        
        <div class="govuk-form-group">
            <label class="govuk-label" for="MemberUsername">
                帳號
            </label>
            <?php echo $this->Form->input('username', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberUsername'
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label" for="MemberPassword">
                密碼
            </label>
            <?php echo $this->Form->input('password', array(
                'type' => 'password',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberPassword'
            )); ?>
        </div>
        
        <div class="govuk-button-group">
            <?php echo $this->Form->submit('登入', array('class' => 'govuk-button', 'div' => false)); ?>
            <?php echo $this->Html->link('Facebook 登入', array('action' => 'fb'), array('class' => 'govuk-button govuk-button--secondary')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
    </div>
</div>