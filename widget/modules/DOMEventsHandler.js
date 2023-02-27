define(['jquery', './renderer.js', './requests_sender.js'], function($, Renderer, ReqSender) {
    return new function ()
    {
        self = this

        self.initHandle = function (widget)
        {
            self.btnClicks.leadProducts(widget)
        }

        self.btnClicks = {
            leadProducts: function(widget) {
                $(document).on('click', '.emfy_lead_products_btn', () => {
                    ReqSender.requestLeadProducts()
                        .done(data => Renderer.renderProductsInModal(widget, data))
                })
            }
        }
    }
})