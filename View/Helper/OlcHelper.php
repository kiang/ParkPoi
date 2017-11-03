<?php

class OlcHelper extends AppHelper {

    public $helpers = array('Html');

    public function imgLink($field, $file) {
        if (!empty($file)) {
            $p = pathinfo($file);
            $img = $p['filename'] . '_s.jpg';
            return $this->Html->image($field . '/' . $img, array('width' => 200));
        }
        return '';
    }

}
