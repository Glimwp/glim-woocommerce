/**
 * WordPress dependencies
 */
const {
    i18n: { __ },
} = wp;

const VARIATION_NAME = 'woocommerce/product-query/viewed-products';

const viewedProductsVariation = {
    block: 'core/query',
    attributes: {
        name: VARIATION_NAME,
        title: __('Recently viewed products', 'glim-woocommerce'),
        icon: 'products',
        description: __('Displays a list of recently viewed products for logged in users.', 'glim-woocommerce'),
        isActive: ['namespace'],
        attributes: {
            namespace: VARIATION_NAME,
            query: {
                postType: 'product',
                perPage: 4,
            }
        },
        allowedControls: [],
        innerBlocks: [
            ['core/heading', {
                level: 2,
                className: 'fw-500',
                content: __('Recently viewed products', 'glim-woocommerce')
            }],
            [
                'core/post-template',
                {
                    className: 'wp-block-query__products',
                    __woocommerceNamespace: 'woocommerce/product-query/product-template',
                    layout: {
                        type: 'grid',
                        columns: 4
                    },
                    lock: {
                        move: true,
                        remove: true
                    }
                },
                [
                    ['core/pattern', {
                        slug: 'glimfse/el-product-loop'
                    }],
                ],
            ]
        ]
    }
};

export { viewedProductsVariation };