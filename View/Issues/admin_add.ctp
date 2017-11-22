<div id="IssuesAdminAdd">
    <h3>建立通報</h3>
    <?php echo $this->Form->create('Issue', array('type' => 'file')); ?>
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
        echo $this->Form->input('Issue.park', array(
            'type' => 'text',
            'value' => $parkName,
            'label' => '* 公園',
            'div' => 'form-group',
            'class' => 'form-control',
            'required' => 'required',
        ));
        if (Configure::read('loginMember.group_id') == 1) {
            echo $this->Form->input('Issue.status', array(
                'type' => 'radio',
                'options' => array(
                    '變更(未確認)' => '變更(未確認)',
                    '變更(已確認)' => '變更(已確認)',
                ),
                'legend' => '分類',
                'div' => 'form-group',
            ));
        }
        echo $this->Form->input('Issue.title', array(
            'type' => 'text',
            'label' => '標題',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('Issue.pic', array(
            'type' => 'file',
            'label' => '* 上傳照片 (必填)',
            'div' => 'form-group',
            'class' => 'form-control',
            'required' => 'required',
        ));
        echo $this->Form->input('IssueLog.comment', array(
            'type' => 'textarea',
            'rows' => 5,
            'label' => '備註/說明',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        ?>
    </div>
    <hr />
    * 點選送出表示您同意本次上傳的資料與圖片採用 <a href="https://creativecommons.org/licenses/by/4.0/deed.zh_TW" target="_blank">CC BY 4.0</a> 授權方式提供給本站使用
    <?php
    /*
     * @var Form FormHelper
     */
    echo $this->Form->submit('送出', array(
        'class' => 'btn btn-primary',
    ));
    echo $this->Form->end();
    ?>
</div>
<?php
$this->Html->script('view/issues/add', array('inline' => false));