define(['twigjs'], function(Twig) {
    return new function ()
    {
        /**
         * Генерация шаблона кнопки отображения товаров
         */
        this.getLeadProductsButton = function() {
            return Twig({ref: '/tmpl/controls/button.twig'}).render({
                text: 'Товары сделки',
                class_name: 'emfy_lead_products_btn',
            })
        }
    }})