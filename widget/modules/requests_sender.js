define(['jquery'], function ($) {
    return new function ()
    {
        this.requestLeadProducts = function()
        {
            //const url = 'http://localhost/get_lead_products.php'
            const url = 'https://webhook.site/84f5ff9b-3b2c-4815-a63f-600749438833'
            return this.sendRequest(url, {
                lead_id: AMOCRM.data.current_card.id
            })
        }

        this.sendRequest = function (url, data)
        {
            console.log(JSON.stringify(data))
            return $.ajax({
                method: 'POST',
                url: url,
                data: JSON.stringify(data),
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8',
                    'Accept': 'application/json'
                }
            })
        }
    }
})