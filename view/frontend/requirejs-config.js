var config = {
    map: {
        '*': {
            risecommerceGtmDatalayer: 'Risecommerce_GoogleTagManager/js/datalayer'
        }
    },
    shim: {
        'Risecommerce_GoogleTagManager/js/datalayer': ['Magento_Customer/js/customer-data']
    }
};
