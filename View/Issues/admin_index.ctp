<?php
if (!isset($url)) {
    $url = array();
}
?>
<div id="IssuesAdminIndex">
    <h2>通報資料</h2>
    <div class="pull-right col-md-6">
        <form id="IssueKeywordsForm">
        <div class="col-md-6"><input type="text" class="form-control" id="IssueKeywords" value="<?php echo $keywords; ?>" /></div>
        <a href="#" class="btn btn-primary" id="IssueKeywordsBtn">搜尋</a>
        </form>
    </div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <?php
    foreach ($items as $item) {
        if(empty($item['Issue']['title'])) {
            $item['Issue']['title'] = $item['Issue']['modified'];
        }
        ?><div class="col-md-4">
            <strong>公園：</strong><?php echo $this->Html->link($item['Park']['name'], array('controller' => 'parks', 'action' => 'view', $item['Issue']['park_id'])); ?>
            <br /><strong>標題：</strong><?php echo $this->Html->link($item['Issue']['title'], array('action' => 'view', $item['Issue']['id'])); ?>
            <br /><strong>時間：</strong><?php echo $item['Issue']['modified']; ?>
            <p><?php
                if (!empty($item['IssueLog']['comment'])) {
                    echo $item['IssueLog']['comment'];
                }
                ?></p>
            <?php
            echo $this->Olc->imgLink('pic', $item['Issue']['pic']);
            ?>    
        </div>
        <?php
    }
    ?>
    <div class="clearfix"></div>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
</div>
<?php
$this->Html->script('view/issues/index', array('inline' => false));