/**
 * editor_plugin_src.js
 *
 * Derived from Moxiecode's example plugin.
 *
 */

(function() {
    tinymce.create('tinymce.plugins.QuickhelpPlugin', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished its initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(ed, url) {
            // the url param seems to not work ... is it because this is an external plugin?
            url = cakephp.jsroot + 'tinymce_plugins/quickhelp/';

            // Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('qhInlineQuiz');
            ed.addCommand('qhQuestion', function() {
                img_placeholder = ed.selection.getContent();
                if (img_placeholder != '') {
                    regex = /questions\/view_image\/(\d+)/;
                    matches = regex.exec(img_placeholder);
                    if (matches != null) {
                        cakephp_action = cakephp.webroot + 'questions/edit/' + matches[1];
                    } else {
                        cakephp_action = cakephp.webroot + 'questions/add';
                    }
                } else {
                    cakephp_action = cakephp.webroot + 'questions/add';
                }
                ed.windowManager.open({
                    file : cakephp_action,
                    width : 800 + parseInt(ed.getLang('quickhelp.delta_width', 0)),
                    height : 620 + parseInt(ed.getLang('quickhelp.delta_height', 0)),
                    inline : 1
                });
            });

            ed.addCommand('qhHeading', function() {
                ed.windowManager.open({
                    // I didn't bother to make a separate edit action like i did with question.
                    //   Headings are simpler.
                    file : cakephp.webroot + 'headings/add',
                    width : 500 + parseInt(ed.getLang('quickhelp.delta_width', 0)),
                    height : 150 + parseInt(ed.getLang('quickhelp.delta_height', 0)),
                    inline : 1
                });
            });

            ed.addCommand('qhDefinition', function() {
                ed.windowManager.open({
                    // I didn't bother to make a separate edit action like i did with question.
                    //   Definitions are simpler.
                    file : cakephp.webroot + 'definitions/add',
                    width : 500 + parseInt(ed.getLang('quickhelp.delta_width', 0)),
                    height : 450 + parseInt(ed.getLang('quickhelp.delta_height', 0)),
                    inline : 1
                });
            });

            ed.addCommand('qhTextBox', function() {
                ed.windowManager.open({
                    // I didn't bother to make a separate edit action like i did with question.
                    //   Definitions are simpler.
                    file : cakephp.webroot + 'text_boxes/add',
                    width : 500 + parseInt(ed.getLang('quickhelp.delta_width', 0)),
                    height : 170 + parseInt(ed.getLang('quickhelp.delta_height', 0)),
                    inline : 1
                });
            });

            ed.addCommand('qhBackreference', function() {
                ed.windowManager.open({
                    // i didn't bother to make a separate edit action like i did with question.
                    //   Definitions are simpler.
                    file : cakephp.webroot + 'backreferences/add',
                    width : 277 + parseInt(ed.getLang('quickhelp.delta_width', 0)),
                    height : 240 + parseInt(ed.getLang('quickhelp.delta_height', 0)),
                    inline : 1
                });
            });

            // Register quickhelp inline quiz button
            ed.addButton('qhBtnQuestion', {
                title : 'Insert question',
                cmd : 'qhQuestion',
                image : url + 'question-button.png'
            });

            ed.addButton('qhBtnHeading', {
                title : 'Insert chapter heading or page break',
                cmd : 'qhHeading',
                image : url + 'chapter-button.png'
            });

            ed.addButton('qhBtnDefinition', {
                title : 'Insert definition box',
                cmd : 'qhDefinition',
                image : url + 'definition-button.png'
            });

            ed.addButton('qhBtnTextBox', {
                title : 'Insert free response box',
                cmd : 'qhTextBox',
                image : url + 'text-box-button.png'
            });

            ed.addButton('qhBtnBackreference', {
                title : 'Jump to page',
                cmd : 'qhBackreference',
                image : url + 'back-reference.png'
            });

            // Add a node change handler, selects the button in the UI when a image is selected
            ed.onNodeChange.add(function(ed, cm, n) {
                cm.setActive('qhBtnQuestion', n.nodeName == 'IMG' && n.className == 'question');
                cm.setDisabled('qhBtnQuestion', n.nodeName == 'IMG' && n.className != 'question');

                cm.setActive('qhBtnHeading', n.nodeName == 'IMG' && n.className == 'heading');
                cm.setDisabled('qhBtnHeading', n.nodeName == 'IMG' && n.className != 'heading');

                cm.setActive('qhBtnDefinition', n.nodeName == 'IMG' && n.className == 'definition');
                cm.setDisabled('qhBtnDefinition', n.nodeName == 'IMG' && n.className != 'definition');

                cm.setActive('qhBtnTextBox', n.nodeName == 'IMG' && n.className == 'text-box');
                cm.setDisabled('qhBtnTextBox', n.nodeName == 'IMG' && n.className != 'text-box');

                cm.setActive('qhBtnBackreference', n.nodeName == 'IMG' && n.className == 'backreference');
                cm.setDisabled('qhBtnBackreference', n.nodeName == 'IMG' && n.className != 'backreference');

                cm.setDisabled('image', n.nodeName == 'IMG' && (n.className == 'heading'
                    || n.className == 'question' || n.className == 'definition' || n.className == 'text-box'));
            });

            ed.onDblClick.add(function(ed, e) {
                if (e.target.nodeName=='IMG' && e.target.className == 'question') {
                    ed.execCommand('qhQuestion','','');
                }
                if (e.target.nodeName=='IMG' && e.target.className == 'heading') {
                    ed.execCommand('qhHeading','','');
                }
                if (e.target.nodeName=='IMG' && e.target.className == 'definition') {
                    ed.execCommand('qhDefinition','','');
                }
                if (e.target.nodeName=='IMG' && e.target.className == 'text-box') {
                    ed.execCommand('qhTextBox','','');
                }
                if (e.target.nodeName=='IMG' && e.target.className == 'backreference') {
                    ed.execCommand('qhBackreference','','');
                }
            });

            ed.onInit.add(
                function(ed, cm) {
                    ed.pasteAsPlainText = true;
                    ed.controlManager.setActive('pastetext', true);
                }
            );
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Quickhelp plugin',
                author : 'Mike Hagedon',
                authorurl : 'http://www.library.arizona.edu',
                infourl : 'nope',
                version : "1.0"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add('quickhelp', tinymce.plugins.QuickhelpPlugin);
})();