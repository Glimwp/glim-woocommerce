const {
	i18n: { __ },
	hooks: { applyFilters },
	element: { useEffect, useState },
} = wp;

const RATING_SUGGESTIONS = applyFilters('glimfse.woocommerce.reviews.rating.suggestions', {
	1: [__('Not recommended', 'glim-woocommerce'), __('Very weak', 'glim-woocommerce'), __('Not happy', 'glim-woocommerce')],
	2: [__('Weak', 'glim-woocommerce'), __('I don\'t like it', 'glim-woocommerce'), __('Disappointing', 'glim-woocommerce')],
	3: [__('Decent', 'glim-woocommerce'), __('Acceptable', 'glim-woocommerce'), __('Ok', 'glim-woocommerce')],
	4: [__('Happy', 'glim-woocommerce'), __('I like it', 'glim-woocommerce'), __('Is worth it', 'glim-woocommerce'), __('Good', 'glim-woocommerce')],
	5: [__('Excelent', 'glim-woocommerce'), __('Very satisfied', 'glim-woocommerce'), __('Recommended', 'glim-woocommerce'), __('Cool', 'glim-woocommerce')],
});

export default ({ rating: star = 5, setTitle }) => {

	const [current, setCurrent] = useState(RATING_SUGGESTIONS[star]);

	useEffect(() => setCurrent(RATING_SUGGESTIONS[star]), [star]);

	const onClick = (e) => {
		const value = e.currentTarget.textContent;
		setTitle(value);
		document.forms['glim-woo-addreview'].elements['title'].value = value;
	};

	const Button = ({ key, label }) => {
		const props = { type: 'button', className: 'wp-element-button has-accent-background-color has-black-color', key, onClick };
		return (<button {...props}>{label}</button>);
	};

	return (
		<div className="woocommerce-Reviews__suggestions" style={{ display: 'flex', flexWrap: 'wrap', alignItems: 'center', gap: '.5rem' }}>
			{current.map((x, y) => <Button key={y} label={x} />)}
		</div>
	);
};