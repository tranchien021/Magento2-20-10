define([
    'uiComponent',
    'ko',
    'jquery',
    'mage/translate',
    'slick',
], function (Component,ko, $, $t) {
    'use strict';
    return Component.extend({
        initialize: function () {
            this._super();    
        },
        product_list:ko.observableArray(ko.toJS([
            {
                "product_image": "https://chientran.cmmage.app/static/version1698823200/frontend/Magento/HomePage/fr_FR/Magento_Theme/images/deal.png",
                "product_name":  $t('B5 Neogence 50 Skin Repairing and Regenerating Lotion'),
                "old_price": "799.000đ",
                "new_price": "355.000đ"
            },
            {
                "product_image": "https://chientran.cmmage.app/static/version1698823200/frontend/Magento/HomePage/fr_FR/Magento_Theme/images/deal.png",
                "product_name":  $t('B5 Neogence 50 Skin Repairing and Regenerating Lotion'),
                "old_price": "799.000đ",
                "new_price": "355.000đ"
            },
            {
                "product_image": "https://chientran.cmmage.app/static/version1698823200/frontend/Magento/HomePage/fr_FR/Magento_Theme/images/deal.png",
                "product_name":  $t('B5 Neogence 50 Skin Repairing and Regenerating Lotion'),
                "old_price": "799.000đ",
                "new_price": "355.000đ"
            },
            {
                "product_image": "https://chientran.cmmage.app/static/version1698823200/frontend/Magento/HomePage/fr_FR/Magento_Theme/images/deal.png",
                "product_name":  $t('B5 Neogence 50 Skin Repairing and Regenerating Lotion'),
                "old_price": "799.000đ",
                "new_price": "355.000đ"
            },
            {
                "product_image": "https://chientran.cmmage.app/static/version1698823200/frontend/Magento/HomePage/fr_FR/Magento_Theme/images/deal.png",
                "product_name":  $t('B5 Neogence 50 Skin Repairing and Regenerating Lotion'),
                "old_price": "799.000đ",
                "new_price": "355.000đ"
            },
            {
                "product_image": "https://chientran.cmmage.app/static/version1698823200/frontend/Magento/HomePage/fr_FR/Magento_Theme/images/deal.png",
                "product_name":  $t('B5 Neogence 50 Skin Repairing and Regenerating Lotion'),
                "old_price": "799.000đ",
                "new_price": "355.000đ"
            },
            
        ])),
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
        },
        dealSlider: function(){
            setTimeout(function(){
                $('.carousel-deal-of-day').slick({
                    slidesToShow: 5,
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