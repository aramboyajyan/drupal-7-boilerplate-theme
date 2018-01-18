/**
 * @file
 * Common theme JS.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */
(function ($) {
  Drupal.behaviors.UltimaTheme = {
    attach: function (context, settings) {

      // Open all external links in new window.
      $('a[href*="http://"]:not([href*="' + location.hostname.replace('www.', '') + '"])').each(function() {
        $(this).attr('target', '_blank');
      });

      // Messages close button.
      $('.messages .close', context).click(function() {
        $(this).parent('.messages').remove();
        // Remove wrapper if there are no other messages on the screen.
        if (!$('.messages').length) {
          $('#messages-wrap').remove();
        }
      });

      // Automatically focus first fields on login, forgot pass and register
      // forms as well as the login block.
      $('body').once(function() {
        if ($('form#user-login').length)     $('form#user-login input[type="text"]').focus();
        if ($('#user-register-form').length) $('#user-register-form input[type="text"]').eq(0).focus();
        if ($('form#user-pass').length)      $('form#user-pass input[type="text"]').focus();
        if ($('#user-login-form').length)    $('#user-login-form input[type="text"]').focus();
      });

      // Popup links. This is handy when certain links need to display just the
      // information, outside of the main theme of the site, for example when
      // printing out the invoices. Just add "popup-link" class to those links,
      // and they will automatically be opened in a new 800x600px window.
      // 
      // If you want to override size, just use "data-popup-width" and
      // "data-popup-height" attributes to change the values.
      var $popupLinks = $('.popup-link');
      var popupLinkDefaultWidth  = 800;
      var popupLinkDefaultHeight = 600;
      $popupLinks.click(function() {
        var $link = $(this);
        // Get width and height of the popup.
        var popupWidth  = ($link.attr('data-popup-width') !== undefined) ? $link.attr('data-popup-width') : popupLinkDefaultWidth;
        var popupHeight = ($link.attr('data-popup-height') !== undefined) ? $link.attr('data-popup-height') : popupLinkDefaultHeight;
        // Create the window.
        var popupWindow = window.open($link.attr('href'), '', 'height=' + popupHeight + ',width=' + popupWidth);
        if (window.focus) {
          popupWindow.focus();
        }
        return false;
      });

      // Let's check if the user has AdBlock enabled.
      $('body').once('adblock', function() {
        if (window.AdBlockNotPresent !== undefined) {
          console.log('You do not have AdBlock enabled.');
        }
        else {
          console.log('You have AdBlock enabled.');
        }
      });

    }
  };

})(jQuery);
