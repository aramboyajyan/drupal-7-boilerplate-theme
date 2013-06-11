
/**
 * @file
 * Common theme JS.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
(function ($) {
  Drupal.behaviors.PongTheme = {
    attach: function (context, settings) {

      // Open all external links in new window.
      $('a[href*="http://"]:not([href*="' + location.hostname.replace('www.', '') + '"])').each(function() {
        $(this).attr('target', '_blank');
      });

      // Trigger jQuery placeholder plugin to support the "placeholder"
      // attribute in older browsers.
      $('input, textarea').placeholder();

      // Messages close button.
      $('.messages .close', context).click(function() {
        $(this).parent('.messages').remove();
        // Remove wrapper if there are no other messages on the screen.
        if (!$('.messages').length) {
          $('#messages-wrap').remove();
        }
      });

      // Sample click action.
      $('#header', context).click(function () {
        console.log('Logged from common.js in the Pong theme.');
      });

      // Automatically focus first fields on login, forgot pass and register
      // forms as well as the login block.
      if ($('form#user-login').length)     $('form#user-login input[type="text"]').focus();
      if ($('#user-register-form').length) $('#user-register-form input[type="text"]').eq(0).focus();
      if ($('form#user-pass').length)      $('form#user-pass input[type="text"]').focus();
      if ($('#user-login-form').length)    $('#user-login-form input[type="text"]').focus();

    }
  };
})(jQuery);
