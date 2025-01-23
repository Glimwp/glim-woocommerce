import Icon from '../shared/Icon';

const {
	i18n: { __ },
	element: { useRef, useEffect }
} = wp;

export default ({ average = 0.0, verified = 0, verifiedBadge }) => {
	const verifiedRef = useRef();

	// Update once and maintain it.
	useEffect(() => {
		verifiedRef.current = verified;
	}, [verified]);

	return (
		<div className="woocommerce-Reviews__summary-stats">
			<div className="woocommerce-Reviews__summary-stats__1">
				<Icon icon="recommend" style={{ marginRight: 15 }} />
				<span className="has-black-color"><strong>{parseInt(((average / 5) * 100)) + '%'}</strong></span>
				<div className="has-small-font-size has-cyan-bluish-gray-color">{__('of the clients recommend the product', 'glim-woocommerce')}</div>
			</div>
			{verifiedBadge && <>
				<div className="my-spacer has-border" />
				<div className="woocommerce-Reviews__summary-stats__2">
					<Icon icon="verified" style={{ marginRight: 15 }} />
					<span className="has-black-color"><strong>{verifiedRef.current ?? verified}</strong>&nbsp;&nbsp;</span>
					<div className="has-small-font-size has-cyan-bluish-gray-color">{__('of the reviews are verified purchases', 'glim-woocommerce')}</div>
				</div>
			</>}
		</div>
	);
};