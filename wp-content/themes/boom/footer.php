

<?php

qode_startit_get_footer();

global $qode_startit_toolbar;
if(isset($qode_startit_toolbar)) include("toolbar.php");


?>


<div id="realmodal-7669" class="realmodal">
    <div class="realmodal-window">
      <div data-realmodal="close"></div>
      <div class="realmodal-header"></div>
      <div class="realmodal-content">
         <?php echo do_shortcode('[contact-form-7 id="6683" title="Обратный звонок"]'); ?>
     </div>
     <div class="realmodal-footer"></div>
 </div>
</div>



<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter47479984 = new Ya.Metrika2({
                    id:47479984,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    ecommerce:"dataLayer"
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/tag.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks2");





</script>
<noscript><div><img src="https://mc.yandex.ru/watch/47479984" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->