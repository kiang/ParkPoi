<?php
if (!isset($url)) {
    $url = array();
}
?>
<nav class="govuk-pagination" role="navigation" aria-label="分頁導覽">
    <?php if ($this->Paginator->hasPrev()): ?>
        <div class="govuk-pagination__prev">
            <?php echo $this->Paginator->prev('上一頁', array('url' => $url, 'class' => 'govuk-link govuk-pagination__link', 'rel' => 'prev')); ?>
        </div>
    <?php endif; ?>
    
    <ul class="govuk-pagination__list">
        <?php
        // Get current page and page count
        $current = $this->Paginator->current();
        $pageCount = $this->Paginator->counter(array('format' => '%pages%'));
        
        // Show first page if not on first page
        if ($current > 1) {
            echo '<li class="govuk-pagination__item">';
            echo $this->Paginator->link('1', array('page' => 1, 'url' => $url), array('class' => 'govuk-link govuk-pagination__link'));
            echo '</li>';
            
            if ($current > 3) {
                echo '<li class="govuk-pagination__item govuk-pagination__item--ellipses">…</li>';
            }
        }
        
        // Show pages around current page
        for ($i = max(1, $current - 1); $i <= min($pageCount, $current + 1); $i++) {
            if ($i == $current) {
                echo '<li class="govuk-pagination__item govuk-pagination__item--current">';
                echo '<a href="#" class="govuk-link govuk-pagination__link" aria-label="第 ' . $i . ' 頁" aria-current="page">' . $i . '</a>';
                echo '</li>';
            } else {
                echo '<li class="govuk-pagination__item">';
                echo $this->Paginator->link($i, array('page' => $i, 'url' => $url), array('class' => 'govuk-link govuk-pagination__link', 'aria-label' => '第 ' . $i . ' 頁'));
                echo '</li>';
            }
        }
        
        // Show last page if not on last page
        if ($current < $pageCount) {
            if ($current < $pageCount - 2) {
                echo '<li class="govuk-pagination__item govuk-pagination__item--ellipses">…</li>';
            }
            
            echo '<li class="govuk-pagination__item">';
            echo $this->Paginator->link($pageCount, array('page' => $pageCount, 'url' => $url), array('class' => 'govuk-link govuk-pagination__link'));
            echo '</li>';
        }
        ?>
    </ul>
    
    <?php if ($this->Paginator->hasNext()): ?>
        <div class="govuk-pagination__next">
            <?php echo $this->Paginator->next('下一頁', array('url' => $url, 'class' => 'govuk-link govuk-pagination__link', 'rel' => 'next')); ?>
        </div>
    <?php endif; ?>
</nav>