<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">
        <h1 class="govuk-heading-l">會員詳細資料</h1>
        
        <dl class="govuk-summary-list">
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">ID</dt>
                <dd class="govuk-summary-list__value"><?php echo $member['Member']['id']; ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">使用者名稱</dt>
                <dd class="govuk-summary-list__value"><?php echo $member['Member']['username']; ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">密碼</dt>
                <dd class="govuk-summary-list__value"><?php echo $member['Member']['password']; ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">使用者狀態</dt>
                <dd class="govuk-summary-list__value"><?php echo $member['Member']['user_status']; ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">建立時間</dt>
                <dd class="govuk-summary-list__value"><?php echo $member['Member']['created']; ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">修改時間</dt>
                <dd class="govuk-summary-list__value"><?php echo $member['Member']['modified']; ?></dd>
            </div>
        </dl>
        
        <div class="govuk-button-group">
            <?php echo $this->Html->link('編輯會員', array('action' => 'edit', $member['Member']['id']), array('class' => 'govuk-button')); ?>
            <?php echo $this->Html->link('刪除會員', array('action' => 'delete', $member['Member']['id']), array('class' => 'govuk-button govuk-button--warning'), sprintf('您確定要刪除 # %s 嗎？', $member['Member']['id'])); ?>
            <?php echo $this->Html->link('會員列表', array('action' => 'index'), array('class' => 'govuk-button govuk-button--secondary')); ?>
            <?php echo $this->Html->link('新增會員', array('action' => 'add'), array('class' => 'govuk-button govuk-button--secondary')); ?>
        </div>
    </div>
</div>
