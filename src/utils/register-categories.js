/**
 * External Dependencies
 */

/**
 * WordPress Dependencies
 */
import { setCategories, getCategories } from '@wordpress/blocks';

/**
 * Internal Dependencies
 */
import icons from './icons';

const categories = [
	{
		slug: 'static-blocks',
		title: 'Static Blocks',
		icon: icons.plugin,
	},
	...getCategories().filter(
		( { categorySlug } ) => categorySlug !== 'static-blocks'
	),
];
setCategories( categories );
