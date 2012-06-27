<?php if (Configure::read('GoogleAnalytics.enabled') && !isset($noGoogleAnalytics)): ?>
<script type="text/javascript">
   var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
   document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
   var pageTracker = _gat._getTracker("<?php echo Configure::read('user_config.google_analytics.account_id') ?>");
   pageTracker._setDomainName("<?php echo Configure::read('user_config.google_analytics.domain_name') ?>");
   pageTracker._trackPageview();
</script>
<?php endif ?>