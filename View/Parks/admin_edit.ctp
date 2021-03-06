<div>
    <h3>編輯公園</h3>
    <?php echo $this->Form->create('Park', array('url' => '/admin/parks/edit/' . $id)); ?>
    <div class="Parks form">
        <div class="col" id="parkMap" style="height: 300px;"></div>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name', array(
            'type' => 'text',
            'label' => '名稱',
            'div' => 'form-group',
            'class' => 'form-control',
            'required' => 'required',
        ));
        echo $this->Form->input('location', array(
            'type' => 'text',
            'label' => '座落位置',
            'div' => 'form-group',
            'class' => 'form-control',
            'required' => 'required',
        ));
        echo $this->Form->input('longitude', array(
            'type' => 'text',
            'label' => '經度',
            'div' => 'form-group col',
            'class' => 'form-control',
            'required' => 'required',
        ));
        echo $this->Form->input('latitude', array(
            'type' => 'text',
            'label' => '緯度',
            'div' => 'form-group col',
            'class' => 'form-control',
            'required' => 'required',
        ));
        echo $this->Form->submit('送出', array('class' => 'btn btn-primary btn-lg btn-block')) . '<hr />';
        echo $this->Form->input('sno', array(
            'type' => 'text',
            'label' => '官方編號',
            'div' => 'form-group col',
            'class' => 'form-control',
        ));
        echo $this->Form->input('area', array(
            'type' => 'text',
            'label' => '鄉鎮市區',
            'div' => 'form-group col',
            'class' => 'form-control',
        ));
        echo $this->Form->input('cunli', array(
            'type' => 'text',
            'label' => '村里',
            'div' => 'form-group col',
            'class' => 'form-control',
        ));
        echo $this->Form->input('size', array(
            'type' => 'text',
            'label' => '面積（公頃）',
            'div' => 'form-group col',
            'class' => 'form-control',
        ));
        echo $this->Form->input('class', array(
            'type' => 'text',
            'label' => '類型',
            'div' => 'form-group col',
            'class' => 'form-control',
        ));
        echo $this->Form->input('admin', array(
            'type' => 'text',
            'label' => '管理單位',
            'div' => 'form-group col',
            'class' => 'form-control',
        ));
        echo $this->Form->input('land_zone', array(
            'type' => 'text',
            'label' => '土地類型',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->input('note', array(
            'type' => 'textarea',
            'rows' => 5,
            'label' => '備註',
            'div' => 'form-group',
            'class' => 'form-control',
        ));
        echo $this->Form->submit('送出', array('class' => 'btn btn-primary btn-lg btn-block')) . '<hr />';
        ?>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
<?php
echo $this->Html->scriptBlock("var basePoint = [{$this->Form->data['Park']['longitude']}, {$this->Form->data['Park']['latitude']}];", array('inline' => false));
$this->Html->script('view/parks/edit', array('inline' => false));