<!DOCTYPE html>
<html lang="zh-TW" class="govuk-template">
    <head>
        <meta charset="utf-8">
        <title><?php echo $page_title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#0b0c0c">
        
        <link rel="shortcut icon" sizes="16x16 32x32 48x48" href="<?php echo $this->Html->url('/favicon.ico'); ?>" type="image/x-icon">
        <link rel="mask-icon" href="<?php echo $this->Html->url('/images/govuk-icon-mask.svg'); ?>" color="#0b0c0c">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->Html->url('/images/govuk-icon-180.png'); ?>">
        
        <?php echo $this->Html->css('govuk-frontend.min'); ?>
        
        <?php if (Configure::read() == 0) { ?>
            <meta http-equiv="Refresh" content="<?php echo $pause ?>;url=<?php echo $url ?>"/>
        <?php } ?>
    </head>
    <body class="govuk-template__body">
        <script>document.body.className += ' js-enabled' + ('noModule' in HTMLScriptElement.prototype ? ' govuk-frontend-supported' : '');</script>
        
        <div class="govuk-width-container">
            <main class="govuk-main-wrapper" id="main-content" role="main">
                <div class="govuk-grid-row">
                    <div class="govuk-grid-column-two-thirds govuk-grid-column-two-thirds-from-desktop">
                        <div class="govuk-panel govuk-panel--confirmation">
                            <div class="govuk-panel__body">
                                <a href="<?php echo $url ?>" class="govuk-link govuk-link--no-visited-state"><?php echo $message ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        
        <?php echo $this->Html->script('govuk-frontend.min'); ?>
        <script>window.GOVUKFrontend.initAll()</script>
    </body>
</html>
