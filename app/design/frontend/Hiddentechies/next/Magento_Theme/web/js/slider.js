define([
    'uiComponent',
    'ko',
   ], function(Component, ko) {
    'use strict';
        return Component.extend({
            initialize: function() {
                this._super();
            },

            viewModel: ko.observable("PHP"),
        })
    }
);
   