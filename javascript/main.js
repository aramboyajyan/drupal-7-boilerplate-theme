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

      // Display a message when certain forms are submitted.
      // 
      // 
      var $forms   = $('#REPLACEME');
      var $popup   = $('#popup');
      var $popupBg = $('#popup-bg');
      $forms.submit(function() {
        // Add some content in the popup.
        $popup.html('<h2>Please wait</h2><p>Your request is being processed.</p>');
        // Disable all buttons.
        $forms.find('input[type="submit"]').attr('disabled', true);
        $forms.find('input:focus').blur();
        // Show the popup and move it up.
        $popup.show().css('margin-top', - parseInt($popup.outerHeight() / 2));
        $popupBg.height($(window).height()).show();
      });

    }
  };
})(jQuery);
