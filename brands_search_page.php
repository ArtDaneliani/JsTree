<div class="sapam-catalog">
    <div class="filter-brand">
        <div class="uk-grid uk-grid-small uk-flex uk-flex-middle block-search">
            <div class="uk-width-1-2">
                <div class="uk-width-auto">
                    <i class="fa fa-search"></i>
                </div>
                <input type="text" id="filter" class="form-control" placeholder="Начните вводить название"/>
            </div>
            <div class="all-marks-btn" style="padding: 0px;">
                <button class="tecdoc_cat uk-display-block top_cat_tab_btn pull-right favorite current" id="favorite" style="width: 100%;padding: 0px 10px;">Популярные</i></button>
            </div>
            <div class="all-marks-btn" style="padding: 0px;">
                <button class="tecdoc_cat uk-display-block top_cat_tab_btn pull-right all-marks" id="all_marks" style="width: 100%;padding: 0px 10px;">Все</i></button>
            </div>
        </div>
    </div>

    <div class="uk-column-1-4 center-block" id="cat_maint">

    <?php
        $letter = '';
        $brands = $marks ?? [];
        $c = count($brands);
        $cc = 0;
        foreach ($brands as $brand) {
        ++$cc;
        if (mb_substr($brand->name, 0, 1) !== $letter) {
        if ($letter != '') {
        ?>
        <li style="line-height: 60%">&nbsp;</li>
        </ul>
    </div>
</div><?php
}
$letter = mb_substr($brand->name, 0, 1); ?>
<div class="list-row sapam" data-letter="<?= mb_strtolower($letter); ?>">
    <div class="list-header">
        <?= $letter; ?>
    </div>
    <div class="list-body">
        <ul class="letter-block">
            <?php
            }
            ?>
            <li class="list-item brand-item" data-brand="<?= mb_strtolower($brand->name); ?>"
                value="<?= $brand->id ?>"><?= $brand->name ?></li>

            <?php
            if ($cc == $c) { ?>

        </ul>
    </div>
</div>
<?php }
} ?>
</div>

</div>

<script>
    //BRANDS LIST
    //марка
    $('#cat_maint').on('click','.brand-item', function () {
        const v = 1; //легковые автомобили
        const m = $(this).attr('value');
        const favorite = 1;
        const markname = $(this).data('brand');
        $.ajax({
            method: 'POST',
            url: '/tec_doc/get_models',
            data: {v, m},
            success: function (resp) {
                if(resp != '[]') {
                    $('#favorite').html('Актуальные')
                    setButtons(favorite, false)
                    $('#cat_maint').removeClass('uk-column-1-4');//.addClass('uk-column-1-2');
                    const html = '<option value="0">Модель</option>' + mark_list(resp); //marklist resp true
                    $('#tecdoc_marks').val(m);      //- устанавливаем селектор марку
                    $('#cat_maint').html(model_list(resp)); // рисуем список моделей в контейнере
                    $('#tecdoc_models').html(html);
                    $('#cat_maint > ul').addClass('col-md-12');
                } else {
                    $('#tecdoc_models').find('option').not(':first').remove();
                    $('#tecdoc_modific').find('option').not(':first').remove();
                    $('#cat_maint').removeClass('uk-column-1-4');
                    $('#cat_maint').html(`<h4><b style="text-transform: uppercase">${markname}</b> не имеет моделей. Выберите другую марку автомобиля.</h4>`);
                }
            }
        });
    });
    //модель
    $('#cat_maint').on('click','.mod-item', function () {
        const v = 1; //легковые автомобили
        const model = $(this).attr('value');
        $.ajax({
            method: 'POST',
            url: '/tec_doc/get_modifics',
            data: {v, model},
            success: function (resp) {
                if (resp != '[]') {
                    const html = '<option value="0">Модификация</option>' + selector_modif(resp);  //marklist resp true
                    $('#tecdoc_models').val(model);      //- устанавливаем селектор модель
                    $('#cat_maint').html(modif_list(resp));   // рисуем список модификаций в контейнере
                    $('#tecdoc_modific').html(html);
                    $('#cat_maint > ul').addClass('col-md-12');
                    $('#all_marks').removeClass('uk-display-block').hide()
                    $('#favorite').removeClass('uk-display-block').hide()
                } else {
                    $('#all_marks').removeClass('uk-display-block').hide()
                    $('#favorite').removeClass('uk-display-block').hide()
                    $('#tecdoc_models').val(model);      //- устанавливаем селектор модель
                    $('#tecdoc_modific').find('option').not(':first').remove();
                    const markname = $('#tecdoc_marks').find('option:selected').text();
                    const modelname = $('#tecdoc_models').find('option:selected').text();
                    $('#cat_maint').removeClass('uk-column-1-4');
                    $('#cat_maint').html(`<h4><b style="text-transform: uppercase">${markname} ${modelname}</b>&nbsp;не имеет модификаций <p>Выберите другую модель автомобиля</p></h4>`);
                }
            }
        });
    });

    //модификация
    $('#cat_maint').on('click','.modif-item', function () {
        const m = $('#tecdoc_marks').val();
        const model = $('#tecdoc_models').val();
        const mdf = $(this).attr('value');
        window.location.href = `/tec_doc/modification/${m}/${model}/${mdf}`
    });

    //БЛОК КНОПОК  --==--  популярные/все марки
    //все марки
    $('#all_marks').on('click',
        async () => {
            await change_favorite(2)
        })
    //популярные
    $('#favorite').on('click',
        async () => {
            await change_favorite(1)
        })

    function liToOption () {
        if ($('#all_marks').attr('data-marks') === 'false') {
            $('#tecdoc_models').find('option').not(':first').remove()
            let html = ''
            $('.mod-item').each(function () {
                html += `<option value="${$(this).val()}">${$(this).text()}</option>`
            })
            $('#tecdoc_models').append(html) //================добавляем опции в селект моделей
        } else {
            $('#tecdoc_marks').find('option').not(':first').remove()
            let html = ''
            $('.brand-item').each(function () {
                html += `<option value="${$(this).val()}">${$(this).text()}</option>`
            })
            $('#tecdoc_marks').append(html)
        }
    }

    //состояние кнопок
    function setButtons(favorite=1, flag) {
        $('#favorite').show();
        $('#all_marks').show();
        if (favorite == 2) {
            //текущее состояние кнопки
            $('#favorite').attr('data-marks',flag)
            $('#all_marks').attr('data-marks',flag)
            $('#favorite').removeClass('current')
            $('#all_marks').addClass('current')
        } else {
            //текущее состояние кнопки
            $('#favorite').attr("data-marks",flag)
            $('#all_marks').attr("data-marks",flag)
            $('#all_marks').removeClass('current')
            $('#favorite').addClass('current')
        }
    }

    //сброс фильтров
    function clean_filter(favorite=1)  {
        const v = 1;
        $('#tecdoc_marks').val('0');
        $('#tecdoc_models').find('option').not(':first').remove();
        $('#tecdoc_modific').find('option').not(':first').remove();
        $.ajax({
            method: 'POST',
            url: '/tec_doc/get_marks',
            data: {v, favorite},
            success: function (resp) {
                $('#brands').html(resp);
                //текущее состояние кнопки
                setButtons(favorite, true);
                return new Promise(liToOption);
            }
        });
    }

    //кнопки популярные/все
    function change_favorite(favorite=1) {
        if ($('#all_marks').attr('data-marks') === 'true') {
            $('#tecdoc_marks').val('0');
            $('#tecdoc_models').find('option').not(':first').remove();
            $('#tecdoc_modific').find('option').not(':first').remove();
            $.ajax({
                method: 'POST',
                url: '/tec_doc/get_marks',
                data: {favorite},
                success: function (html) {
                    $('#brands').html(html);
                    if (favorite == 2) {
                        //текущее состояние кнопки
                        setButtons(favorite, true);
                        return new Promise(liToOption)
                    } else {
                        //текущее состояние кнопки
                        setButtons(favorite, true);
                        liToOption()
                        // return false
                    }
                }
            });
        } else {
            const m = $('#tecdoc_marks').val();
            $.ajax({
                method: 'POST',
                url: '/tec_doc/get_models',
                data: {m,favorite},
                success: function (resp) {
                    $('#cat_maint').html(model_list(resp));
                    if (favorite == 2) {
                        setButtons(favorite, false);
                        return new Promise(liToOption)
                    } else {
                        setButtons(favorite, false);
                        liToOption()
                        // return false
                    }
                }
            });
        }
    }

    //поиск по буквам
    $('input#filter').on('keyup', function () {
        const brand = $(this).val().toLowerCase();
        $('.sapam-catalog li[data-brand]').show();
        $('.sapam-catalog .list-row[data-letter]').show();
        if (brand.length) {
            const letter = brand.charAt(0);
            $('.sapam-catalog li:not([data-brand^="' + brand + '"])').hide();
            $('.sapam-catalog .list-row:not([data-letter="' + letter + '"])').hide();
        }
    });
</script>