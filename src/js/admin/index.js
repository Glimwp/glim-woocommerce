/**
 * @package: 	GlimFSE WooCommerce Extension
 * @author: 	Bican Marian Valeriu
 * @license:	https://www.glimfse.com/
 * @version:	1.0.0
 */

const {
    i18n: {
        __,
        sprintf
    },
    hooks: {
        addFilter
    },
    components: {
        Placeholder,
        DropdownMenu,
        RangeControl,
        ToggleControl,
        Card,
        CardHeader,
        CardBody,
        Dashicon,
        Spinner,
        Button,
    },
    element: {
        useState,
    }
} = wp;

addFilter('glimfse.admin.tabs.plugins', 'glimfse/woocommerce/admin/panel', optionsPanel);
function optionsPanel(panels) {
    return [...panels, {
        name: 'glim-woocommerce',
        title: __('WooCommerce', 'glim-woocommerce'),
        render: (props) => <Options {...props} />
    }];
}

const Options = (props) => {
    const { settings, saveSettings, isRequesting, createNotice } = props;

    if (isRequesting || !settings) {
        return <Placeholder {...{
            icon: <Spinner />,
            label: __('Loading', 'glim-woocommerce'),
            instructions: __('Please wait, loading settings...', 'glim-woocommerce')
        }} />;
    }

    const [loading, setLoading] = useState(null);
    const apiOptions = (({ woocommerce }) => (woocommerce))(settings);
    const [formData, setFormData] = useState(apiOptions);

    const handleNotice = (message = '') => {
        setLoading(false);

        if (!message) {
            message = __('Settings saved.', 'glim-woocommerce')
        }

        return createNotice('success', message);
    };

    return (
        <>
            <div class="grid" style={{
                '--glim--columns': 2
            }}>
                <div class="g-col-1">
                    <Card className="border shadow-none">
                        <CardHeader>
                            <h5 className="text-uppercase fw-medium m-0">{__('Optimization', 'glim-woocommerce')}</h5>
                        </CardHeader>
                        <CardBody>
                            <ToggleControl
                                label={<>
                                    <span style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
                                        <span>{__('Remove legacy CSS?', 'glim-woocommerce')}</span>
                                        <DropdownMenu
                                            label={__('More Information', 'glim-woocommerce')}
                                            icon={<Dashicon icon="info" style={{ color: 'var(--glim--header--color)' }} />}
                                            toggleProps={{
                                                style: {
                                                    height: 'initial',
                                                    minWidth: 'initial',
                                                    padding: 0
                                                }
                                            }}
                                            popoverProps={{
                                                focusOnMount: 'container',
                                                position: 'bottom',
                                                noArrow: false,
                                            }}
                                        >
                                            {() => (
                                                <p style={{ minWidth: 250, margin: 0 }}>
                                                    {__('These styles primarily cater to legacy themes, whereas WooCommerce blocks now have their own styles.', 'glim-woocommerce')}
                                                </p>
                                            )}
                                        </DropdownMenu>
                                    </span>
                                </>}
                                help={sprintf(__('Default WooCommerce style will be %s.', 'glim-woocommerce'), !formData?.remove_style ? __('loaded', 'glim-woocommerce') : __('removed', 'glim-woocommerce'))}
                                checked={formData?.remove_style}
                                onChange={value => setFormData({ ...formData, remove_style: value })}
                            />
                            <ToggleControl
                                label={__('Replace Select2 CSS?', 'glim-woocommerce')}
                                help={__('Replace Select2 stylesheet with an optimized version for our theme.', 'glim-woocommerce')}
                                checked={formData?.replace_select2_style}
                                onChange={value => setFormData({ ...formData, replace_select2_style: value })}
                            />
                        </CardBody>
                    </Card>
                </div>
                <div class="g-col-1">
                    <Card className="border shadow-none">
                        <CardHeader>
                            <h5 className="text-uppercase fw-medium m-0">{__('Functionality', 'glim-woocommerce')}</h5>
                        </CardHeader>
                        <CardBody>
                            <ToggleControl
                                label={<>
                                    <span style={{ display: 'flex', alignItems: 'center', justifyContent: 'space-between' }}>
                                        <span>{__('Enable product price extras?', 'glim-woocommerce')}</span>
                                        <DropdownMenu
                                            label={__('More Information', 'glim-woocommerce')}
                                            icon={<Dashicon icon="info" style={{ color: 'var(--glim--header--color)' }} />}
                                            toggleProps={{
                                                style: {
                                                    height: 'initial',
                                                    minWidth: 'initial',
                                                    padding: 0
                                                }
                                            }}
                                            popoverProps={{
                                                focusOnMount: 'container',
                                                position: 'bottom',
                                                noArrow: false,
                                            }}
                                        >
                                            {() => (
                                                <p style={{ minWidth: 250, margin: 0 }}>
                                                    {__('A new field has been introduced in the product administration page for both normal and variation products.', 'glim-woocommerce')}
                                                </p>
                                            )}
                                        </DropdownMenu>
                                    </span>
                                </>}
                                help={__('Enhance the Product Price block by integrating a tooltip that showcases the recommended price set by the producer.', 'glim-woocommerce')}
                                checked={formData?.product_price_extra}
                                onChange={value => setFormData({ ...formData, product_price_extra: value })}
                            />
                            <ToggleControl
                                label={__('Enable product rating extras?', 'glim-woocommerce')}
                                help={__('Enhance the Product Rating block(s) by incorporating enhanced and visually captivating rating information.', 'glim-woocommerce')}
                                checked={formData?.product_rating_extra}
                                onChange={value => setFormData({ ...formData, product_rating_extra: value })}
                            />
                            <ToggleControl
                                label={__('Enable customer account extras?', 'glim-woocommerce')}
                                help={__('Enhance the Customer Account block by adding a dropdown with WooCommerce\'s account page endpoints.', 'glim-woocommerce')}
                                checked={formData?.customer_account_extra}
                                onChange={value => setFormData({ ...formData, customer_account_extra: value })}
                            />
                        </CardBody>
                    </Card>
                </div>
            </div>
            <hr style={{ margin: '20px 0' }} />
            <Button
                className="button"
                isPrimary
                isLarge
                icon={loading && <Spinner />}
                onClick={() => {
                    setLoading(true);
                    saveSettings({ woocommerce: formData }, () => handleNotice());
                }}
                {...{ disabled: loading }}
            >
                {loading ? '' : __('Save', 'glimfse')}
            </Button>
        </>
    );
};