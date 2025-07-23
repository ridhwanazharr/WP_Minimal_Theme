( function( blocks, element ) {
    const { registerBlockType } = blocks;
    const { createElement: el } = element;

    registerBlockType( 'custiom-wp-theme/contact-info', {
        edit: () => el('p', {}, 'Hello from the editor!'),
        save: () => el('p', {}, 'Hello from the frontend!')
    });
} )( window.wp.blocks, window.wp.element );