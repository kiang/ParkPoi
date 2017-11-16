<div id="IssuesAdminView">
    <h3>通報資料</h3>
    <?php
    if (Configure::read('loginMember.group_id') == 1 || ($this->data['Issue']['created_by'] == $this->data['Issue']['modified_by'] && Configure::read('loginMember.id') == $this->data['Issue']['created_by'])) {
        ?><div class="pull-right btn-group"><?php
        echo $this->Html->link('刪除', array('action' => 'delete', $this->data['Issue']['id']), array('class' => 'btn btn-danger'));
        ?></div><?php
    }
    ?><hr />
    <div class="col-md-12">
        <div class="col-md-3"><strong>標題</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['title']) {
                echo $this->data['Issue']['title'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>照片(上傳資料)</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->Olc->imgLink('pic', $this->data['Issue']['pic']);
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>公園</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->Html->link($this->data['Park']['name'], '/admin/parks/view/' . $this->data['Issue']['park_id'], array('target' => '_blank'));
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>狀態</strong></div>
        <div class="col-md-9">&nbsp;<?php
            if ($this->data['Issue']['status']) {
                echo $this->data['Issue']['status'];
            }
            ?>&nbsp;
        </div>
        <div class="col-md-3"><strong>更新時間</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->data['Issue']['modified'];
            ?>&nbsp;
        </div>
<?php if(Configure::read('loginMember.group_id') == 1) { ?>
        <div class="col-md-3"><strong>更新者</strong></div>
        <div class="col-md-9">&nbsp;<?php
            echo $this->data['Member']['username'];
            ?>&nbsp;
        </div>
<?php } ?>
    </div>
    <p>&nbsp;</p>
    <div id="IssueLogsAdminAdd">
        <h3>新增備註</h3><hr />
        <?php echo $this->Form->create('IssueLog', array('url' => '/admin/issues/view/' . $this->data['Issue']['id'])); ?>
        <div class="IssueLogs form">
            <?php
            if (Configure::read('loginMember.group_id') == 1) {
                echo $this->Form->input('IssueLog.status', array(
                    'type' => 'radio',
                    'options' => array(
                        '變更(未確認)' => '變更(未確認)',
                        '變更(已確認)' => '變更(已確認)',
                    ),
                    'value' => $this->data['Issue']['status'],
                    'legend' => '分類',
                    'div' => 'form-group',
                ));
            }
            echo $this->Form->input('IssueLog.comment', array(
                'label' => '意見',
                'div' => 'form-group',
                'class' => 'form-control',
            ));
            ?>
        </div>
        <?php
        echo $this->Form->submit('送出', array(
            'class' => 'btn btn-primary',
        ));
        echo $this->Form->end();
        ?>
    </div>
    <h3>異動記錄</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>時間</th>
                <th>分類</th>
                <?php if(Configure::read('loginMember.group_id') == 1) { ?>
                <th>操作人</th>
                <?php } ?>
                <th>備註/說明</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->data['IssueLog'] AS $log) {
                ?><tr>
                    <td><?php echo $log['created']; ?></td>
                    <td><?php echo $log['status']; ?></td>
                    <?php if(Configure::read('loginMember.group_id') == 1) { ?>
                    <td><?php echo $log['Member']['username']; ?></td>
                    <?php } ?>
                    <td><?php echo nl2br($log['comment']); ?></td>
                </tr><?php
            }
            ?>
        </tbody>
    </table>
</div>
