
<div id="popup" class="ol-popup">
    <a href="#" id="popup-closer" class="ol-popup-closer"></a>
    <div id="popup-content"></div>
</div>
<script>
    var baseUrl = '<?php echo $this->Html->url('/', true); ?>';
</script>
<?php
$this->Html->script('map', array('inline' => false));