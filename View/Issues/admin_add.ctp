<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl">建立通報</h1>
        <?php echo $this->Form->create('Issue', array('type' => 'file', 'url' => '/admin/issues/add')); ?>
        <div class="Issues form">
            <?php
            if(!empty($park)) {
                $parkId = $park['Park']['id'];
                $parkName = $park['Park']['name'];
            } else {
                $parkId = 0;
                $parkName = '';
            }
            echo $this->Form->hidden('Issue.park_id', array('value' => $parkId));
            ?>
            <div class="govuk-form-group">
                <label class="govuk-label govuk-label--s" for="IssuePark">
                    <span class="govuk-visually-hidden">required</span>* 公園
                </label>
                <?php echo $this->Form->input('Issue.park', array(
                    'type' => 'text',
                    'value' => $parkName,
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                    'required' => 'required',
                )); ?>
            </div>
            <?php if (Configure::read('loginMember.group_id') == 1) { ?>
                <div class="govuk-form-group">
                    <fieldset class="govuk-fieldset">
                        <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
                            分類
                        </legend>
                        <div class="govuk-radios" data-module="govuk-radios">
                            <?php echo $this->Form->input('Issue.status', array(
                                'type' => 'radio',
                                'options' => array(
                                    '變更(未確認)' => '變更(未確認)',
                                    '變更(已確認)' => '變更(已確認)',
                                ),
                                'legend' => false,
                                'div' => false,
                                'label' => false,
                                'class' => 'govuk-radios__input',
                                'separator' => '',
                                'before' => '<div class="govuk-radios__item">',
                                'after' => '</div>',
                            )); ?>
                        </div>
                    </fieldset>
                </div>
            <?php } ?>
            <div class="govuk-form-group">
                <label class="govuk-label govuk-label--s" for="IssueTitle">
                    標題
                </label>
                <?php echo $this->Form->input('Issue.title', array(
                    'type' => 'text',
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-input',
                )); ?>
            </div>
            <div class="govuk-form-group">
                <label class="govuk-label govuk-label--s" for="IssuePic">
                    <span class="govuk-visually-hidden">required</span>* 上傳照片 (必填)
                </label>
                <?php echo $this->Form->input('Issue.pic', array(
                    'type' => 'file',
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-file-upload',
                    'required' => 'required',
                )); ?>
            </div>
            <div class="govuk-form-group">
                <label class="govuk-label govuk-label--s" for="IssueLogComment">
                    備註/說明
                </label>
                <?php echo $this->Form->input('IssueLog.comment', array(
                    'type' => 'textarea',
                    'rows' => 5,
                    'div' => false,
                    'label' => false,
                    'class' => 'govuk-textarea',
                )); ?>
            </div>
        </div>
        <hr class="govuk-section-break govuk-section-break--m govuk-section-break--visible" />
        <p class="govuk-body-s">
            * 點選送出表示您同意本次上傳的資料與圖片採用 <a href="https://creativecommons.org/licenses/by/4.0/deed.zh_TW" target="_blank" class="govuk-link">CC BY 4.0</a> 授權方式提供給本站使用
        </p>
        <?php
        /*
         * @var Form FormHelper
         */
        echo $this->Form->submit('送出', array(
            'class' => 'govuk-button',
        ));
        echo $this->Form->end();
        ?>
    </div>
</div>
<?php
$this->Html->script('view/issues/add', array('inline' => false));