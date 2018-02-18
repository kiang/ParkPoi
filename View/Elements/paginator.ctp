<?php

if (!isset($url)) {
    $url = array();
}
?><div class="btn-group" role="group" aria-label="分頁按鈕"><?php
echo $this->Paginator->first('<<', array('url' => $url, 'class' => 'btn btn-outline-secondary'));
echo $this->Paginator->prev('<', array('url' => $url, 'class' => 'btn btn-outline-secondary'));
echo $this->Paginator->numbers(array('url' => $url, 'class' => 'btn btn-outline-secondary'));
echo $this->Paginator->next('>', array('url' => $url, 'class' => 'btn btn-outline-secondary'));
echo $this->Paginator->last('>>', array('url' => $url, 'class' => 'btn btn-outline-secondary'));
?></div>