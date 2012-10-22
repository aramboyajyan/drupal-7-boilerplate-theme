
/**
 * @file
 * Common theme JS
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
(function ($) {
  Drupal.behaviors.UltimaTheme = {
    attach: function (context, settings) {

      // Open all external links in new window.
      $("a[href*='http://']:not([href*='" + location.hostname.replace("www.", "") + "'])").each(function() {
        $(this).attr("target", "_blank");
      });

      // Messages close button
      $('.messages .close', context).click(function() {
        $(this).parent('.messages').remove();
        // Remove wrapper if there are no other messages on the screen.
        if (!$('.messages').length) {
          $('#messages-wrap').remove();
        }
      });

      // Sample click action.
      $('#header', context).click(function () {
        console.log('Logged from common.js in the starter theme.');
      });

    }
  };
})(jQuery);
