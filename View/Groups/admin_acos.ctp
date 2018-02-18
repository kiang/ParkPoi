<div id="GroupsAdminAcos">
    <h2><?php echo __('Permission Settings', true); ?></h2>
    <p>
        <?php
        $urlArray = array('url' => array($groupId));
        ?>
    </p>
    <table cellpadding="0" cellspacing="0" id="GroupsAdminAcosTable">
        <?php
        $i = 0;
        foreach ($acos as $aco) {
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
            <tr<?php echo $class; ?>>
                <td style="text-align:left;"><?php
                    echo $aco['Aco']['alias'];
                    if (!empty($aco['Aco']['Aco'])) {
                        echo '<input type="checkbox" name="ctrl' . $aco['Aco']['alias'] . '" class="acoController">';
                        echo '<hr /><div id="sub' . $aco['Aco']['alias'] . '">';
                        foreach ($aco['Aco']['Aco'] AS $actionAco) {
                            echo '<div class="col"><input type="checkbox" name="' . $aco['Aco']['alias'] . '___' . $actionAco['alias'] . '"';
                            if ($actionAco['permitted'] == 1) {
                                echo ' checked="checked"';
                            }
                            echo ' class="acoPermitted">';
                            echo $actionAco['alias'] . '</div>';
                        }
                        echo '</div>';
                    }
                    ?></td>
            </tr>
        <?php } // End of foreach ($acos as $aco) { ?>
    </table>
    <?php
    echo $this->Form->create('Group', array('url' => array('action' => 'acos', $groupId)));
    echo '<ul id="permissionStack"></ul>';
    echo $this->Form->end(__('Update', true));
    ?>
</div>
<?php
$this->Html->script('view/groups/acos', array('inline' => false));