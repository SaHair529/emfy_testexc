define([
        'jquery',
        './twig_helper.js',
        'lib/components/base/modal'],
    function($, TwigHelper, Modal)
    {

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

            this.renderProductsInModal = function(widget)
            {
                widget.render({
                    href: '/templates/products.twig',
                    base_path: widget.params.path,
                    allowInlineIncludes: true,
                    promised: true
                })
                    .then(template => {
                        template = template.render({})

                        modal = new Modal({
                            class_name: 'emfytest_modal',
                            init: function ($modal_body) {
                                const $this = $(this)
                                $modal_body
                                    .trigger('modal:loaded')
                                    .html(template)
                                    .trigger('modal:centrify')
                            },
                            destroy: function() {

                            }
                        })
                    })
            }
        }

    })