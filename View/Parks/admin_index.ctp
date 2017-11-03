<div class="parks index">
    <h2>公園</h2>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
    <table cellpadding="0" cellspacing="0" class="table table-bordered">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('area'); ?></th>
                <th><?php echo $this->Paginator->sort('cunli'); ?></th>
                <th><?php echo $this->Paginator->sort('location'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th class="actions">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parks as $park): ?>
                <tr>
                    <td><?php echo $this->Html->link(h($park['Park']['name']), array('action' => 'view', $park['Park']['id'])); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['area']); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['cunli']); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['location']); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['modified']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link('建立通報', '/admin/issues/add/' . $park['Park']['id']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
</div>