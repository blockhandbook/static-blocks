/**
 * External Dependencies
 */
import classnames from 'classnames';

/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n';

/**
 * Internal Dependencies
 */
import Controls from './controls';

const Edit = ( props ) => {
	const {
		attributes,
		className,
		setAttributes,
		attributes: {
			// put attribute key names here to use them
		},
	} = props;

	return (
		<>
			<Controls
				className={ className }
				attributes={ attributes }
				setAttributes={ setAttributes }
			/>
			<div className={ className }>
				<p>{ __( 'This is a static starter block.  This block is great for getting up and running fast.  Throw whatever html markup you want in here to start building something cool.  Edit this file in src/blocks/static-block/edit.js.', 'static-blocks' ) }</p>
			</div>
		</>
	);
};

export default Edit;
