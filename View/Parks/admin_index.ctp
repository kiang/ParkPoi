<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl">公園管理</h1>
        
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkKeywords">
                        搜尋公園
                    </label>
                    <div class="govuk-input__wrapper">
                        <input class="govuk-input" id="ParkKeywords" name="keywords" type="text" value="<?php echo h($keywords); ?>">
                        <button class="govuk-button" type="button" id="ParkKeywordsBtn" data-module="govuk-button">
                            搜尋
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="govuk-pagination-wrapper">
            <?php echo $this->element('paginator'); ?>
        </div>
        
        <table class="govuk-table">
            <caption class="govuk-table__caption govuk-table__caption--m">公園列表</caption>
            <thead class="govuk-table__head">
                <tr class="govuk-table__row">
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('name', '名稱'); ?></th>
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('area', '行政區'); ?></th>
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('cunli', '村里'); ?></th>
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('location', '位置'); ?></th>
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('modified', '更新時間'); ?></th>
                    <th scope="col" class="govuk-table__header">操作</th>
                </tr>
            </thead>
            <tbody class="govuk-table__body">
                <?php foreach ($parks as $park): ?>
                    <tr class="govuk-table__row">
                        <th scope="row" class="govuk-table__header">
                            <?php echo $this->Html->link(h($park['Park']['name']), array('action' => 'view', $park['Park']['id']), array('class' => 'govuk-link')); ?>
                        </th>
                        <td class="govuk-table__cell"><?php echo h($park['Park']['area']); ?></td>
                        <td class="govuk-table__cell"><?php echo h($park['Park']['cunli']); ?></td>
                        <td class="govuk-table__cell"><?php echo h($park['Park']['location']); ?></td>
                        <td class="govuk-table__cell"><?php echo h($park['Park']['modified']); ?></td>
                        <td class="govuk-table__cell">
                            <?php echo $this->Html->link('建立通報', '/admin/issues/add/' . $park['Park']['id'], array('class' => 'govuk-link')); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="govuk-pagination-wrapper">
            <?php echo $this->element('paginator'); ?>
        </div>
    </div>
</div>
<?php
$this->Html->script('view/parks/index', array('inline' => false));