<div id="IssuesAdminAdd">
    <h3>建立通報</h3>
    <?php echo $this->Form->create('Issue', array('type' => 'file')); ?>
    <div class="Issues form">
        <?php
        echo $this->Form->hidden('Issue.park_id');
        echo $this->Form->input('Issue.park', array(
            'type' => 'text',
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
        $('#IssueLicense').autocomplete({
            minLength: 1,
            source: function (request, response) {
                $.getJSON('https://drugs.olc.tw/api/drugs/index/' + encodeURI(request.term), function (r) {
                    response($.map(r.data, function (item) {
                        return {
                            label: item.License.license_id + ' - ' + item.License.name + ' / ' + item.License.name_english,
                            value: item.License.license_id,
                            data: item
                        }
                    }));
                });
            },
            select: function (event, ui) {
                $('#IssueNameEnglish').val(ui.item.data.License.name_english);
                $('#IssueNameChinese').val(ui.item.data.License.name);
                $('#IssueLicenseUuid').val(ui.item.data.License.id);
            }
        });
        $('#IssueEvidenceDate').datepicker({
            dateFormat: 'yy-mm-dd'
        });
    })
</script>
