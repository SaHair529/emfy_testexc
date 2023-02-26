define(['./twig_helper.js'], function(TwigHelper) {
    return new function ()
    {
        /**
         * Отрисовка кнопки отображения товаров сделки в правой панели карточки сделки
         */
        this.renderLeadProductsButton = function (widget)
        {
            widget.render_template({
                body: '',
                block_class_name: 'emfytest-block',
                caption: {
                    class_name: 'emfytest_caption'
                },
                render: TwigHelper.getLeadProductsButton(),
            }, {})
        }
    }})