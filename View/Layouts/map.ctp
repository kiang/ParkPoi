<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-TW">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title><?php
            if (!empty($title_for_layout)) {
                echo $title_for_layout . ' @ ';
            }
            ?>台南也要特色公園</title>
        <link rel="stylesheet" href="https://openlayers.org/en/v4.2.0/css/ol.css" type="text/css"></link>
        <?php
        echo $this->Html->meta('description', '身在文化古都，也希望臺南的孩子可以在豐富、多樣且兼容的戶外活動空間盡情揮灑，政府動作不夠快，府城的家長自己動起來，讓我們熱愛的臺南「府城有特色」！');
        echo '<meta property="og:image" content="' . $this->Html->url('/img/logo.png', true) . '">';
        echo $this->Html->meta('icon');
        echo $this->Html->css('jquery-ui');
        echo $this->Html->css('bootstrap');
        echo $this->Html->css('default');
        ?>
    </head>
    <body>
        <div class="container">
            <div id="header">
                <h1><?php echo $this->Html->link('台南也要特色公園', '/'); ?></h1>
            </div>
            <div id="content">
                <div class="btn-group">
                    <?php
                    $loginMember = Configure::read('loginMember');
                    if (isset($loginMember['group_id'])) {
                        switch ($loginMember['group_id']) {
                            case 1:
                                echo $this->Html->link('通報資料', '/admin/issues', array('class' => 'btn btn-default'));
                                echo $this->Html->link('建立通報', '/admin/issues/add', array('class' => 'btn btn-default'));
                                echo $this->Html->link('公園', '/admin/parks', array('class' => 'btn btn-default'));
                                echo $this->Html->link('建立公園', '/admin/parks/add', array('class' => 'btn btn-default'));
                                echo $this->Html->link('帳號', '/admin/members', array('class' => 'btn btn-default'));
                                echo $this->Html->link('群組', '/admin/groups', array('class' => 'btn btn-default'));
                                break;
                            case 2:
                                echo $this->Html->link('通報資料', '/admin/issues', array('class' => 'btn btn-default'));
                                echo $this->Html->link('建立通報', '/admin/issues/add', array('class' => 'btn btn-default'));
                                echo $this->Html->link('公園', '/admin/parks', array('class' => 'btn btn-default'));
                                echo $this->Html->link('建立公園', '/admin/parks/add', array('class' => 'btn btn-default'));
                                break;
                        }
                    }
                    if (!empty($loginMember['group_id'])) {
                        echo $this->Html->link('編輯帳號', '/members/edit', array('class' => 'btn btn-default'));
                        echo $this->Html->link('登出', '/members/logout', array('class' => 'btn btn-default'));
                    } else {
                        echo $this->Html->link('登入', '/members/login', array('class' => 'btn btn-default'));
                    }
                    if (!empty($actions_for_layout)) {
                        foreach ($actions_for_layout as $title => $url) {
                            echo $this->Html->link($title, $url, array('class' => 'btn'));
                        }
                    }
                    ?>
                </div>
                <?php echo $this->Session->flash(); ?>
                <div id="viewContent"><?php echo $content_for_layout; ?></div>
            </div>
        </div>
        <div id="map" style="height: 90%; width: 100%;"></div>
        <div class="container">
            <div id="footer">
                ---<br />
                本網站係為<?php echo $this->Html->link('江明宗', 'https://www.facebook.com/k.olc.tw/', array('target' => '_blank')); ?>
                及<?php echo $this->Html->link('台南也要特色公園', 'https://www.facebook.com/142317883060795/', array('target' => '_blank')); ?>共同開發之平台，
                本網站資料僅供交流參考，本網站恕不負資訊正確之一切法律責任。
                <div class="pull-right">
                  本站內容採 <a href="https://creativecommons.org/licenses/by/4.0/deed.zh_TW" target="_blank">CC BY 4.0</a> 授權，歡迎分享利用
                  <a href="https://github.com/kiang/ParkPoi" target="_blank">網站原始碼</a>
                </div>
            </div>
        </div>
        <?php
        if ($loginMember['group_id'] == 1) {
            echo $this->element('sql_dump');
        }
        ?>
        <script>
            var baseUrl = '<?php echo $this->Html->url('/', true); ?>';
        </script>
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
        <script src="https://openlayers.org/en/v4.2.0/build/ol.js"></script>
        <?php
        echo $this->Html->script('jquery');
        echo $this->Html->script('jquery-ui');
        echo $this->Html->script('bootstrap.min');
        echo $this->Html->script('olc');
        echo $scripts_for_layout;
        ?>
    </body>
</html>
