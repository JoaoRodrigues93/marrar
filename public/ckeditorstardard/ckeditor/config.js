/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
	//config.remove(p);

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.height = '70px';

	config.autoParagraph = false;

	//config.disallowedContent = '*{style*}';

	config.removeAttribute = 'style';
/*
	config.allowedContent = {
		$1: {
			// Use the ability to specify elements as an object.
			elements: CKEDITOR.dtd,
			attributes: true,
			styles: false,
			classes: false
		}
	};
	config.disallowedContent = 'script';

	// Enabled plugins: image and table.
	config.disallowedContent = 'img{border*,margin*,style*}';
	config.disallowedContent = '*{style*}';


	config.allowedContent = 'img[*]{*}';
	config.disallowedContent = 'img[style*]';

	config.disallowedContent = 'img{margin*,width*,height*,style*}';*/

	/*config.allowedContent = 'h1 h2 h3 p img';
	config.disallowedContent = 'p img[style*] *{font*}';*/

	/*config.allowedContent = {
		$1: {
			// Use the ability to specify elements as an object.
			elements: CKEDITOR.dtd,
			attributes: false,
			script: false,
			classes: false
		}
	};
	config.disallowedContent = 'p; styles; *[on*]';*/

	//config.disallowedContent = 'p';

};
