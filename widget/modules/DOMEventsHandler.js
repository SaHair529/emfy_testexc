define(['jquery'], function($) {
    return new function ()
    {
        self = this

        self.initHandle = function ()
        {
            self.btnClicks.leadProducts()
        }

        self.btnClicks = {
            leadProducts: function() {
                $(document).on('click', '.emfy_lead_products_btn', () => {
                    alert('click')
                })
            }
        }
    }
})