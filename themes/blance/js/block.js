var el = wp.element.createElement;

wp.blocks.registerBlockType('shaiful-gutenberg/header-banner', {
	title: 'Banner Header',		// Block name visible to user
	icon: ' dashicons-format-image',	// Toolbar icon can be either using WP Dashicons or custom SVG
	category: 'common',	// Under which category the block would appear
	attributes: {			// The data this block will be storing
		
		mediaUrl: {
			type: 'string',
			default: ''
		},
		content: { type: 'array', source: 'children', selector: 'h1' }		/// Notice box content in p tag
	},
	edit: function(props) {
		// How our block renders in the editor in edit mode
	
	   function updateImage( event ) {
	      props.setAttributes( { mediaUrl: event.target.value } );
	   }
	   
	   function updateContent( newdata ) {
	      props.setAttributes( { content: newdata } );
	   }

	  

		return el( 'div', 
			{ 
				className: 'notice-box notice-' 
			},
			el(
				'input', 
				{
					type: 'text', 
					placeholder: 'Enter Background here...',
					value: props.attributes.mediaUrl,
					onChange: updateImage,
					style: { width: '100%' }
				}
			) 
			,
			el(
				wp.editor.RichText,
            {
               tagName: 'h1',
               onChange: updateContent,
               value: props.attributes.content,
               placeholder: 'Enter description here...'
            }
         )

		);	// End return

	},	// End edit()
	save: function(props) {
		// How our block renders on the frontend
		
		return el( 'h1', 
			{ 
				className: ''
			},
			el( wp.editor.RichText.Content, {
         
            value: props.attributes.content
         })
			
		);	// End return
		
	}	// End save()
});


var elcomfo = wp.element.createElement;

wp.blocks.registerBlockType('shaiful-gutenberg/feature-card', {
	title: 'Feature card',		// Block name visible to user
	icon: ' dashicons-format-image',	// Toolbar icon can be either using WP Dashicons or custom SVG
	category: 'common',	// Under which category the block would appear
	attributes: {			// The data this block will be storing
		
		mediaUrl: {
			type: 'string',
			default: ''
		},
		content: { type: 'array', source: 'children', selector: 'p' },		/// Notice box content in p tag
		desc: { type: 'array', source: 'children', selector: 'p' }		/// Notice box content in p tag
	},
	edit: function(props) {
		// How our block renders in the editor in edit mode
	
	   function updateImage( event ) {
	      props.setAttributes( { mediaUrl: event.target.value } );
	   }
	   
	   function updateContent( newdata ) {
	      props.setAttributes( { content: newdata } );
	   }
	    function updateDesc( data ) {
	      props.setAttributes( { desc: data } );
	   }
	  

		return elcomfo( 'div', 
			{ 
				className: 'notice-box notice-' 
			},
			elcomfo(
				'input', 
				{
					type: 'text', 
					placeholder: 'Enter Background here...',
					value: props.attributes.mediaUrl,
					onChange: updateImage,
					style: { width: '100%' }
				}
			) 
			,
			elcomfo(
				wp.editor.RichText,
            {
               tagName: 'p',
               onChange: updateContent,
               value: props.attributes.content,
               placeholder: 'Enter Title here...'
            }
			),
			elcomfo(
				wp.editor.RichText,
            {
               tagName: 'p',
               onChange: updateDesc,
               value: props.attributes.desc,
               placeholder: 'Enter description here...'
            }
			)

		);	// End return

	},	// End edit()
	save: function(props) {
		// How our block renders on the frontend
		
		return elcomfo( 'div', 
			{ 
				className: 'notice-box notice-'
			},
			elcomfo( wp.editor.RichText.Content, {
				tagName: 'p',
				value: props.attributes.content
			 }),
			elcomfo( wp.editor.RichText.Content, {
				tagName: 'p',
				value: props.attributes.desc
			 })
			
		);	// End return
		
	}	// End save()
});