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
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($parks as $park): ?>
                <tr>
                    <td><?php echo h($park['Park']['name']); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['area']); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['cunli']); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['location']); ?>&nbsp;</td>
                    <td><?php echo h($park['Park']['modified']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $park['Park']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $park['Park']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $park['Park']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $park['Park']['id']))); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paging"><?php echo $this->element('paginator'); ?></div>
</div>