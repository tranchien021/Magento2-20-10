define([
    'uiComponent',
    'ko',
    'jquery',
    'slick'
], function (Component,ko, $) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();
        },
        numberTax:ko.observable('MST: 0349521656 Do Sở kế hoạch Đầu tư TP.HCM cấp ngày 26/10/2023'),
        address:ko.observable('Địa chỉ: T5-B03.07 & T5-B03.09, Lầu 3 Masteri Thảo Điền 160 Xa Lộ Hà Nội, Phường Thảo Điền, T.P Thủ Đức, T.P Hồ Chí Minh, Việt Nam'),
        imageArray: ko.observableArray([
            'https://chientran.cmmage.app/static/version1698635981/frontend/Magento/CoffeMug/vi_VN/Magento_Theme/images/Slider.png',
            'https://chientran.cmmage.app/static/version1698635981/frontend/Magento/CoffeMug/vi_VN/Magento_Theme/images/Slider.png',
            'https://chientran.cmmage.app/static/version1698635981/frontend/Magento/CoffeMug/vi_VN/Magento_Theme/images/Slider.png'
        ]),
        imageSlider: function(){
            setTimeout(function(){
                $('.carousel-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    arrows: true,
                    isFinite:true,
                });
            })
        }
    });
});