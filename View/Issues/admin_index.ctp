<?php
if (!isset($url)) {
    $url = array();
}
?>
<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl">通報資料</h1>
        
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-one-half">
                <form id="IssueKeywordsForm" class="govuk-form">
                    <div class="govuk-form-group">
                        <label class="govuk-label" for="IssueKeywords">搜尋關鍵字</label>
                        <input type="text" class="govuk-input" id="IssueKeywords" name="keywords" value="<?php echo $keywords; ?>" />
                    </div>
                    <button type="button" class="govuk-button" id="IssueKeywordsBtn">搜尋</button>
                </form>
            </div>
        </div>
        
        <div class="paging"><?php echo $this->element('paginator'); ?></div>
        
        <?php
        foreach ($items as $item) {
            if(empty($item['Issue']['title'])) {
                $item['Issue']['title'] = $item['Issue']['modified'];
            }
            ?>
            <div class="govuk-summary-card">
                <div class="govuk-summary-card__title-wrapper">
                    <h2 class="govuk-summary-card__title">
                        <?php echo $this->Html->link($item['Issue']['title'], array('action' => 'view', $item['Issue']['id']), array('class' => 'govuk-link')); ?>
                    </h2>
                </div>
                <div class="govuk-summary-card__content">
                    <dl class="govuk-summary-list">
                        <div class="govuk-summary-list__row">
                            <dt class="govuk-summary-list__key">公園</dt>
                            <dd class="govuk-summary-list__value">
                                <?php echo $this->Html->link($item['Park']['name'], array('controller' => 'parks', 'action' => 'view', $item['Issue']['park_id']), array('class' => 'govuk-link')); ?>
                            </dd>
                        </div>
                        <div class="govuk-summary-list__row">
                            <dt class="govuk-summary-list__key">時間</dt>
                            <dd class="govuk-summary-list__value"><?php echo $item['Issue']['modified']; ?></dd>
                        </div>
                        <?php if (!empty($item['IssueLog']['comment'])) { ?>
                        <div class="govuk-summary-list__row">
                            <dt class="govuk-summary-list__key">備註</dt>
                            <dd class="govuk-summary-list__value"><?php echo $item['IssueLog']['comment']; ?></dd>
                        </div>
                        <?php } ?>
                    </dl>
                    <?php
                    echo $this->Olc->imgLink('pic', $item['Issue']['pic']);
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
        
        <div class="paging"><?php echo $this->element('paginator'); ?></div>
    </div>
</div>
<?php
$this->Html->script('view/issues/index', array('inline' => false));