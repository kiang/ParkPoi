<div class="parks view">
    <h2><?php echo h($park['Park']['name']); ?></h2>
<?php echo $this->Html->link('建立通報', '/admin/issues/add/' . $park['Park']['id'], array('class' => 'btn btn-primary pull-right')); ?>
    <table class="table table-bordered">
        <tr>
            <th>官方編號</th>
            <td><?php echo h($park['Park']['sno']); ?></td>
        </tr>
        <tr>
            <th>區域/村里</th>
            <td><?php echo h($park['Park']['area'] . $park['Park']['cunli']); ?></td>
        </tr>
        <tr>
            <th>面積（公頃）</th>
            <td><?php echo h($park['Park']['size']); ?></td>
        </tr>
        <tr>
            <th>類型</th>
            <td><?php echo h($park['Park']['class']); ?></td>
        </tr>
        <tr>
            <th>座落位置</th>
            <td><?php echo h($park['Park']['location']); ?></td>
        </tr>
        <tr>
            <th>經度</th>
            <td><?php echo h($park['Park']['longitude']); ?></td>
        </tr>
        <tr>
            <th>緯度</th>
            <td><?php echo h($park['Park']['latitude']); ?></td>
        </tr>
        <tr>
            <th>管理單位</th>
            <td><?php echo h($park['Park']['admin']); ?></td>
        </tr>
        <tr>
            <th>土地類型</th>
            <td><?php echo h($park['Park']['land_zone']); ?></td>
        </tr>
        <tr>
            <th>備註</th>
            <td><?php echo nl2br(h($park['Park']['note'])); ?></td>
        </tr>
    </table>
</div>
<?php echo $this->Html->link('建立通報', '/admin/issues/add/' . $park['Park']['id'], array('class' => 'btn btn-primary')); ?>