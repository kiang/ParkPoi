<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl">建立公園</h1>
        
        <?php echo $this->Form->create('Park', array('url' => '/admin/parks/add', 'class' => 'govuk-form')); ?>
        
        <div id="parkMap" style="height: 300px; border: 3px solid #b1b4b6; margin-bottom: 30px;"></div>
        
        <div class="govuk-form-group">
            <label class="govuk-label" for="ParkName">
                <span class="govuk-label__text">名稱</span>
            </label>
            <?php echo $this->Form->input('name', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'ParkName',
                'required' => 'required',
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label" for="ParkLocation">
                <span class="govuk-label__text">座落位置</span>
            </label>
            <?php echo $this->Form->input('location', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'ParkLocation',
                'required' => 'required',
            )); ?>
        </div>
        
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkLongitude">經度</label>
                    <?php echo $this->Form->input('longitude', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkLongitude',
                        'required' => 'required',
                    )); ?>
                </div>
            </div>
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkLatitude">緯度</label>
                    <?php echo $this->Form->input('latitude', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkLatitude',
                        'required' => 'required',
                    )); ?>
                </div>
            </div>
        </div>
        
        <div class="govuk-button-group">
            <?php echo $this->Form->submit('建立公園', array('class' => 'govuk-button', 'div' => false)); ?>
        </div>
        
        <hr class="govuk-section-break govuk-section-break--m govuk-section-break--visible">
        
        <h2 class="govuk-heading-l">詳細資訊</h2>
        
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkSno">官方編號</label>
                    <?php echo $this->Form->input('sno', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkSno',
                    )); ?>
                </div>
            </div>
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkArea">鄉鎮市區</label>
                    <?php echo $this->Form->input('area', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkArea',
                    )); ?>
                </div>
            </div>
        </div>
        
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkCunli">村里</label>
                    <?php echo $this->Form->input('cunli', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkCunli',
                    )); ?>
                </div>
            </div>
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkSize">面積（公頃）</label>
                    <?php echo $this->Form->input('size', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkSize',
                    )); ?>
                </div>
            </div>
        </div>
        
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkClass">類型</label>
                    <?php echo $this->Form->input('class', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkClass',
                    )); ?>
                </div>
            </div>
            <div class="govuk-grid-column-one-half">
                <div class="govuk-form-group">
                    <label class="govuk-label" for="ParkAdmin">管理單位</label>
                    <?php echo $this->Form->input('admin', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'id' => 'ParkAdmin',
                    )); ?>
                </div>
            </div>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label" for="ParkLandZone">土地類型</label>
            <?php echo $this->Form->input('land_zone', array(
                'type' => 'text',
                'label' => false,
                'div' => false,
                'class' => 'govuk-input',
                'id' => 'ParkLandZone',
            )); ?>
        </div>
        
        <div class="govuk-form-group">
            <label class="govuk-label" for="ParkNote">備註</label>
            <?php echo $this->Form->input('note', array(
                'type' => 'textarea',
                'rows' => 5,
                'label' => false,
                'div' => false,
                'class' => 'govuk-textarea',
                'id' => 'ParkNote',
            )); ?>
        </div>
        
        <div class="govuk-button-group">
            <?php echo $this->Form->submit('儲存', array('class' => 'govuk-button', 'div' => false)); ?>
        </div>
        
        <?php echo $this->Form->end(); ?>
    </div>
</div>
</div>
<?php
$this->Html->script('view/parks/add', array('inline' => false));