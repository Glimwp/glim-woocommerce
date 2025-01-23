/**
 * @package: 	GlimFSE WOO Reviews
 * @author: 	Glimwp
 * @license:	https://www.glimfse.com/
 * @version:	1.0.0
 */
import './../../scss/reviews.scss';

const {
	hooks: { doAction },
	element: { render },
} = wp;

const { container = '#reviews' } = wpBlockWooReviews || {};
import( /* webpackChunkName: "App" */ './App').then(({ App }) => {
	doAction('glimfse.woocommerce.reviews.loaded', wpBlockWooReviews);
	render(<App {...wpBlockWooReviews} />, document.querySelector(container));
});