<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">
        <h1 class="govuk-heading-l">建立管理員帳號</h1>
        
        <?php echo $this->Form->create('Member', array('url' => 'setup')); ?>
        
        <div class="govuk-form-group">
            <label class="govuk-label govuk-label--m" for="MemberUsername">使用者名稱</label>
            <?php echo $this->Form->input('username', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberUsername'
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label govuk-label--m" for="MemberPassword">密碼</label>
            <?php echo $this->Form->input('password', array(
                'type' => 'password',
                'value' => '',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberPassword'
            )); ?>
        </div>
        
        <div class="govuk-button-group">
            <?php echo $this->Form->submit('建立管理員', array('class' => 'govuk-button')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
    </div>
</div>
