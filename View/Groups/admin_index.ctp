<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl"><?php echo __('Groups', true); ?></h1>
        
        <div class="govuk-button-group">
            <?php if ($parentId > 0): ?>
                <?php echo $this->Html->link(__('Upper level', true), array('action' => 'index', $upperLevelId), array('class' => 'govuk-button govuk-button--secondary')); ?>
            <?php endif; ?>
            <?php echo $this->Html->link(__('New', true), array('action' => 'add', $parentId), array('class' => 'govuk-button dialogControl')); ?>
            <?php echo $this->Html->link(__('Members', true), array('controller' => 'members'), array('class' => 'govuk-button govuk-button--secondary')); ?>
            <?php echo $this->Html->link(__('Group Permissions', true), array('controller' => 'group_permissions'), array('class' => 'govuk-button govuk-button--secondary')); ?>
        </div>
        
        <p class="govuk-body">
            <?php
            echo $this->Paginator->counter(array(
                'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
            ));
            ?>
        </p>
        
        <div class="paging"><?php echo $this->element('paginator'); ?></div>
        
        <table class="govuk-table" id="GroupsAdminIndexTable">
            <thead class="govuk-table__head">
                <tr class="govuk-table__row">
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort(__('Id', true), 'id'); ?></th>
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort(__('Name', true), 'name'); ?></th>
                    <th scope="col" class="govuk-table__header"><?php __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody class="govuk-table__body">
                <?php
                foreach ($groups as $group):
                    ?>
                    <tr class="govuk-table__row">
                        <td class="govuk-table__cell">
                            <?php echo $group['Group']['id']; ?>
                        </td>
                        <td class="govuk-table__cell">
                            <?php echo $group['Group']['name']; ?>
                        </td>
                        <td class="govuk-table__cell">
                            <div class="govuk-button-group">
                                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $group['Group']['id']), array('class' => 'govuk-button govuk-button--secondary govuk-button--small dialogControl')); ?>
                                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $group['Group']['id']), array('class' => 'govuk-button govuk-button--warning govuk-button--small'), __('Delete the item, sure?', true)); ?>
                                <?php echo $this->Html->link(__('Sub group', true), array('action' => 'index', $group['Group']['id']), array('class' => 'govuk-button govuk-button--secondary govuk-button--small')); ?>
                                <?php
                                if ($group['Group']['id'] != 1) {
                                    echo $this->Html->link(__('Permission', true), array('controller' => 'group_permissions', 'action' => 'group', $group['Group']['id']), array('class' => 'govuk-button govuk-button--secondary govuk-button--small'));
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="paging"><?php echo $this->element('paginator'); ?></div>
        <div id="GroupsAdminIndexPanel"></div>
    </div>
</div>