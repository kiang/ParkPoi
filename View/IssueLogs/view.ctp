<div id="IssueLogsView">
    <h3><?php echo __('View 異動記錄', true); ?></h3><hr />
    <div class="col">

        <div class="col">通報編號</div>
        <div class="col"><?php
            if ($this->data['IssueLog']['issue_id']) {

                echo $this->data['IssueLog']['issue_id'];
            }
            ?>&nbsp;
        </div>
        <div class="col">分類</div>
        <div class="col"><?php
            if ($this->data['IssueLog']['status']) {

                echo $this->data['IssueLog']['status'];
            }
            ?>&nbsp;
        </div>
        <div class="col">意見</div>
        <div class="col"><?php
            if ($this->data['IssueLog']['comment']) {

                echo $this->data['IssueLog']['comment'];
            }
            ?>&nbsp;
        </div>
        <div class="col">建立時間</div>
        <div class="col"><?php
            if ($this->data['IssueLog']['created']) {

                echo $this->data['IssueLog']['created'];
            }
            ?>&nbsp;
        </div>
        <div class="col">建立者</div>
        <div class="col"><?php
            if ($this->data['IssueLog']['created_by']) {

                echo $this->data['IssueLog']['created_by'];
            }
            ?>&nbsp;
        </div>
    </div>
    <div class="btn-group">
        <?php echo $this->Html->link(__('異動記錄 List', true), array('action' => 'index'), array('class' => 'btn btn-secondary')); ?>
    </div>
    <div id="IssueLogsViewPanel"></div>
    <script type="text/javascript">
        //<![CDATA[
        $(function () {
            $('a.IssueLogsViewControl').click(function () {
                $('#IssueLogsViewPanel').parent().load(this.href);
                return false;
            });
        });
        //]]>
    </script>
</div>