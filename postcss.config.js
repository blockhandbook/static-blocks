const autoprefixer = require( 'autoprefixer' );

module.exports = ( { file } ) => {
	return {
		plugins: [
			autoprefixer
		],
	};
};
