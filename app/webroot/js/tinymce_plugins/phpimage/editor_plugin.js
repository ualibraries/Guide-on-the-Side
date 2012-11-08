/**
 * $Id: editor_plugin_src.js 677 2008-03-07 13:52:41Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright � 2004-2008, Moxiecode Systems AB, All rights reserved.
 */
(function() {
	// Load plugin specific language pack
	tinymce.PluginManager.requireLangPack('phpimage');

	tinymce.create('tinymce.plugins.PhpImagePlugin', {
		init : function(ed, url) {
			// Register commands
			ed.addCommand('mcePhpImage', function() {
				// Internal image object like a flash placeholder
				if (ed.dom.getAttrib(ed.selection.getNode(), 'class').indexOf('mceItem') != -1)
					return;

				ed.windowManager.open({
					file : cakephp.jsroot + 'tinymce_plugins/phpimage/image.php',
					width : 480 + parseInt(ed.getLang('advimage.delta_width', 0)),
					height : 385 + parseInt(ed.getLang('advimage.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : cakephp.jsroot + 'tinymce_plugins/phpimage/'
				});
			});

			// Register buttons
			ed.addButton('phpimage', {
				title : 'advimage.image_desc',
				cmd : 'mcePhpImage',
				image : cakephp.jsroot + 'tinymce_plugins/phpimage/img/image.gif'
			});

			// Add a node change handler, selects the button in the UI when a image is selected
			ed.onNodeChange.add(function(ed, cm, n) {
        cm.setActive('phpimage', n.nodeName === 'IMG' && !(n.className == 'heading'
          || n.className == 'question' || n.className == 'definition' || n.className == 'text-box'));
        cm.setDisabled('phpimage', n.nodeName == 'IMG' && (n.className == 'heading'
          || n.className == 'question' || n.className == 'definition' || n.className == 'text-box'));
      });

      ed.onDblClick.add(function(ed, e) {
        if (e.target.nodeName=='IMG' && !(e.target.className == 'heading'
          || e.target.className == 'question' || e.target.className == 'definition' || e.target.className == 'text-box')) {
          ed.execCommand('mcePhpImage','','');
        }
      });
		},

		getInfo : function() {
			return {
				longname : 'PHP image',
				author : 'James Luckhurst & Mike Hagedon',
				authorurl : '',
				infourl : '',
				version : "1.0-quickhelp-fork"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('phpimage', tinymce.plugins.PhpImagePlugin);
})();