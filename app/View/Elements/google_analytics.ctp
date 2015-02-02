<?php if (Configure::read('GoogleAnalytics.enabled') && !isset($noGoogleAnalytics)): ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo Configure::read('user_config.google_analytics.account_id'); ?>', 'auto');
  ga('send', 'pageview');
</script>
<?php elseif (Configure::read('PiwikAnalytics.enabled') && !isset($noGoogleAnalytics)): ?>
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://<?php echo Configure::read('user_config.piwik_analytics.piwik_server') ?>/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', <?php echo Configure::read('user_config.piwik_analytics.site_id') ?>]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript>
  <p>
    <img src="http://<?php echo Configure::read('user_config.piwik_analytics.piwik_server') ?>/piwik.php?idsite=<?php echo Configure::read('user_config.piwik_analytics.site_id') ?>" style="border:0;" alt="" />
  </p>
</noscript>
<!-- End Piwik Code -->
<?php endif ?>
