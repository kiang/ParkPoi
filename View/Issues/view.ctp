<div class="govuk-grid-row">
    <div class="govuk-grid-column-full">
        <h1 class="govuk-heading-xl"><?php echo __('View 回報表單', true); ?></h1>
        <hr class="govuk-section-break govuk-section-break--m govuk-section-break--visible" />
        <dl class="govuk-summary-list">

            <div class="govuk-summary-list__row">
                <dt class="govuk-summary-list__key">許可證</dt>
                <dd class="govuk-summary-list__value"><?php
                    if ($this->data['Issue']['license_id']) {
                        echo $this->data['Issue']['license_id'];
                    }
                    ?></dd>
            </div>
        <div class="col">外部許可證</div>
        <div class="col"><?php
            if ($this->data['Issue']['license_uuid']) {

                echo $this->data['Issue']['license_uuid'];
            }
            ?>&nbsp;
        </div>
        <div class="col">編輯者</div>
        <div class="col"><?php
            if ($this->data['Issue']['info_source']) {

                echo $this->data['Issue']['info_source'];
            }
            ?>&nbsp;
        </div>
        <div class="col">分類</div>
        <div class="col"><?php
            if ($this->data['Issue']['status']) {

                echo $this->data['Issue']['status'];
            }
            ?>&nbsp;
        </div>
        <div class="col">藥品英文名</div>
        <div class="col"><?php
            if ($this->data['Issue']['name_english']) {

                echo $this->data['Issue']['name_english'];
            }
            ?>&nbsp;
        </div>
        <div class="col">藥品中文名</div>
        <div class="col"><?php
            if ($this->data['Issue']['name_chinese']) {

                echo $this->data['Issue']['name_chinese'];
            }
            ?>&nbsp;
        </div>
        <div class="col">許可證字號</div>
        <div class="col"><?php
            if ($this->data['Issue']['license']) {

                echo $this->data['Issue']['license'];
            }
            ?>&nbsp;
        </div>
        <div class="col">劑型</div>
        <div class="col"><?php
            if ($this->data['Issue']['dosage_form']) {

                echo $this->data['Issue']['dosage_form'];
            }
            ?>&nbsp;
        </div>
        <div class="col">含量（規格/劑量）</div>
        <div class="col"><?php
            if ($this->data['Issue']['dosage']) {

                echo $this->data['Issue']['dosage'];
            }
            ?>&nbsp;
        </div>
        <div class="col">批號（新變更的批號）</div>
        <div class="col"><?php
            if ($this->data['Issue']['batch_no']) {

                echo $this->data['Issue']['batch_no'];
            }
            ?>&nbsp;
        </div>
        <div class="col">舊外觀(上傳資料)</div>
        <div class="col"><?php
            if ($this->data['Issue']['pic_old']) {

                echo $this->data['Issue']['pic_old'];
            }
            ?>&nbsp;
        </div>
        <div class="col">新外觀(上傳資料)</div>
        <div class="col"><?php
            if ($this->data['Issue']['pic_new']) {

                echo $this->data['Issue']['pic_new'];
            }
            ?>&nbsp;
        </div>
        <div class="col">舊仿單(KEY IN)</div>
        <div class="col"><?php
            if ($this->data['Issue']['label_old']) {

                echo $this->data['Issue']['label_old'];
            }
            ?>&nbsp;
        </div>
        <div class="col">舊仿單(上傳資料)</div>
        <div class="col"><?php
            if ($this->data['Issue']['label_old_file']) {

                echo $this->data['Issue']['label_old_file'];
            }
            ?>&nbsp;
        </div>
        <div class="col">新仿單(KEY IN)</div>
        <div class="col"><?php
            if ($this->data['Issue']['label_new']) {

                echo $this->data['Issue']['label_new'];
            }
            ?>&nbsp;
        </div>
        <div class="col">新仿單(上傳資料)</div>
        <div class="col"><?php
            if ($this->data['Issue']['label_new_file']) {

                echo $this->data['Issue']['label_new_file'];
            }
            ?>&nbsp;
        </div>
        <div class="col">異動證明(公文/廠商說明書等)</div>
        <div class="col"><?php
            if ($this->data['Issue']['evidence']) {

                echo $this->data['Issue']['evidence'];
            }
            ?>&nbsp;
        </div>
        <div class="col">更新時間</div>
        <div class="col"><?php
            if ($this->data['Issue']['modified']) {

                echo $this->data['Issue']['modified'];
            }
            ?>&nbsp;
        </div>
        <div class="col">更新者</div>
        <div class="col"><?php
            if ($this->data['Issue']['modified_by']) {

                echo $this->data['Issue']['modified_by'];
            }
            ?>&nbsp;
        </div>
        </dl>
        <div class="govuk-button-group">
            <?php echo $this->Html->link(__('回報表單 List', true), array('action' => 'index'), array('class' => 'govuk-button govuk-button--secondary')); ?>
        </div>
        <div id="IssuesViewPanel"></div>
        <script type="text/javascript">
            //<![CDATA[
            $(function () {
                $('a.IssuesViewControl').click(function () {
                    $('#IssuesViewPanel').parent().load(this.href);
                    return false;
                });
            });
            //]]>
        </script>
    </div>
</div>