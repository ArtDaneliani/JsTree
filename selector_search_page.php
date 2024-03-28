<?php echo $header; ?>
<link rel="stylesheet" href="/static/css/jstree.css"/>
<script src="/static/js/lib/jstree.js"></script>
<link rel="stylesheet" href="https://uicdn.toast.com/tui.pagination/latest/tui-pagination.css" />
<script src="https://uicdn.toast.com/tui.pagination/latest/tui-pagination.js"></script>
<link rel="stylesheet" href="/static/css/jquery.dataTables.min.css">
<script src="/static/js/lib/jquery.dataTables.min.js"></script>
<style>
    /*TOOLTIP*/
    .tooltip-inner {
        background: rgba(18, 50, 98, 0.91) !important;
        border-color: rgba(18, 50, 98, 0.91) !important;
        width:auto;
        height: auto;
        padding: 5px 10px;
        z-index: 1111 !important;
        opacity: 1 !important;
    }
    .tooltip-arrow {
        border-top-color: rgba(18, 50, 98, 0.91) !important;
    }
    /* PRELOADER */
    #preloader {
        position: relative;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ffffff;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .spinner {
        width: 30px;
        height: 30px;
        border: 1px solid #ccc;
        border-top-color: #003366;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 1em;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }
    /* PRELOADER */

    .categories {
        width: 30%;
        padding: 5px 15px 5px 0px;
        /*overflow: hidden;*/
    }
    .jstree-anchor.jstree-clicked,
    .jstree-anchor.jstree-hovered {
        background-color: transparent !important;
        border-radius:unset !important;
        box-shadow:unset !important;
    }
    .column.brends {
        width: 70%;
        float: right;
        padding: 5px 0px 5px 15px;
    }
    .jstree-node a {
        font-size:14px;
    }
    .list-header {
        padding: 0 !important;
    }

    .list-body > ul >.list-item {
        font-size: 13px;
    }
    .mod-item {
        font-size: 13px;
        line-height: 130%;
        margin-bottom: 4px;
    }
    #cat_maint .brand-item:hover,
    #cat_maint .mod-item:hover {
        cursor: pointer;
        font-weight: 600;
    }
    .uk-width-1-2 {
        display: flex;
        align-items: center;
    }
    .uk-width-auto {
        margin-right: 10px;
    }
    .filter-btn-block {
        display: flex;
        flex-direction: row;
        justify-content: end;
    }
    .filter-btn-block > button {
        margin-left: 10px;
    }
    .top_cat_tab_btn {
        background: #fff;
        border: 1px solid;
        border-radius: 4px;
        font-size: 16px;
        padding: unset;
        height: 34px;
        width: 30%;
    }
    .top_cat_tab_btn:hover {
        border:none;
        background-color: #003366;
        color: #fff;
    }
    #all_marks {
        width: 12%;
    }
    #goods {
        float: right;
        margin: 0 auto;
        width: 70%;
    }
    .item-goods {
        display: flex;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        margin-top: 5px;
        width: 98%;
        margin-right: 0px;
        margin-left: auto;
    }
    .item-image > img {
        margin: 0 auto;
        background-color: transparent;
        border: none;
        max-height: 160px;
    }
    .brand-item, .article {
        margin: 1px auto;
    }
    #cat_maint .list-header {
        width: 17px;
    }
    .item-image {
        position: relative;
        padding: 0px;
        text-align: center;
    }
    .specifics:nth-child(odd) {
        background-color: #f4f4f4;
    }
    .item-description {
        border-right: 1px solid #dadada;
        min-height: 245px;
    }
    .item-description h4 {
        font-weight: bold;
    }
    .item-description > p,
    .item-description > h4 {
        margin: 4px 0px;
    }
    .item-description > p,
    .item-description > p > b {
        font-size: 14px;
    }

    #table_goods {
        display: none;
    }

    .pagination {
        display: flex;
        align-items: center;
        margin: 20px;
    }

    .pagination a, .pagination span  {
        text-decoration: none;
        padding: 5px;
        border: 1px solid #777
    }
    .page.active {
        background: red;
    }
    .specifics > span {
        color: #363636;
        font-size: 14px;
        line-height: 110%;
        width: 50%;
        text-align: left;
    }
    .specifics > span:not(:first-child) {
        text-align: right;
    }
    .manufact {
        text-decoration: underline;
    }
    .manufact:hover {
        cursor: pointer;
    }
    .specifics{
        margin: unset;
        justify-content: space-between;
        display: flex;
        padding: 7px 5px;
    }
    .item-image,
    .item-description,
    .item-price {
        padding: 20px;
    }
    .item-goods > .item-price {
        min-height: 245px;
        height: inherit;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .go_to_price{
        border: 1px solid #003366;
        padding: 10px 20px;
        border-radius: 7px;
        background: #003366;
        color: white;
        font-weight: 400;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .go_to_price:hover{
        font-weight: 400;
        border: 1px solid #003366;
        border-radius: 7px;
        background: #fff;
        color:#003366;
    }
    .all-marks-btn {
        margin: 15px;
    }
    .favorite,
    .all-marks {
        border: 1px solid #003366;
        background-color: #fff;
        color: #003366;
    }
    .favorite:hover,
    .all-marks:hover {
        border: 1px solid #003366;
        background-color: #003366;
        color: #fff;
    }

    .tui-pagination .tui-page-btn.tui-is-selected {
        background-color: #003366;
        color: #fff;
        font-weight: 600;
    }


    .tui-pagination .tui-page-btn.tui-is-disabled.tui-first,
    .tui-pagination .tui-page-btn.tui-is-disabled.tui-next,
    .tui-pagination .tui-page-btn.tui-is-disabled.tui-last,
    .tui-pagination .tui-page-btn.tui-is-disabled.tui-prev {
        border:  1px solid #0033664f !important;
        height: 28px;
    }
    .tui-pagination .tui-page-btn.tui-is-disabled.tui-first > .tui-ico-first,
    .tui-pagination .tui-page-btn.tui-is-disabled.tui-next > .tui-ico-next,
    .tui-pagination .tui-page-btn.tui-is-disabled.tui-last > .tui-ico-last,
    .tui-pagination .tui-page-btn.tui-is-disabled.tui-prev > .tui-ico-prev {
        color: #0033664f !important;
    }


    .tui-page-btn.tui-last,
    tui-page-btn.tui-last > .tui-ico-last,
    .tui-page-btn.tui-next,
    tui-page-btn.tui-last > .tui-ico-next,
    .tui-page-btn.tui-prev,
    .tui-page-btn.tui-ico-prev,
    .tui-page-btn.tui-first,
    .tui-page-btn.tui-first.tui-ico-first {
        color: #003366 !important;
        height: 28px;
        border: 1px solid #036 !important;
    }
    .tui-pagination .tui-page-btn {
        color: #036;
        border: 1px solid #036;
        border-radius: 4px;
        margin: auto 3px;
        height: 28px;
    }
    .tui-pagination .tui-page-btn:hover {
        background-color: #0033663d;
    }
    .item-price {
        text-align:center;
    }

    .item-part-numbers {
        position: relative;
    }
    .popover {
        display: none;
    }
    .popover {
        top: -8px;
        left: 183.117px;
        position: absolute;
        width: 260px;
        max-height: 260px;
        padding: 1px;
        font-weight: 400;
        line-break: auto;
        line-height: 1.42857;
        text-align: start;
        font-size: 13px;
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 0;
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }
    .oem-nums-btn {
        background: #fff;
        border: 1px solid;
        border-radius: 5px;
        padding: 3px;
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 8px auto 0px auto;
        font-size: 12px;
        width: 75%;
    }
    .oem-nums-btn:hover {
        background-color: #036;
        color: #fff;
        border-radius: 5px;
        border: 1px solid;
    }
    .list-group-flush {
        position: relative;
        display: block;
        padding: 5px 10px;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid #ddd;
    }
    .oem-number > a {
        font-size: 13px;
        text-transform: unset;
        text-decoration: unset;
    }
    .oem-number > a:hover {
        font-weight: 600;
    }
    .popover-content {
        max-height: 165px;
        overflow-y: auto;
    }

    .popover.right > .arrow::after {
        border-right-color: #f7f7f7;
    }
    .cs-BYN::after {
        content: " руб";
    }
    .year {
        font-size: 13px;
        font-weight: 400;
        color: #2c2b2b;
    }
    .img_wrapper {
        width: 33%;
    }
    .favorite.current,
    .all-marks.current {
        background-color: #003366;
        color: #fff;
    }
    .td_model_block {
        padding: 10px 10px;
    }
    .td_model_block:hover {
        background-color: transparent;
        box-shadow: 0px 1px 10px #08396a2e;
    }
    .favored {
        margin-bottom: 0;
    }
    .col-md-6.td_model_block.i_block.mod-item,
    .col-md-6.td_model_block.i_block.modif-item {
        margin: 5px 0px;
    }
    /*MODAL LINKED VEHICLES*/
    #linked_vehicles {
        display:none;
    }

    .modal-content {
        height: auto;
    }
    .modal-header,
    .modal-dialog {
        min-width: 300px;
        max-width: 900px;
    }
    .modal-search {
        height: 30px;
    }
    #dataTables-example_filter  input {
        height: 26px;
    }
    #dataTables-example_filter select{
        width: 50%;
        border-radius: 4px;
        height: 26px;
        margin-bottom: 10px;
        font-size: 16px;
        line-height: 1.428571;
        color: #355d85;
        background-color: #ffffff;
        background-image: none;
        border: 1px solid #aaa;
    }
    .select-marks {
        padding-left: 0px;
    }
    #dataTables-example_paginate,
    #dataTables-example_length {
        width: 30%;
        margin-top: 10px;
        height: auto;
    }
    #dataTables-example_paginate {
        margin-top: 2px;
        width: 60%;
    }
    #dataTables-example_paginate span a {
        height: 26px;
        padding: 2px;
        width: 26px;
        background: #ffffff;
        border-radius: 4px;
    }
    #dataTables-example_paginate span a:hover {
        height: 26px;
        padding: 2px;
        width: 26px;
        color: #ffffff !important;
        background: #123262;
        border-radius: 4px;
    }
    .paginate_button.previous.disabled,
    .paginate_button.next.disabled {
        color: #123262 !important;
        background: #ffffff !important;
        font-weight: normal !important;
    }
    .paginate_button.previous.disabled:hover,
    .paginate_button.next.disabled:hover {
        color: #123262 !important;
        background: #ffffff !important;
        font-weight: normal !important;
    }
    .paginate_button.previous:hover,
    .paginate_button.next:hover {
        color: #ffffff !important;
        background: #123262 !important;
        font-weight: normal !important;
        border-radius: 4px !important;
    }
    #dataTables-example_paginate  a {
        height: 37px;
        padding: 5px;
    }
    #dataTables-example_filter {
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: space-between;
    }
    #dataTables-example_wrapper {
        /*height: 450px;*/
    }
    #dataTables-example > thead > tr > th:first-child {
        width: 15% !important;
    }
    #dataTables-example > thead > tr > th:nth-child(2) {
        width: 35% !important;
    }
    #dataTables-example > thead > tr > th:nth-child(3) {
        width: 30% !important;
    }
    #dataTables-example > thead > tr > th:last-child {
        width: 20% !important;
    }
    #dataTables-example tbody tr:hover {
        background-color: #12326212;
        /*cursor: pointer;*/
    }
    #dataTables-example thead > tr> th {
        font-size: 15px;
        height: 16px;
        padding: 5px;
        line-height: 120%;
    }
    #dataTables-example tbody > tr.odd {
        background: #fafafa;
    }
    #dataTables-example tbody > tr> td {
        font-size: 14px;
        height: 16px;
        padding: 5px;
        line-height: 120%;
    }
    .temp-selector {
        display: none !important;
    }
    #dataTables-example_filter > #linked_marks {
        display: block;
        width: 50%;
        text-align: start;
        padding-left: 0px;
    }
    .modal-header {
        align-items: center;
        display: flex;
        flex-direction: row-reverse;
        justify-content: space-between;
    }
    .modal-title {
        font-size: 17px;
    }
    .modal-dialog {
        margin: 25vh auto;
    }
    .modal-content {
        border: none !important;
    }
    #info-content {
        padding: 20px;
    }
    button.close {
        color: #fff;
        opacity: 1;
        font-size: 20px;
        margin: 0px 5px;
        height: 100%;
        -webkit-transition: -webkit-transform .8s ease-in-out;
        transition:         transform .8s ease-in-out;
    }
    button.close:hover {
        color: #fff;
        -webkit-transform: rotate(315deg);
        transform: rotate(315deg);
    }
    #myModals {
        display: none;
        opacity: 1;
        -webkit-transition: background-color 1000ms linear;
        -moz-transition: background-color 1000ms linear;
        -o-transition: background-color 1000ms linear;
        -ms-transition: background-color 1000ms linear;
        transition: background-color 1000ms linear;
    }
    #dataTables-example tbody tr:hover {
        font-weight: normal !important;
        cursor: pointer;
    }
    #dataTables-example {
        white-space: nowrap;
    }
    .m_img {
        width: 180px;
    }
    .thumbnail.tecdoc_image {
        cursor: pointer;
    }
</style>
<div id="tecdoc">
    <div class="form-group row">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-3">
            <select class="form-control" id="tecdoc_marks" style="border-radius: 5px;">
                <option value="0">Марка</option>
                <?php
                foreach ($marks as $m) {
                    echo '<option value="' . $m->id . '">' . $m->name . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-3">
            <select class="form-control" name="" id="tecdoc_models" style="border-radius: 5px;">
                <option value="0">Модель</option>
                <?php if(isset($models)) {
                    $n = 'н.в.';
                    $d = '';
                    foreach ($models as $m) {
                        if ($m->from) {
                            $to = ($m->to) ?: $n;
                            $d = ' (' . $m->from . '-' . $to . ')';
                        }
                        echo '<option class="model-item" value="' . $m->id . '">' . $m->name . $d . '</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-3">
            <select class="form-control" name="" id="tecdoc_modific" style="border-radius: 5px;">
                <option value="0">Модификация</option>
                <?php if(isset($modifications)) {
                    $n = 'н.в.';
                    $d = '';
                    foreach ($modifications as $m) {
                        if ($m->PC_ENG_CODES) {
                            $engine = ($m->PC_ENG_CODES) ?: '';
                        }
                        if ($m->from) {
                            $to = ($m->to) ?: $n;
                            $d = ' (' . $m->from . '-' . $to . ')';
                        }
                        echo '<option class="model-item" value="' . $m->id . '">' . $m->name . ' ' . $m->PC_ENGINE_TYPE . ' (' .  $m->HP . 'л.с | ' . $m->HP . 'кВт | ' . $engine .') '.$d .'</option>';
                    }
                }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-3 filter-btn-block">
            <button class="tecdoc_cat uk-display-block top_cat_tab_btn" id="reset_filters" rel="tooltip" data-container="#tecdoc" title="Сброс"><i class="fa fa-repeat"></i></button>
            <?php if(isset($modifications)) { ?>
                <button class="tecdoc_cat uk-display-block top_cat_tab_btn" id="add_garage" data-container="#tecdoc" title="Добавить в гараж" rel="tooltip"><i class="fa fa-floppy-o"></i></button>
            <?php } ?>
            <button class="tecdoc_cat uk-display-block top_cat_tab_btn" id="garage" onclick="goToGarage()" rel="tooltip" data-container="#tecdoc" title="Перейти в гараж"><i class="fa fa-car"></i></button>
        </div>
    </div>

    <h2 id="title_goods" <?php  if(!isset($modifications)) {  echo 'class="mob_version_title"'; } ?> >Список автозапчастей</h2>
    <div id="brands" class="column brends">
        <?php if(!isset($modification)) $this->drawModule('tecdoc/brands');  ?>
    </div>

    <div class="center-block_wrapper">
        <div id="goods" class="table-responsive">
            <div id="preloader"><div class="spinner"></div>Пожалуйста, подождите...</div>
            <div id="table_goods" class="tec_doc_articles display">
                <div id="goods_list" style="width: 100%">
                </div>
            </div>
            <ul id="pagination2" class="tui-pagination"></ul>
        </div>
        <div id="tree" class="column categories <?php  if(!isset($modifications)) {  echo ' mob_version_tree'; } ?> ">
        </div>
    </div>

    <div id="tecdoc_lightbox" class="hidden" style="position:fixed;left:0;top:0;width: 100%;height: 100%;z-index: 999">
        <div style="position:absolute;left:0;top:0;width: 100%;height: 100%;background: black;opacity: 0.7;"></div>
        <img src="" style="position: absolute;left:50%;top:50%;transform: translate(-50%,-50%); max-height:700px">
        <button id="close_tecdoc_lightbox" type="button" style="position: absolute;right: 50%;top:50%;font-size: 30px;color: white;background: transparent;border: 0;"><i class="fa fa-close"></i></button>
    </div>
    <div id="info-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" id="info-content"></div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModals">
    <div class="modal-dialog" id="modal_dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeDialog()">&#10006;</button>
                <h4 class="modal-title" id="myModalLabel">Применимость</h4>
            </div>
            <div class="modal-body">
                <div class="modal-body-table">
                    <div class="empty_message"></div>
                    <table id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Марка</th>
                            <th>Модель</th>
                            <th>Модификация</th>
                            <th>Год выпуска</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>
<script>
    $(document).ready(function () {
        $("[rel=tooltip]").tooltip({
            placement: 'top'
        });
        $('#tecdoc_marks').val('<?php echo $mark ?? 0; ?>');
        $('#tecdoc_models').val('<?php echo $model ?? 0; ?>');
        $('#tecdoc_modific').val('<?php echo $modification ?? 0; ?>');

        buildTree('<?php echo $modification ?? 0; ?>', '<?php echo $current_category['id'] ?? 0; ?>', '<?php echo $current_category['name'] ?? 0; ?>');
        <?php  if(!isset($modifications)) { ?>
        setButtons(1, true);
        <?php  } ?>
    });
    //основные функции обработки селекторов/брендов
    function mark_list(resp) {
        const r = JSON.parse(resp)
        let select_models = '';
        const n = 'н.в.';
        let d = '';
        $.each(r, function (i, val) {
            if (val.from) {
                const to = val.to || n;
                d = ` <span class="year" style="color:red;">(${val.from} - ${to})</span>`;
            }
            select_models += `<option class="model-item" value="${val.id}">${val.name}${d}</option>`;
        })
        return  select_models;
    }
    function selector_modif(resp) {
        const r = JSON.parse(resp)
        let select_modifs = '';
        let power = '';
        const n = 'н.в.';
        let d = '';
        $.each(r, function (i, val) {
            if (val.from) {
                const to = val.to || n;
                d = ` <span class="year" style="color:#6d6d6d;">${val.from} - ${to}</span>`;
            }
            if (val.PC_ENG_CODES) {
                const pwr = val.PC_ENG_CODES || '';
                power = ` <span class="year" style="color:#6d6d6d;">${val.PC_ENGINE_TYPE} (${val.HP}л.с. | ${val.kw}кВт. | ${pwr})</span>`;
            }
            select_modifs += `<option class="model-item" value="${val.id}">${val.name}${power}${d}</option>`;
        })
        return  select_modifs;
    }

    function model_list(resp) {
        const r = JSON.parse(resp);
        let select_models = `<ul class="favored" style="padding: 0px;">`;
        const n = 'н.в.';
        let d = '';
        $.each(r, function (i, val) {
            if(!val.favorite) {
                if (val.from) {
                    const to = val.to || n;
                    d = ` <span class="year" style="color:#6d6d6d;">(${val.from} - ${to})</span>`;
                }
                const d_brand = (val.name.toLowerCase().replaceAll(' ', ''));

                select_models += `<li class="col-md-6 td_model_block i_block mod-item" style="text-align: left;display: flex;align-items: center;height: 100px;" data-brand="${d_brand}" value="${val.id}">
                                <div class="img_wrapper">
                                    <img class="m_img" src="/img.cars/models/jpg/${val.id}.jpg" onError="this.onerror=null;this.src='/static/image/asset/nocar.png';" style="width: 180px;">
                                </div>
                                <div style="display: inline-block;line-height: 130%;padding-left: 10px;font-size: 15px;">${val.name}${d}</div>
                                </li>`;
            } else {
                setButtons(val.favorite, false);
            }
        });
        return select_models + '</ul>';
    }
    function modif_list(resp) {
        const r = JSON.parse(resp);
        let select_models = `<ul class="favored" style="padding: 0px;">`;
        let power = '';
        const n = 'н.в.';
        let d = '';
        $.each(r, function (i, val) {
            if (val.from) {
                const to = val.to || n;
                d = ` <span class="year" style="color:#6d6d6d;">${val.from} - ${to}</span>`;
            }
            if (val.PC_ENG_CODES) {
                const pwr = val.PC_ENG_CODES || '';
                power = ` <span class="year" style="color:#6d6d6d;">${val.PC_ENGINE_TYPE} (${val.HP}л.с. | ${val.kw}кВт. | ${pwr})</span>`;
            }
            select_models += `<li class="col-md-6 td_model_block i_block modif-item" style="text-align: left;display: flex;align-items: center;height: 100px;" data-brand="${val.name}" value="${val.id}">
                                  <img class="m_img" src="/img.cars/carImages/${val.id}.jpg" onError="this.onerror=null;this.src='/static/image/asset/nocar.png';" style="width: 180px;">
                                  <div style="display: inline-block;line-height: 130%;padding-left: 10px;font-size: 15px;">${val.name}&nbsp;&nbsp;${power}${d}</div>
                              </li>`;
        });
        return select_models + '</ul>';
    }


    //SELECTOR
    $('#tecdoc_marks').on('change', function () {
        const m = $(this).find('option:selected').val();
        const v = 1; //легковые авто
        const favorite = <?php echo (!isset($modifications)) ?  1 :  2; ?>;
        //при выборе селектора Марка общий сброс
        if (m == 0) {
            check_clean();
        } else {
            $.ajax({
                method: 'POST',
                url: '/tec_doc/get_models',
                data: {v, m, favorite},
                success: function (resp) {
                    if (resp != '[]') {
                        $('#favorite').html('Актуальные')
                        const html = '<option value="0">Модель</option>' + mark_list(resp); //marklist resp true
                        $('#tecdoc_models').html(html);  //добавляем модели в селекторе
                        $('#tecdoc_modific').val('0');
                        $('#tecdoc_modific').find('option').not(':first').remove();
                        <?php if(!isset($modifications)) { ?>
                        setButtons(favorite, false)
                        $('#cat_maint').removeClass('uk-column-1-4');//.addClass('uk-column-1-2');
                        $('#cat_maint').html(model_list(resp));   // рисуем список моделей в контейнере
                        $('#cat_maint > ul').addClass('col-md-12');
                        <?php } ?>
                    } else {
                        $('#tecdoc_models').find('option').not(':first').remove();
                        const markname = $('#tecdoc_marks').find('option:selected').text();
                        $('#cat_maint').removeClass('uk-column-1-4');
                        $('#cat_maint').html(`<h4><b>${markname}</b> не имеет моделей <p>Выберите другую марку автомобиля</p></h4>`);
                    }
                }
            });
        }
    });

    $('#tecdoc_models').on('change', function () {
        const v = 1; //легковые авто
        const model = $(this).find('option:selected').val();
        if (model == 0) {
            $('#tecdoc_modific').find('option').not(':first').remove();
        } else {
            $.ajax({
                method: 'POST',
                url: '/tec_doc/get_modifics',
                data: {v, model},
                success: function (resp) {
                    if( resp != '[]') {
                        const html = '<option value="0">Модификация</option>' + selector_modif(resp); //marklist resp true
                        $('#tecdoc_modific').html(html); //добавляем модифик в селекторе
                        <?php if(!isset($modifications)) { ?>
                        $('#cat_maint').html(modif_list(resp));  // рисуем список модификаций в контейнере
                        $('#all_marks').removeClass('uk-display-block').hide()
                        $('#favorite').removeClass('uk-display-block').hide()
                        <?php } ?>
                    }  else {
                        $('#all_marks').removeClass('uk-display-block').hide()
                        $('#favorite').removeClass('uk-display-block').hide()
                        $('#tecdoc_models').val(model);      //- устанавливаем селектор модель
                        $('#tecdoc_modific').find('option').not(':first').remove();
                        const markname = $('#tecdoc_marks').find('option:selected').text();
                        const modelname = $('#tecdoc_models').find('option:selected').text();
                        if ($('.brends').text().trim() == '') {
                            $('.brends').html(`<h4><b style="text-transform: uppercase">${markname} ${modelname}</b>&nbsp;не имеет модификаций <p>Выберите другую модель автомобиля</p></h4>`);
                        } else {
                            $('#cat_maint').removeClass('uk-column-1-4');
                            $('#cat_maint').html(`<h4><b style="text-transform: uppercase">${markname} ${modelname}</b>&nbsp;не имеет модификаций <p>Выберите другую модель автомобиля</p></h4>`);
                        }
                    }

                }
            });
        };
    })

    $('#tecdoc_modific').on('change', function () {
        const mark = $('#tecdoc_marks option:selected').val();
        const model = $('#tecdoc_models  option:selected').val();
        const mdf = $(this).find('option:selected').val();
        window.location.href = `/tec_doc/modification/${mark}/${model}/${mdf}`
    });

    //Дерево запчастей
    function buildTree(mdf, id, name) {
        const ui = {
            $categories: $('#categories'),
            $title_goods: $('#title_goods'),
        };
        $('#tree').jstree({
            core: {
                data: {
                    url: '/tec_doc/categories',
                    dataType: 'json',
                    data: {mdf},
                    success: function (data) {
                        if (mdf != 0) {
                            $.each(data, function (i, val) {
                                if ('child' in val) {
                                    if (!val.child) {
                                        id = val.id
                                        name = val.text
                                        return false;
                                    }
                                } else
                                    return false;
                            })
                            ui.$title_goods.html(`Товары из категории "${name}"`);
                            getGoods(id, mdf)
                        }
                    }
                },
                strings : {
                    'Loading ...' : 'Пожалуйста подождите ...'
                }
            }
        }).bind("select_node.jstree", function (e, data) {
            $('#tree').jstree("toggle_node", data.node);
            const arr = data.instance.get_node(data.selected[0]).children;
            if(arr.length) {
                $('#tree').jstree()._open_to(this.id)
            } else {
                if (mdf != 0) {
                    getGoods(data.node.id, mdf)
                    ui.$title_goods.html(`Товары из категории "${data.node.text}"`);
                } else {
                    $('#goods').html('<h3 style="color:red; text-align:center;">Выберите модификацию автомобиля</h3>');
                    $('html, body').animate({scrollTop: $('#goods').offset().top - 40}, 300);
                }
            }
        }).on('loaded.jstree', function (e, data) {
            if (mdf != 0)
                $('#tree').jstree()._open_to(id)
        });
    }

    //Вывод товаров из дерева на странице
    function getGoods(id, mdf, page=1) {
        $.ajax({
            method: 'POST',
            url: '/tec_doc/get_goods',
            dataType: 'json',
            data: {id, mdf, page},
            beforeSend: function () {
                $('#goods_list').html('');
                $('#pagination2').html('');
                $('#preloader').css('display', 'flex');
                $('html, body').animate({scrollTop: $('#goods').offset().top - 10}, 300);
            },
        }).done(
            function (json) {
                $('#table_goods').css("display", "flex");
                let items_goods = '';
                $.each(json.articles, function (i, val) {
                    const price = (val.price) ? `<p class="cs-BYN">${val.price.toFixed(2)}</p>` : '';
                    const specification = get_specifications(val.ARTICLE_CRITERIA);
                    const oem_numbers = get_oemNums(val.OEM_NUMBERS);
                    const img = (val.image) ? '/' + val.image : '/static/image/asset/no-image.png';
                    const img_click = (val.image) ?' tecdoc_image':'';
                    items_goods += `<div class="row item-goods">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 item-image">
                        <img alt="no image"  class="thumbnail${img_click}"  data-src="${img}" src="${img}">
                            <div class="item-part-numbers">
                                <button  onclick="showPopup(${val.ART_ID})" class="oem-nums-btn">OEM номера</button>
                                <button  class="oem-nums-btn" data-toggle="modal" data-target="#myModals" onclick="getVehicleIds(${val.ART_ID})">ПРИМЕНИМОСТЬ</button>
                                <div class="popover fade right in" role="tooltip" id="popover${val.ART_ID}">
                                    <div class="arrow" style="top: 18px;"></div>
                                    <h4 class="popover-title">ОЕМ НОМЕРА <i id="close" class="fa fa-times fa-lg text-danger pull-right pointer" onclick="hidePopup()"></i></h4>
                                    <div class="popover-content">
                                        <ul class="list-group list-group-flush">
                                            ${oem_numbers}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 item-description">
                            <h4>${val.ART_PRODUCT_NAME}</h4>
                            <p>Бренд: <b>${val.ART_SUP_BRAND}</b> &nbsp;<span class="manufact brand_info" style="font-size:13px" data-toggle="modal" data-target="#info-modal" data-brand="${val.ART_SUP_BRAND}">(О производителе)</span></p>
                            <p class="article">Артикул: <b>${val.ART_ARTICLE_NR}</b></p>

                            <p>${specification}</p>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 item-price">${price}<a href="${val.url}" target="_blank" class="go_to_price">Цены</a></div>
                        </div>`;
                })
                $('#preloader').css('display', 'none');
                $('#goods_list').html(items_goods);
                const countGoods = json.count
                paginate(id, mdf, countGoods, page)
            }
        )
    }
    //спецификации
    function get_specifications(specifics) {
        let html = '';
        if(specifics != null && specifics != undefined) {
            obj = {};
            const KeyVal = specifics.split(";");
            for (let i in KeyVal) {
                KeyVal[i] = KeyVal[i].split(":");
                obj[KeyVal[i][0]]=KeyVal[i][1];
            }
            $.each(obj, function (i, val) {
                html += (val != null && val != undefined) ? `<p class="specifics d-flex"><span>${i} :</span> <span>${val}</span></p>` :  "";
            })
            return html;
        } else {
            return html = "";
        }
    }
    //оем номера
    function get_oemNums(oemNumb) {
        let html = '';
        if(oemNumb != null && oemNumb != undefined) {
            oem = {};
            const KeyVal = oemNumb.split(";");
            for (let i in KeyVal) {
                KeyVal[i] = KeyVal[i].split(":");
                oem[KeyVal[i][0]]=KeyVal[i][1];
            }
            $.each(oem, function (i, val) {
                const article = encodeURI(val.trim().replace(/[^a-zA-Zа-яА-Я0-9% ]/g, ''));
                html += `<li class="oem-number"><a target="_blank" href="/parts/search/${article}/${i.trim()}">${i} : ${val}</a></li>`;
            })
            return html;
        } else {
            return html = "";
        }
    }

    //постраничная навигация
    function paginate(id, mdf, count, page) {
        const products = (Math.ceil(count / 10) >= 1000) ? 10000 : count;
        let pageNumsBottom = 10;
        if (window.matchMedia('(max-width: 521px)').matches) {
            pageNumsBottom = 5;
        }
        if (count > pageNumsBottom) {
            const pagination = new tui.Pagination('pagination2', {
                totalItems: products,
                itemsPerPage: 10,
                visiblePages: pageNumsBottom,
                page: page,
                centerAlign: true
            });
            pagination.on('afterMove', function (eventData) {
                getGoods(id, mdf, eventData.page)
            });
        } else {
            $('#pagination2').html('')
        }
    }

    //сброс фильтров
    $('#reset_filters').on('click', function () {
        check_clean();
    });
    function check_clean() {
        if (typeof(clean_filter) != 'function') {
            window.location.href = '/tec_doc/';
        } else {
            clean_filter();
        }
    }

    //ОЕМ НОМЕРА
    function showPopup(OEM) {
        const oem = $('#popover'+OEM);
        oem.show();
    }
    function hidePopup() {
        const oem = $('.popover');
        oem.hide();
    }
    function template() {
        alert(' ФУНКЦИОНАЛ КНОПОК В РАЗРАБОТКЕ !')
    }

    //Применимость
    //убираем прокрутку страницы с модалкой + обработчик модального окна
    function getScrollBarWidth() {
        const scrollBarWidth = window.innerWidth - document.body.offsetWidth;
        $('body').css('right', scrollBarWidth - 8)
    }
    const showDialog = () => {
        hidePopup()
        //фиксируем текущее положение скрола на странице
        document.documentElement.style.setProperty('--scroll-y', `${window.scrollY}px`);
        $('#myModals').fadeIn("fast")
        document.getElementById('myModals').classList.add('ShoW')
        const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
        const body = document.body;
        body.style.position = 'fixed';
        body.style.width = '100%';
        body.style.height = 'auto';
        body.style.top = `-${scrollY}`;
    };
    const closeDialog = () => {
        $('#myModals').fadeOut("fast");
        $('#myModals').removeClass('ShoW');
        $('.modal-backdrop').remove();
        const body = document.body;
        const scrollY = body.style.top;
        body.style.position = '';
        body.style.top = '';
        body.style.width = '';
        body.style.height = '';
        body.style.right = 'unset';
        window.scrollTo(0, parseInt(scrollY || '0') * -1);
    }

    $(document).click(function (event) {
        if ($(event.target).is('#myModals')) {
            closeDialog()
        }
    });
    function getVehicleIds(art_id) {
        getScrollBarWidth()
        // Когда модальное окно открыто, фиксируем элемент body
        showDialog();

        //очищаем все перед отрисовкой новой таблицы
        $('.empty_message').html('')
        $('#dataTables-example_filter > #linked_marks').remove();
        $('#dataTables-example').DataTable().clear().draw();
        $('#dataTables-example_wrapper').hide();
        $('#dataTables-example tbody').find('tr').remove();

        $('.modal-body-table').attr('data-partId', art_id);

        initTable(art_id);
    }
    function initTable(art_id){
        $('#dataTables-example').off();
        $('#dataTables-example_info').remove();
        const table = $('#dataTables-example').DataTable({
            destroy: true,
            info: false,
            bInfo: false,
            responsive: true,
            autoWidth: false,
            scrollY: true,
            scrollX: true,
            fixedColumns: false,
            language: {
                "paginate": {
                    "next":       "Вперед",
                    "previous":   "Назад"
                },
                "lengthMenu":     "Показать _MENU_",
                "loadingRecords": "Загрузка данных...",
                "emptyTable":     "Для данной автозапчасти не найдено автомобилей",
                "zeroRecords":    "Не найдено",
                "search":         "Поиск:",
            },
            dom: '<"modal-search"f>rt<"bottom"lp><"clear">',
            ordering:  true,
            ajax: {
                url: '/tec_doc/getLinkedVehicles',
                data:{art_id},
                type: 'POST',
                dataSrc: '',
            },
            columns: [
                {
                    data:'mark'
                },
                {
                    data:'model'
                },
                {
                    render: function (data, type, row, meta) {
                        const power = (row.PCS_POWER_PS) ? ' (' + ~~row.PCS_POWER_PS + ' HP)' : ''
                        return `<div class="modif_name">` + String(row.modif) + ' ' + power + `</div>`
                    }
                },
                {
                    render: function (data, type, row, meta) {
                        const to = (row.to) ? row.to : 'н.в.';
                        return row.from + ' - ' + to;
                    }
                }
            ],
            drawCallback: function() {
                const pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            },
            initComplete: function (data, type, row, meta){
                this.api().column(0).every(function () {
                    const column = this;
                    const selector = $('#linked_marks > select')
                        .on('change', function () {
                            const vals = $('option:selected', this).map(function (index, element) {
                                return $.fn.dataTable.util.escapeRegex($(element).val());
                            }).toArray().join('|');
                            column
                                .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                                .draw();
                        });
                    column.data().unique().sort().each(function (d, j) {
                        selector.append('<option  value="' + d + '">' + d + '</option>')
                    })
                    const firstSelector = selector.find('option:first');
                    const vals = firstSelector.map(function (index, element) {
                        return $.fn.dataTable.util.escapeRegex($(element).val());
                    }).toArray().join('|');
                    column
                        .search(vals.length > 0 ? '^(' + vals + ')$' : '', true, false)
                        .draw();
                })
                table.on( 'click', 'tr', function (data, type, row, meta) {
                    const rowData = table.row( this ).data();
                    location.href = '/tec_doc/modification/'+rowData.mark_id+'/'+rowData.model_id+'/'+rowData.modif_id+'';
                });
            }
        });
        const selector = `<label id="linked_marks">Выберите марку : <select></select></label>`;
        $('#dataTables-example_filter').prepend(selector);
    }

    //добавить в гараж
    $('body').on('click','#add_garage',function (e) {
        <?php if (!$this->session->userdata('client_id')) { ?>
        const alert_message = `<a href="/account/register" style="text-decoration: underline"
               onclick="event.preventDefault(); tec_doc_back(1, this.href)">
                Зарегистрируйтесь
            </a> или <a href="/account/login" style="text-decoration: underline"
                        onclick="event.preventDefault(); tec_doc_back(1, this.href)">
            войдите</a>, чтобы иметь возможность добавить транспортное средство в гараж`;
        if ($(this).hasClass('.alert-dismissable')) {
            $('.alert-dismissable').addClass('alert-danger');
            $('.alert-danger').html(alert_message);
        } else {
            $('.notif-login').html(`<div class="alert alert-dismissable alert-danger">${alert_message}</div>`)
        }
        <?php }  else { ?>
        $.ajax({
            method: 'POST',
            url: '/tec_doc/ajax_add_garage',
            success: function (html) {
                if (html == true) {
                    if ($(this).hasClass('.alert-dismissable')) {
                        $('.alert-dismissable').addClass('alert-success');
                        $('.alert-danger').html(alert_message);
                    } else {
                        $('.notif-login').html(`<div class="alert alert-dismissable alert-success">Автомобиль добавлен в гараж</div>`)
                    }
                    window.location.href = "/account/garage" //ПЕРЕХОД НА ГАРАЖ ПОСЛЕ ДОБАВЛЕНИЯ
                } else {
                    $('.notif-login').html(`<div class="alert alert-dismissable alert-danger">Такой автомобиль уже есть в вашем гараже.</div>`)
                }
            }
        });
        <?php } ?>
    });
    //переход в гараж
    function goToGarage() {
        <?php if ($this->client->isLogged()) { ?>
        window.location.href="/account/garage"
        <?php } else { ?>
        const alert_message = `Чтобы войти в гараж - <a href="/account/register" style="text-decoration: underline"
               onclick="event.preventDefault(); tec_doc_back(2, this.href)">
                Зарегистрируйтесь
            </a> или <a href="/account/login"  style="text-decoration: underline"
                        onclick="event.preventDefault(); tec_doc_back(2, this.href)">
            Войдите</a>`;
        if ($(this).hasClass('.alert-dismissable')) {
            $('.alert-dismissable').addClass('alert-danger');
            $('.alert-danger').html(alert_message);
        } else {
            $('.notif-login').html(`<div class="alert alert-dismissable alert-danger">${alert_message}</div>`)
        }
        <?php } ?>
    }
    //возврат на страницу модификации после авторизации/логина
    function tec_doc_back(garage, link) {
        $.ajax({
            method: 'POST',
            data: {garage},
            url: '/tec_doc/ajax_set_back_url',
            success: function (html) {
                document.location.href = link;
            }
        });
    }
</script>

