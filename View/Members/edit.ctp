<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">
        <?php echo $this->Form->create('Member'); ?>
        <fieldset class="govuk-fieldset">
            <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                <h1 class="govuk-fieldset__heading">
                    編輯帳號
                </h1>
            </legend>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="MemberUsername">
                    帳號
                </label>
                <?php echo $this->Form->input('Member.username', array(
                    'type' => 'text',
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="MemberPassword">
                    密碼
                </label>
                <?php echo $this->Form->input('Member.password', array(
                    'type' => 'password',
                    'value' => '',
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="MemberNickname">
                    暱稱
                </label>
                <?php echo $this->Form->input('Member.nickname', array(
                    'type' => 'text',
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="MemberEmail">
                    信箱
                </label>
                <?php echo $this->Form->input('Member.email', array(
                    'type' => 'text',
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
        </fieldset>
        <?php echo $this->Form->submit('送出', array('class' => 'govuk-button')); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>
