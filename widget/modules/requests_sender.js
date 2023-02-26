define(['jquery'], function ($)
{
    return new function ()
    {
            self = this

        this.requestLeadProducts = function()
        {
            url = 'https://webhook.site/84f5ff9b-3b2c-4815-a63f-600749438833'
            console.log('request')
            return self.sendRequest(url, {
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