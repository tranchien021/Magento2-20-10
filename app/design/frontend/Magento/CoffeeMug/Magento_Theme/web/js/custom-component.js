define([
    'uiComponent',
    'ko',
    'jquery',
], function (Component,ko, $) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();

        },
        numberTax:ko.observable('MST: 0349521656 Do Sở kế hoạch Đầu tư TP.HCM cấp ngày 26/10/2023'),
        address:ko.observable('Địa chỉ: T5-B03.07 & T5-B03.09, Lầu 3 Masteri Thảo Điền 160 Xa Lộ Hà Nội, Phường Thảo Điền, T.P Thủ Đức, T.P Hồ Chí Minh, Việt Nam')
    });
});