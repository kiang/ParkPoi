<section id="photos">
    <?php
    foreach ($items as $item) {
        echo $this->Html->link($this->Olc->imgLink('pic', $item['Issue']['pic']), '/admin/parks/view/' . $item['Issue']['park_id'], array('escape' => false));
    }
    ?>
</section>
<div class="paging"><?php echo $this->element('paginator'); ?></div>