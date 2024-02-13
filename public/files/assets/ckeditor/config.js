/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//config.extraPlugins = 'uploadimage,uploadwidget,widget,clipboard,lineutils,dialog,dialogui,notificationaggregator,notification,toolbar,button,filetools';
	   config.filebrowserBrowseUrl = 'http://new.texpeon.com/admin/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
	   config.filebrowserImageBrowseUrl = 'http://new.texpeon.com/admin/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
	   config.filebrowserFlashBrowseUrl = 'http://new.texpeon.com/admin/assets/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
	   config.filebrowserUploadUrl = 'http://new.texpeon.com/admin/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
	   config.filebrowserImageUploadUrl = 'http://new.texpeon.com/admin/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
	   config.filebrowserFlashUploadUrl = 'http://new.texpeon.com/admin/assets/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';
};
