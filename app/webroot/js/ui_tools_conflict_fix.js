/*
 * Per http://flowplayer.org/tools/forum/20/26331,
 *   tabs from jQuery UI and jQuery Tools conflict and cause breakage.
 * In our case progressbar() from UI was not working.
 * This should fix it.
 */

$.fn.uitabs = $.fn.tabs;
delete $.fn.tabs;