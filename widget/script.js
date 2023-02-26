define([
        'jquery',
        'twigjs',
        './modules/renderer.js',
        './modules/DOMEventsHandler.js',
        './modules/twig_helper.js'],
    function ($, Twig, Renderer, EventsHandler, TwigHelper) {
        return function ()
        {
            const widget = this
            this.callbacks = {
                settings: function () {},
                init: function () {
                    console.log('init')
                    $('head').append($(`<link type="text/css" rel="stylesheet" href="${widget.get_settings().path}/styles/styles.css">`))
                    return true
                },
                bind_actions: function () {
                    EventsHandler.initHandle(widget)
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