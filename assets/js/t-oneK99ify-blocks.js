;( function() {

	wp.hooks.addFilter( 'blocks.registerBlockType', 'onek99ify/marquee', function( atts, name ) {
		if ( 'core/heading' === name ) {
			atts.attributes.wut = {
				attribute: 'marquee',
				type: 'string',
				source: 'attribute',
				selector: 'p',
			}
		}
		return atts;
	} );

	// wp.blocks.registerBlockType( 'core/heading', function( atts ) {
	// 	console.log( atts );
	// 	return atts;
	// } );

	// var el = wp.element.createElement;

	// wp.blocks.registerBlockType( 'onek99ify/marquee', {

	// 	title: wp.i18n.__( 'Marquee (OneK99ify)', 'onekninetynineify' ), // Block title.
	// 	// icon: 'shield',
	// 	category: 'common', // common, formatting, layout widgets, embed.
	// 	keywords: [
	// 		wp.i18n.__( 'OneK99ify', 'onekninetynineify' ),
	// 		wp.i18n.__( 'Marquee', 'onekninetynineify' ),
	// 		wp.i18n.__( 'HTML 4.0', 'onekninetynineify' ),
	// 	],

	// 	className: 'onek99-marquee',

	// 	attributes: {
	// 		content: {
	// 			type: 'array',
	// 			source: 'children',
	// 			selector: 'p',
	// 		}
	// 	},

	// 	edit: function( props ) {
	// 		var content = props.attributes.content;

	// 		function onChangeContent( newContent ) {
	// 			props.setAttributes( { content: newContent } );
	// 		}

	// 		return el( wp.blocks.RichText, {
	// 			tagName: 'div',
	// 			className: props.className,
	// 			onChange: onChangeContent,
	// 			value: content,
	// 			isSelected: props.isSelected,
	// 		} );
	// 	},

	// 	save: function( props ) {

	// 		var content = props.attributes.content;
	// 		return el( 'div', { className: props.className }, el( 'div', {}, content ) );
	// 	}
	// } );

} )();

