<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl">照片牆</h1>
        <p class="govuk-body">瀏覽台南地區公園的照片和相關通報</p>
        
        <div class="govuk-grid-row" id="photos">
            <?php
            foreach ($items as $item) {
                echo '<div class="govuk-grid-column-one-quarter" style="margin-bottom: 20px;">';
                echo '<div class="govuk-card">';
                echo $this->Html->link(
                  $this->Olc->imgLink('pic', $item['Issue']['pic'], "{$item['Issue']['title']}@{$item['Park']['name']}", array('class' => 'govuk-card__image', 'style' => 'width: 100%; height: 200px; object-fit: cover;')),
                  '/admin/parks/view/' . $item['Issue']['park_id'],
                  array('escape' => false, 'title' => "{$item['Issue']['title']}@{$item['Park']['name']}", 'class' => 'govuk-link')
                );
                echo '<div class="govuk-card__content">';
                echo '<h3 class="govuk-card__heading govuk-heading-s">' . h($item['Issue']['title']) . '</h3>';
                echo '<p class="govuk-body-s">' . h($item['Park']['name']) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
        
        <div class="govuk-pagination-wrapper">
            <?php echo $this->element('paginator'); ?>
        </div>
    </div>
</div>
