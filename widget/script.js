define([
        'jquery',
        './modules/renderer.js',
        './modules/DOMEventsHandler.js'],
    function ($, Renderer, EventsHandler) {
        return function ()
        {
            const widget = this
            this.callbacks = {
                settings: function () {},
                init: function () {
                    $('head').append($(`<link type="text/css" rel="stylesheet" href="${widget.get_settings().path}/styles/styles.css">`))
                    return true
                },
                bind_actions: function () {
                    EventsHandler.initHandle()
                    return true
                },
                render: function () {
                    Renderer.renderLeadProductsButton(widget)
                    return true
                },
                destroy: function () {
                    return true
                },
                onSave: function () {
                    return true
                }
            }
            return this
        }
    })