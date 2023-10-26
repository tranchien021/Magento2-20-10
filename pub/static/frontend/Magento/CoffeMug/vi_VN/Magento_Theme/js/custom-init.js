
require(['ko', 'Magento_Theme/js/custom-component'], function (ko, customComponent) {
    'use strict';

    ko.applyBindings(customComponent, document.getElementById('content-footer'));
});
