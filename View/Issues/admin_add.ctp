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
<script>
    $(function () {
        $('#IssuePark').autocomplete({
            minLength: 1,
            source: function (request, response) {
                $.getJSON('<?php echo $this->Html->url('/admin/parks/api/'); ?>' + encodeURI(request.term), function (r) {
                    response($.map(r, function (item) {
                        return {
                            label: item.Park.name,
                            value: item.Park.name,
                            data: item.Park
                        }
                    }));
                });
            },
            select: function (event, ui) {
                $('#IssueParkId').val(ui.item.data.id);
            }
        });
    })
</script>
