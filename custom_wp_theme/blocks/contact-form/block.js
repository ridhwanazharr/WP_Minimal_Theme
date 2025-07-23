( function( blocks, element, blockEditor ) {
	const { registerBlockType } = blocks;
	const { createElement: el } = element;
	const { InspectorControls, RichText } = blockEditor;
	const { PanelBody, TextControl } = wp.components;

	registerBlockType( 'custiom-wp-theme/contact-form', {
		attributes: {
			apiKey: { type: 'string', default: '' },
			caption: { type: 'string', default: '' },
            title: { type: 'string', default: '' },
		},
		edit: ( props ) => {
			const { attributes, setAttributes } = props;
			const { apiKey, caption, title } = attributes;

			return el( 'div', {},
				[
					// Sidebar settings panel
					el( InspectorControls, {},
						el( PanelBody, { title: 'Settings' },
							el( TextControl, {
								label: 'API Key',
								value: apiKey,
								onChange: ( value ) => setAttributes( { apiKey: value } )
							} ),
                            el( TextControl, {
								label: 'Title',
								value: title,
								onChange: ( value ) => setAttributes( { title: value } )
							} ),
							el( TextControl, {
								label: 'Caption',
								value: caption,
								onChange: ( value ) => setAttributes( { caption: value } )
							} )
						)
					),

					// Preview in editor
					el( 'div', { className: 'contact-form-block' },
						el( 'h3', {}, title ),
						el( 'p', {}, caption )
					)
				]
			);
		},
		save: () => null // Frontend rendered by PHP
	});
} )( window.wp.blocks, window.wp.element, window.wp.blockEditor );