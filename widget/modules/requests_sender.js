define(['jquery'], function ($) {
    return new function ()
    {
        this.requestLeadProducts = function()
        {
            const url = 'https://shdbd-site.ru/emfy_test/get_lead_products.php'
            return this.sendRequest(url, {
                lead_id: AMOCRM.data.current_card.id
            })
        }

        this.sendRequest = function (url, data)
        {
            return $.ajax({
                method: 'POST',
                url: url,
                data: data
            })
        }
    }
})