<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl">通報資料</h1>
        <?php
        if (Configure::read('loginMember.group_id') == 1 || ($this->data['Issue']['created_by'] == $this->data['Issue']['modified_by'] && Configure::read('loginMember.id') == $this->data['Issue']['created_by'])) {
            ?><div class="govuk-button-group"><?php
            echo $this->Html->link('刪除', array('action' => 'delete', $this->data['Issue']['id']), array('class' => 'govuk-button govuk-button--warning'));
            ?></div><?php
        }
        ?><hr class="govuk-section-break govuk-section-break--m govuk-section-break--visible" />
        <dl class="govuk-summary-list">
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">標題</dt>
                <dd class="govuk-summary-list__value"><?php
                    if ($this->data['Issue']['title']) {
                        echo $this->data['Issue']['title'];
                    }
                    ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">照片(上傳資料)</dt>
                <dd class="govuk-summary-list__value"><?php
                    echo $this->Olc->imgLink('pic', $this->data['Issue']['pic']);
                    ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">公園</dt>
                <dd class="govuk-summary-list__value"><?php
                    echo $this->Html->link($this->data['Park']['name'], '/admin/parks/view/' . $this->data['Issue']['park_id'], array('class' => 'govuk-link'));
                    ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">狀態</dt>
                <dd class="govuk-summary-list__value"><?php
                    if ($this->data['Issue']['status']) {
                        echo $this->data['Issue']['status'];
                    }
                    ?></dd>
            </div>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">更新時間</dt>
                <dd class="govuk-summary-list__value"><?php
                    echo $this->data['Issue']['modified'];
                    ?></dd>
            </div>
<?php if(Configure::read('loginMember.group_id') == 1) { ?>
            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">更新者</dt>
                <dd class="govuk-summary-list__value"><?php
                    echo $this->data['Member']['username'];
                    ?></dd>
            </div>
<?php } ?>
        </dl>
    <p>&nbsp;</p>
        <div id="IssueLogsAdminAdd">
            <h2 class="govuk-heading-l">新增備註</h2>
            <hr class="govuk-section-break govuk-section-break--m govuk-section-break--visible" />
            <?php echo $this->Form->create('IssueLog', array('url' => '/admin/issues/view/' . $this->data['Issue']['id'])); ?>
            <div class="IssueLogs form">
                <?php
                if (Configure::read('loginMember.group_id') == 1) {
                    ?><div class="govuk-form-group">
                        <fieldset class="govuk-fieldset">
                            <legend class="govuk-fieldset__legend govuk-fieldset__legend--s">
                                分類
                            </legend>
                            <div class="govuk-radios" data-module="govuk-radios">
                                <?php echo $this->Form->input('IssueLog.status', array(
                                    'type' => 'radio',
                                    'options' => array(
                                        '變更(未確認)' => '變更(未確認)',
                                        '變更(已確認)' => '變更(已確認)',
                                    ),
                                    'value' => $this->data['Issue']['status'],
                                    'legend' => false,
                                    'div' => false,
                                    'label' => false,
                                    'class' => 'govuk-radios__input',
                                )); ?>
                            </div>
                        </fieldset>
                    </div><?php
                }
                ?>
                <div class="govuk-form-group">
                    <label class="govuk-label" for="IssueLogComment">
                        意見
                    </label>
                    <?php echo $this->Form->input('IssueLog.comment', array(
                        'div' => false,
                        'label' => false,
                        'class' => 'govuk-textarea',
                    )); ?>
                </div>
            </div>
            <?php
            echo $this->Form->submit('送出', array(
                'class' => 'govuk-button',
            ));
            echo $this->Form->end();
            ?>
        </div>
        <h2 class="govuk-heading-l">異動記錄</h2>
        <table class="govuk-table">
            <thead class="govuk-table__head">
                <tr class="govuk-table__row">
                    <th scope="col" class="govuk-table__header">時間</th>
                    <th scope="col" class="govuk-table__header">分類</th>
                    <?php if(Configure::read('loginMember.group_id') == 1) { ?>
                    <th scope="col" class="govuk-table__header">操作人</th>
                    <?php } ?>
                    <th scope="col" class="govuk-table__header">備註/說明</th>
                </tr>
            </thead>
            <tbody class="govuk-table__body">
                <?php
                foreach ($this->data['IssueLog'] AS $log) {
                    ?><tr class="govuk-table__row">
                        <td class="govuk-table__cell"><?php echo $log['created']; ?></td>
                        <td class="govuk-table__cell"><?php echo $log['status']; ?></td>
                        <?php if(Configure::read('loginMember.group_id') == 1) { ?>
                        <td class="govuk-table__cell"><?php echo $log['Member']['username']; ?></td>
                        <?php } ?>
                        <td class="govuk-table__cell"><?php echo nl2br($log['comment']); ?></td>
                    </tr><?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
