<div class="govuk-grid-row">
    <div class="govuk-grid-column-two-thirds">
        <?php echo $this->Form->create('Issue', array('type' => 'file')); ?>
        <fieldset class="govuk-fieldset">
            <legend class="govuk-fieldset__legend govuk-fieldset__legend--xl">
                <h1 class="govuk-fieldset__heading">
                    <?php echo __('Edit 回報表單', true); ?>
                </h1>
            </legend>
            
            <?php echo $this->Form->input('Issue.id', array('type' => 'hidden')); ?>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueLicenseId">許可證</label>
                <?php echo $this->Form->input('Issue.license_id', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueLicenseUuid">外部許可證</label>
                <?php echo $this->Form->input('Issue.license_uuid', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueInfoSource">編輯者</label>
                <?php echo $this->Form->input('Issue.info_source', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueStatus">分類</label>
                <?php echo $this->Form->input('Issue.status', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueNameEnglish">藥品英文名</label>
                <?php echo $this->Form->input('Issue.name_english', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueNameChinese">藥品中文名</label>
                <?php echo $this->Form->input('Issue.name_chinese', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueLicense">許可證字號</label>
                <?php echo $this->Form->input('Issue.license', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueDosageForm">劑型</label>
                <?php echo $this->Form->input('Issue.dosage_form', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueDosage">含量（規格/劑量）</label>
                <?php echo $this->Form->input('Issue.dosage', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueBatchNo">批號（新變更的批號）</label>
                <?php echo $this->Form->input('Issue.batch_no', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssuePicOld">舊外觀(上傳資料)</label>
                <?php echo $this->Form->input('Issue.pic_old', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssuePicNew">新外觀(上傳資料)</label>
                <?php echo $this->Form->input('Issue.pic_new', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueLabelOld">舊仿單(KEY IN)</label>
                <?php echo $this->Form->input('Issue.label_old', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-textarea',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueLabelOldFile">舊仿單(上傳資料)</label>
                <?php echo $this->Form->input('Issue.label_old_file', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueLabelNew">新仿單(KEY IN)</label>
                <?php echo $this->Form->input('Issue.label_new', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-textarea',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueLabelNewFile">新仿單(上傳資料)</label>
                <?php echo $this->Form->input('Issue.label_new_file', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueEvidence">異動證明(公文/廠商說明書等)</label>
                <?php echo $this->Form->input('Issue.evidence', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueModified">更新時間</label>
                <?php echo $this->Form->input('Issue.modified', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            
            <div class="govuk-form-group">
                <label class="govuk-label" for="IssueModifiedBy">更新者</label>
                <?php echo $this->Form->input('Issue.modified_by', array(
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
        </fieldset>
        
        <?php echo $this->Form->submit(__('Submit', true), array('class' => 'govuk-button')); ?>
        <?php echo $this->Form->end(); ?>
    </div>
</div>