<!DOCTYPE html>
<html lang="zh-TW" class="govuk-template">
    <head>
        <meta charset="utf-8">
        <title><?php
            if (!empty($title_for_layout)) {
                echo $title_for_layout . ' @ ';
            }
            ?>台南也要特色公園</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#0b0c0c">
        <?php
        echo $this->Html->meta('description', '身在文化古都，也希望臺南的孩子可以在豐富、多樣且兼容的戶外活動空間盡情揮灑，政府動作不夠快，府城的家長自己動起來，讓我們熱愛的臺南「府城有特色」！');
        echo '<meta property="og:image" content="' . $this->Html->url('/img/logo.png', true) . '">';
        ?>
        
        <link rel="shortcut icon" sizes="16x16 32x32 48x48" href="<?php echo $this->Html->url('/favicon.ico'); ?>" type="image/x-icon">
        <link rel="mask-icon" href="<?php echo $this->Html->url('/images/govuk-icon-mask.svg'); ?>" color="#0b0c0c">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->Html->url('/images/govuk-icon-180.png'); ?>">
        
        <?php echo $this->Html->css('govuk-frontend.min'); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.2.0/ol.css" type="text/css">
        <?php echo $this->Html->css('default'); ?>
        
        <style>
            #map {
                height: 70vh;
                width: 100%;
                border: 3px solid #b1b4b6;
                margin: 20px 0;
            }
            
            .map-controls {
                position: absolute;
                top: 10px;
                left: 10px;
                z-index: 1000;
                background: rgba(255, 255, 255, 0.95);
                padding: 10px;
                border-radius: 4px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            }
            
            .map-info {
                position: absolute;
                bottom: 10px;
                left: 10px;
                right: 10px;
                z-index: 1000;
                background: rgba(255, 255, 255, 0.95);
                padding: 10px;
                border-radius: 4px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
                max-height: 200px;
                overflow-y: auto;
            }
        </style>
    </head>
    <body class="govuk-template__body">
        <script>document.body.className += ' js-enabled' + ('noModule' in HTMLScriptElement.prototype ? ' govuk-frontend-supported' : '');</script>
        
        <a href="#main-content" class="govuk-skip-link" data-module="govuk-skip-link">Skip to main content</a>
        
        <header class="govuk-header" data-module="govuk-header">
            <div class="govuk-header__container govuk-width-container">
                <div class="govuk-header__logo">
                    <a href="<?php echo $this->Html->url('/'); ?>" class="govuk-header__link govuk-header__link--homepage">
                        <span class="govuk-header__logotype">
                            <span class="govuk-header__logotype-text">台南也要特色公園</span>
                        </span>
                    </a>
                </div>
            </div>
        </header>
        
        <div class="govuk-width-container">
            <main class="govuk-main-wrapper" id="main-content" role="main" style="padding-bottom: 0;">
                <!-- Map controls -->
                <div class="govuk-grid-row" style="margin-bottom: 10px;">
                    <div class="govuk-grid-column-full">
                        <?php
                        $loginMember = Configure::read('loginMember');
                        if (isset($loginMember['group_id'])) {
                            echo '<div class="govuk-button-group">';
                            switch ($loginMember['group_id']) {
                                case 1:
                                    echo $this->Html->link('建立通報', '/admin/issues/add', array('class' => 'govuk-button govuk-button--secondary'));
                                    echo $this->Html->link('建立公園', '/admin/parks/add', array('class' => 'govuk-button govuk-button--secondary'));
                                    break;
                                case 2:
                                    echo $this->Html->link('建立通報', '/admin/issues/add', array('class' => 'govuk-button govuk-button--secondary'));
                                    echo $this->Html->link('建立公園', '/admin/parks/add', array('class' => 'govuk-button govuk-button--secondary'));
                                    break;
                            }
                            echo '</div>';
                        }
                        
                        echo '<div class="govuk-button-group">';
                        echo $this->Html->link('照片牆', '/issues/index', array('class' => 'govuk-button govuk-button--secondary'));
                        echo $this->Html->link('返回首頁', '/', array('class' => 'govuk-button govuk-button--secondary'));
                        if (empty($loginMember['group_id'])) {
                            echo $this->Html->link('登入', '/members/login', array('class' => 'govuk-button'));
                        }
                        echo '</div>';
                        
                        if (!empty($actions_for_layout)) {
                            echo '<div class="govuk-button-group">';
                            foreach ($actions_for_layout as $title => $url) {
                                echo $this->Html->link($title, $url, array('class' => 'govuk-button govuk-button--secondary'));
                            }
                            echo '</div>';
                        }
                        ?>
                        
                        <?php 
                        $flashMessage = $this->Session->flash();
                        if ($flashMessage) {
                            echo '<div class="govuk-notification-banner" role="region" aria-labelledby="govuk-notification-banner-title" data-module="govuk-notification-banner">';
                            echo '<div class="govuk-notification-banner__header">';
                            echo '<h2 class="govuk-notification-banner__title" id="govuk-notification-banner-title">重要</h2>';
                            echo '</div>';
                            echo '<div class="govuk-notification-banner__content">';
                            echo '<p class="govuk-notification-banner__heading">' . strip_tags($flashMessage) . '</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                
                <!-- Map content area -->
                <div style="position: relative;">
                    <div id="viewContent"><?php echo $content_for_layout; ?></div>
                </div>
            </main>
        </div>
        
        <!-- Map container -->
        <div id="map"></div>
        
        <footer class="govuk-footer" role="contentinfo" style="margin-top: 20px;">
            <div class="govuk-width-container">
                <div class="govuk-footer__meta">
                    <div class="govuk-footer__meta-item govuk-footer__meta-item--grow">
                        <p class="govuk-footer__meta-custom">
                            本網站係為<?php echo $this->Html->link('江明宗', 'https://www.facebook.com/k.olc.tw/', array('target' => '_blank', 'class' => 'govuk-footer__link')); ?>
                            及<?php echo $this->Html->link('台南也要特色公園', 'https://www.facebook.com/142317883060795/', array('target' => '_blank', 'class' => 'govuk-footer__link')); ?>共同開發之平台，
                            本網站資料僅供交流參考，本網站恕不負資訊正確之一切法律責任。
                        </p>
                        <p class="govuk-footer__meta-custom">
                            本站內容採 <a href="https://creativecommons.org/licenses/by/4.0/deed.zh_TW" target="_blank" class="govuk-footer__link">CC BY 4.0</a> 授權，歡迎分享利用
                            <a href="https://github.com/kiang/ParkPoi" target="_blank" class="govuk-footer__link">網站原始碼</a>
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Admin navigation for logged in users -->
        <?php if (isset($loginMember['group_id'])): ?>
        <div class="govuk-width-container" style="position: fixed; bottom: 0; left: 0; right: 0; background: #f3f2f1; border-top: 1px solid #b1b4b6; padding: 10px 0; z-index: 1000;">
            <div class="govuk-button-group" style="margin: 0; display: flex; flex-wrap: wrap; gap: 5px;">
                <?php
                switch ($loginMember['group_id']) {
                    case 1:
                        echo $this->Html->link('通報資料', '/admin/issues', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                        echo $this->Html->link('公園', '/admin/parks', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                        echo $this->Html->link('帳號', '/admin/members', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                        echo $this->Html->link('群組', '/admin/groups', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                        break;
                    case 2:
                        echo $this->Html->link('通報資料', '/admin/issues', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                        echo $this->Html->link('公園', '/admin/parks', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                        break;
                }
                echo $this->Html->link('照片牆', '/issues/index', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                echo $this->Html->link('編輯帳號', '/members/edit', array('class' => 'govuk-button govuk-button--secondary', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                echo $this->Html->link('登出', '/members/logout', array('class' => 'govuk-button govuk-button--warning', 'style' => 'margin: 0; font-size: 14px; padding: 5px 10px;'));
                ?>
            </div>
        </div>
        <?php endif; ?>
        
        <?php
        if (isset($loginMember['group_id']) && $loginMember['group_id'] == 1) {
            echo $this->element('sql_dump');
        }
        ?>
        
        <script>
            var baseUrl = '<?php echo $this->Html->url('/', true); ?>';
        </script>
        <?php echo $this->Html->script('govuk-frontend.min'); ?>
        <script>window.GOVUKFrontend.initAll()</script>
        <script src="https://cdn.polyfill.io/v2/polyfill.min.js?features=requestAnimationFrame,Element.prototype.classList,URL"></script>
        <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.5/dist/js.cookie.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/openlayers/4.2.0/ol.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" crossorigin="anonymous"></script>
        <?php
        echo $this->Html->script('olc');
        echo $scripts_for_layout;
        ?>
    </body>
</html>
