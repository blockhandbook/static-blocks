/**
 * External Dependencies
 */

/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n';
import { RichText } from '@wordpress/block-editor';

/**
 * Internal Dependencies
 */

const Save = ( props ) => {
	const {
		attributes: {
			// put attribute key names here to use them
		},
	} = props;

	/* IMPORTANT - Wrapper classes get added to the outermost wrapper element.  If you use Fragment as wrapper then the wrapper classes don't get added to the block when saving! */
	return(
		<div>
			<p>{ __( 'This is a static starter block.  This block is great for getting up and running fast.  Throw whatever html markup you want in here to start building something cool.  Edit this file in src/blocks/static-block/edit.js.', 'static-blocks' ) }</p>
		</div>
	);
};

export default Save;
