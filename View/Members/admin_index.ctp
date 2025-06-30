<div class="govuk-grid-row" id="MembersAdminIndex">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl">帳號管理</h1>
        
        <div class="govuk-button-group">
            <?php echo $this->Html->link('新增', array('action' => 'add'), array('class' => 'govuk-button dialogControl')); ?>
            <?php echo $this->Html->link('群組', array('controller' => 'groups'), array('class' => 'govuk-button govuk-button--secondary')); ?>
            <?php echo $this->Html->link('權限更新', array('action' => 'acos'), array('class' => 'govuk-button govuk-button--secondary')); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label" for="memberFilter">
                搜尋帳號
            </label>
            <?php
            echo $this->Form->text('Member.filter', array(
                'id' => 'memberFilter',
                'value' => $keyword,
                'class' => 'govuk-input',
            ));
            ?>
        </div>
        
        <div class="govuk-pagination-wrapper">
            <?php echo $this->element('paginator'); ?>
        </div>
        
        <table class="govuk-table" id="MembersAdminIndexTable">
            <caption class="govuk-table__caption govuk-table__caption--m">帳號列表</caption>
            <thead class="govuk-table__head">
                <tr class="govuk-table__row">
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('username', '帳號'); ?></th>
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('email', '信箱'); ?></th>
                    <th scope="col" class="govuk-table__header">暱稱</th>
                    <th scope="col" class="govuk-table__header">狀態</th>
                    <th scope="col" class="govuk-table__header"><?php echo $this->Paginator->sort('modified', '異動時間'); ?></th>
                    <th scope="col" class="govuk-table__header">操作</th>
                </tr>
            </thead>
            <tbody class="govuk-table__body">
                <?php foreach ($members as $member): ?>
                    <tr class="govuk-table__row">
                        <th scope="row" class="govuk-table__header">
                            <?php
                            echo h($member['Member']['username']);
                            if (!empty($member['Member']['fb_id'])) {
                                echo $this->Html->link(' (臉書)', 'https://www.facebook.com/' . $member['Member']['fb_id'], array('target' => '_blank', 'class' => 'govuk-link'));
                            }
                            ?>
                        </th>
                        <td class="govuk-table__cell"><?php echo h($member['Member']['email']); ?></td>
                        <td class="govuk-table__cell"><?php echo h($member['Member']['nickname']); ?></td>
                        <td class="govuk-table__cell"><?php echo h($member['Member']['user_status']); ?></td>
                        <td class="govuk-table__cell"><?php echo h($member['Member']['modified']); ?></td>
                        <td class="govuk-table__cell">
                            <?php echo $this->Html->link('編輯', array('action' => 'edit', $member['Member']['id']), array('class' => 'govuk-link dialogControl')); ?>
                            <?php echo $this->Html->link('刪除', array('action' => 'delete', $member['Member']['id']), array('class' => 'govuk-link'), '確定要刪除？'); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="govuk-pagination-wrapper">
            <?php echo $this->element('paginator'); ?>
        </div>
        
        <div id="MembersAdminIndexPanel"></div>
    </div>
</div>
    <?php
    $jsUri = $this->Html->url() . '/index';
    ?>
    <script>
        $(function () {
            $('#memberFilter').autocomplete({
                delay: 1000,
                minLength: 0,
                search: function (event, ui) {
                    var targetUri = '<?php echo $jsUri; ?>/keyword:' + $(this).val();
                    $('#MembersAdminIndex').parent().load(encodeURI(targetUri));
                    return false;
                }
            });
        });
    </script>
</div>