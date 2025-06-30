<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">
        <h1 class="govuk-heading-l">新增帳號</h1>
        
        <?php echo $this->Form->create('Member'); ?>
        
        <div class="govuk-form-group">
            <label class="govuk-label govuk-label--m" for="MemberUsername">帳號</label>
            <?php echo $this->Form->input('Member.username', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberUsername'
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label govuk-label--m" for="MemberGroupId">群組</label>
            <?php echo $this->Form->input('Member.group_id', array(
                'type' => 'select',
                'label' => false,
                'div' => false,
                'class' => 'govuk-select',
                'id' => 'MemberGroupId'
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label govuk-label--m" for="MemberPassword">密碼</label>
            <?php echo $this->Form->input('Member.password', array(
                'type' => 'password',
                'value' => '',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberPassword'
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label govuk-label--m" for="MemberNickname">暱稱</label>
            <?php echo $this->Form->input('Member.nickname', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberNickname'
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label govuk-label--m" for="MemberEmail">信箱</label>
            <?php echo $this->Form->input('Member.email', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'MemberEmail'
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <fieldset class="govuk-fieldset">
                <legend class="govuk-fieldset__legend govuk-fieldset__legend--m">狀態</legend>
                <div class="govuk-radios govuk-radios--inline" data-module="govuk-radios">
                    <?php 
                    $options = array('Y' => '啟用', 'N' => '停用');
                    foreach($options as $value => $label) {
                        echo '<div class="govuk-radios__item">';
                        echo $this->Form->radio('Member.user_status', array($value => ''), array(
                            'legend' => false,
                            'label' => false,
                            'div' => false,
                            'class' => 'govuk-radios__input',
                            'id' => 'MemberUserStatus' . $value
                        ));
                        echo '<label class="govuk-label govuk-radios__label" for="MemberUserStatus' . $value . '">' . $label . '</label>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </fieldset>
        </div>
        
        <div class="govuk-button-group">
            <?php echo $this->Form->submit('送出', array('class' => 'govuk-button')); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
    </div>
</div>
