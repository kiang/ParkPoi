<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-l">編輯公園</h1>
        
        <?php echo $this->Form->create('Park', array('url' => '/admin/parks/edit/' . $id)); ?>
        
        <!-- Map Section -->
        <div class="govuk-form-group">
            <div id="parkMap" style="height: 300px; border: 3px solid #b1b4b6; margin-bottom: 30px;"></div>
        </div>
        
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-full">
                <?php echo $this->Form->input('id'); ?>
                
                <div class="govuk-form-group">
                    <label class="govuk-label govuk-label--m" for="ParkName">名稱</label>
                    <?php echo $this->Form->input('name', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'required' => 'required',
                        'id' => 'ParkName'
                    )); ?>
                </div>
                
                <div class="govuk-form-group">
                    <label class="govuk-label govuk-label--m" for="ParkLocation">座落位置</label>
                    <?php echo $this->Form->input('location', array(
                        'type' => 'text',
                        'label' => false,
                        'div' => false,
                        'class' => 'govuk-input',
                        'required' => 'required',
                        'id' => 'ParkLocation'
                    )); ?>
                </div>
                
                <div class="govuk-grid-row">
                    <div class="govuk-grid-column-one-half">
                        <div class="govuk-form-group">
                            <label class="govuk-label govuk-label--m" for="ParkLongitude">經度</label>
                            <?php echo $this->Form->input('longitude', array(
                                'type' => 'text',
                                'label' => false,
                                'div' => false,
                                'class' => 'govuk-input',
                                'required' => 'required',
                                'id' => 'ParkLongitude'
                            )); ?>
                        </div>
                    </div>
                    <div class="govuk-grid-column-one-half">
                        <div class="govuk-form-group">
                            <label class="govuk-label govuk-label--m" for="ParkLatitude">緯度</label>
                            <?php echo $this->Form->input('latitude', array(
                                'type' => 'text',
                                'label' => false,
                                'div' => false,
                                'class' => 'govuk-input',
                                'required' => 'required',
                                'id' => 'ParkLatitude'
                            )); ?>
                        </div>
                    </div>
                </div>
                
                <div class="govuk-button-group">
                    <?php echo $this->Form->submit('送出', array('class' => 'govuk-button')); ?>
                </div>
                
                <hr class="govuk-section-break govuk-section-break--xl govuk-section-break--visible">
                
                <!-- Additional Fields -->
                <div class="govuk-grid-row">
                    <div class="govuk-grid-column-one-half">
                        <div class="govuk-form-group">
                            <label class="govuk-label" for="ParkSno">官方編號</label>
                            <?php echo $this->Form->input('sno', array(
                                'type' => 'text',
                                'label' => false,
                                'div' => false,
                                'class' => 'govuk-input',
                                'id' => 'ParkSno'
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
                                'id' => 'ParkArea'
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
                                'id' => 'ParkCunli'
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
                                'id' => 'ParkSize'
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
                                'id' => 'ParkClass'
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
                                'id' => 'ParkAdmin'
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
                        'id' => 'ParkLandZone'
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
                        'id' => 'ParkNote'
                    )); ?>
                </div>
                
                <div class="govuk-button-group">
                    <?php echo $this->Form->submit('送出', array('class' => 'govuk-button')); ?>
                </div>
            </div>
        </div>
        
        <?php echo $this->Form->end(); ?>
    </div>
</div>
<?php
echo $this->Html->scriptBlock("var basePoint = [{$this->Form->data['Park']['longitude']}, {$this->Form->data['Park']['latitude']}];", array('inline' => false));
$this->Html->script('view/parks/edit', array('inline' => false));