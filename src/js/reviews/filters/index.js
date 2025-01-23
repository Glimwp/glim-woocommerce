import { useForm } from 'react-hook-form';
import ResultsNote from './ResultsNote';
import Icon from '../shared/Icon';

const {
	i18n: { __, _n, sprintf },
	hooks: { applyFilters }
} = wp;

const SORTING_OPTIONS = applyFilters('glimfse.woocommerce.reviews.sorting', {
	'': __('Recent', 'glim-woocommerce'),
	'rating': __('Rating', 'glim-woocommerce'),
	'likes': __('Popularity', 'glim-woocommerce'),
});

export default ({ queryArgs, setQueryArgs, loading, meta: { totalResults }, options, breakpoint }) => {
	const {
		product: {
			ID: product_id,
			counts,
		},
		actions = [],
		verified,
	} = options;

	let amount = {
		5: 0,
		4: 0,
		3: 0,
		2: 0,
		1: 0,
	};

	amount = { ...amount, ...counts };

	const getLabel = (v) => sprintf(_n('%s star reviews', '%s stars reviews', v, 'glim-woocommerce'), v);

	const { handleSubmit, register, reset: resetForm } = useForm({ mode: 'onSubmit' });

	const onSubmit = (values) => {
		const result = {};

		for (const [k, v] of Object.entries(values)) {
			if (v !== '' && v !== false) result[k] = v;
		}

		setQueryArgs({ product_id, ...result });
	};

	const onChange = () => setTimeout(handleSubmit(onSubmit), 20);

	const onReset = () => {
		resetForm();

		return onChange();
	};

	const style = {};

	if (loading) {
		style.pointerEvents = 'none';
		style.opacity = .65;
	}

	const includedIn = (x) => ['rating', 'verified', 'search'].includes(x);
	const hasFilters = Object.keys(queryArgs).map(includedIn).filter(Boolean).pop();

	if (actions?.like === false) {
		delete SORTING_OPTIONS.likes;
	}

	return (
		<form className="woocommerce-Reviews__filters" onSubmit={handleSubmit(onSubmit)} name="glim-woo-filters" style={style}>
			<div className="has-border my-spacer" />
			<div className="grid">
				<div className="span-12 span-sm-6 span-lg-4">
					<div className="input-group input-group-sm">
						<label class="input-group-text" for="filter-orderby">{__('Sort:', 'glim-woocommerce')}</label>
						<select className="form-select" id="filter-orderby" {...register('orderby', { onChange })}>
							{Object.keys(SORTING_OPTIONS).map(k => <option value={k}>{SORTING_OPTIONS[k]}</option>)}
						</select>
					</div>
				</div>
				<div className="span-12 span-sm-6 span-lg-4">
					<div className="input-group input-group-sm">
						<label class="input-group-text" for="filter-stars">{__('Filter:', 'glim-woocommerce')}</label>
						<select className="form-select" id="filter-stars" {...register('rating', { onChange })}>
							<option value="">{__('All reviews', 'glim-woocommerce')}</option>
							{Array(5).fill().reverse().map((_, i) => {
								const value = 5 - i;
								return (<option {...{ disabled: amount[value] === 0, value }}>{getLabel(value)}</option>);
							})}
						</select>
					</div>
				</div>
				<div className="span-12 span-sm-12 span-lg-4" style={{ display: 'flex', alignItems: 'center' }}>
					{verified && <div className="input-group input-group-sm" style={{ width: 'auto', marginRight: 15 }}>
						<input className="hidden" type="checkbox" id="filter-verified" {...register('verified', { onChange })} />
						<label className="wp-element-button has-accent-background-color" for="filter-verified">
							<Icon icon="verified" />
							<span style={{ marginLeft: 10, display: breakpoint === 'mobile' ? 'none' : 'inline-block' }}>{__('Verified owner', 'glim-woocommerce')}</span>
						</label>
					</div>}
					<div className="input-group input-group-sm">
						<input className="form-control" type="search" placeholder={__('Search in reviews', 'glim-woocommerce')}
							{...register('search', {
								onBlur({ target: { value } }) {
									if (value === '' && queryArgs.search !== undefined) {
										delete queryArgs.search;
										setQueryArgs({ ...queryArgs });
									}
								}
							})}
						/>
						<button {...{
							className: 'wp-element-button wp-block-search__button has-accent-background-color',
							style: { lineHeight: 1 },
							type: 'submit',
						}}>
							<span className="screen-reader-text sr-text sr-only">{__('Search in reviews', 'glim-woocommerce')}</span>
							<span className="woocommerce-Reviews__icon woocommerce-Reviews__icon--search" />
						</button>
					</div>
				</div>
			</div>
			<div className="has-border my-spacer" />
			{!loading && hasFilters ? <ResultsNote totalResults={totalResults} onReset={onReset} /> : null}
		</form>
	);
};