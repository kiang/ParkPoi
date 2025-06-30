<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl"><?php echo h($park['Park']['name']); ?></h1>
        
        <div class="govuk-button-group">
            <?php
            echo $this->Html->link('建立通報', '/admin/issues/add/' . $park['Park']['id'], array('class' => 'govuk-button'));
            if (!empty($park['Park']['longitude'])) {
                echo '<a target="_blank" href="https://www.google.com.tw/maps?q=' . $park['Park']['latitude'] . ',' . $park['Park']['longitude'] . '" class="govuk-button govuk-button--secondary govuk-link">在 Google 地圖開啟</a>';
            }
            ?>
        </div>
        
        <div id="IssuesAdminIndex">
            <h2 class="govuk-heading-l">通報資料</h2>
            <div class="paging"><?php echo $this->element('paginator'); ?></div>
            <section id="photos" class="govuk-grid-row">
            <?php
            foreach ($items as $item) {
                echo '<div class="govuk-grid-column-one-quarter">';
                echo $this->Html->link(
                  $this->Olc->imgLink('pic', $item['Issue']['pic'], "{$item['Issue']['title']}@{$park['Park']['name']}"),
                  '/admin/issues/view/' . $item['Issue']['id'],
                  array('escape' => false, 'title' => "{$item['Issue']['title']}@{$park['Park']['name']}", 'class' => 'govuk-link'));
                echo '</div>';
            }
            ?>
            </section>
            <div class="paging"><?php echo $this->element('paginator'); ?></div>
        </div>
        
        <div id="parkMap" style="height: 300px; margin: 20px 0;"></div>
        
        <table class="govuk-table">
            <caption class="govuk-table__caption govuk-table__caption--m">公園詳細資訊</caption>
            <tbody class="govuk-table__body">
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">官方編號</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['sno']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">區域/村里</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['area'] . $park['Park']['cunli']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">面積（公頃）</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['size']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">類型</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['class']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">座落位置</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['location']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">經度</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['longitude']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">緯度</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['latitude']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">管理單位</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['admin']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">土地類型</th>
                    <td class="govuk-table__cell"><?php echo h($park['Park']['land_zone']); ?></td>
                </tr>
                <tr class="govuk-table__row">
                    <th scope="row" class="govuk-table__header">備註</th>
                    <td class="govuk-table__cell"><?php echo nl2br(h($park['Park']['note'])); ?></td>
                </tr>
            </tbody>
        </table>
        
        <div class="govuk-button-group">
            <?php
            echo $this->Html->link('建立通報', '/admin/issues/add/' . $park['Park']['id'], array('class' => 'govuk-button'));
            if (!empty($park['Park']['longitude'])) {
                echo '<a target="_blank" href="https://www.google.com.tw/maps?q=' . $park['Park']['latitude'] . ',' . $park['Park']['longitude'] . '" class="govuk-button govuk-button--secondary govuk-link">在 Google 地圖開啟</a>';
            }
            ?>
        </div>
    </div>
</div>
<?php
echo $this->Html->scriptBlock("var basePoint = [{$park['Park']['longitude']}, {$park['Park']['latitude']}];", array('inline' => false));
$this->Html->script('view/parks/view', array('inline' => false));
