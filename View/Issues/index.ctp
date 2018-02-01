<section id="photos">
    <?php
    foreach ($items as $item) {
        echo $this->Html->link(
          $this->Olc->imgLink('pic', $item['Issue']['pic'], "{$item['Issue']['title']}@{$item['Park']['name']}"),
          '/admin/parks/view/' . $item['Issue']['park_id'],
          array('escape' => false, 'title' => "{$item['Issue']['title']}@{$item['Park']['name']}"));
    }
    ?>
</section>
<div class="paging"><?php echo $this->element('paginator'); ?></div>
