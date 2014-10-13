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

  /**
   * Positions the suggestions popup and starts a search.
   * 
   * This is used for autocomplete suggestions dropdown. If you do not wish to
   * override the width of suggestions popup, feel free to remove this whole
   * block.
   */
  Drupal.jsAC.prototype.populatePopup = function () {
    var $input = $(this.input);
    var position = $input.position();
    // Show popup.
    if (this.popup) {
      $(this.popup).remove();
    }
    this.selected = false;
    this.popup = $('<div id="autocomplete"></div>')[0];
    this.popup.owner = this;
    $(this.popup).css({
      top: parseInt(position.top + this.input.offsetHeight, 10) + 'px',
      left: parseInt(position.left, 10) + 'px',
      // If we want to make the dropdown element as wide as the parent input,
      // INCLUDING the borders, we should use .outerWidth() instead of
      // .innerWidth(). Otherwise, the autosuggestions dropdown will be smaller,
      // and that just looks ugly.
      width: $input.outerWidth() + 'px',
      display: 'none'
    });
    $input.before(this.popup);

    // Do search.
    this.db.owner = this;
    this.db.search(this.input.value);
  };

  /**
   * The code below is necessary to temporarily disable the closing of the
   * autocomplete suggestion popup.
   * 
   * AUTOCOMPLETE OVERRIDE START.
   */

  /**
   * An AutoComplete object.
   */
  Drupal.jsAC = function ($input, db) {
    var ac = this;
    this.input = $input[0];
    this.ariaLive = $('#' + this.input.id + '-autocomplete-aria-live');
    this.db = db;

    $input
      .keydown(function (event) { return ac.onkeydown(this, event); })
      .keyup(function (event) { ac.onkeyup(this, event); })
      // Just this part is different, but because further code adds more methods
      // to the Drupal.jsAC object, which is overridden here, it is necessary to
      // copy the rest of the implementation in order to avoid JS errors.
      // Uncomment the following line, or remove the whole "AUTOCOMPLETE
      // OVERRIDE START" section once done with the development.
      // 
      // Uncomment the following line (and add a semicolon in the line above)
      // when you want to leave the autocomplete box open in order to style it
      // or debug that popup.
      .blur(function () { ac.hidePopup(); ac.db.cancel(); });

  };

    $input
      .keydown(function (event) { return ac.onkeydown(this, event); })
      .keyup(function (event) { ac.onkeyup(this, event); })
      // Just this part is different, but because further code adds more methods
      // to the Drupal.jsAC object, which is overridden here, it is necessary to
      // copy the rest of the implementation in order to avoid JS errors.
      // Uncomment the following line, or remove the whole "AUTOCOMPLETE
      // OVERRIDE START" section once done with the development.
      // 
      // Uncomment the following line (and add a semicolon in the line above)
      // when you want to leave the autocomplete box open in order to style it
      // or debug that popup.
      .blur(function () { ac.hidePopup(); ac.db.cancel(); });

  };

  /**
   * Handler for the "keydown" event.
   */
  Drupal.jsAC.prototype.onkeydown = function (input, e) {
    if (!e) {
      e = window.event;
    }
    switch (e.keyCode) {
      case 40: // down arrow.
        this.selectDown();
        return false;
      case 38: // up arrow.
        this.selectUp();
        return false;
      default: // All other keys.
        return true;
    }
  };

  /**
   * Handler for the "keyup" event.
   */
  Drupal.jsAC.prototype.onkeyup = function (input, e) {
    if (!e) {
      e = window.event;
    }
    switch (e.keyCode) {
      case 16: // Shift.
      case 17: // Ctrl.
      case 18: // Alt.
      case 20: // Caps lock.
      case 33: // Page up.
      case 34: // Page down.
      case 35: // End.
      case 36: // Home.
      case 37: // Left arrow.
      case 38: // Up arrow.
      case 39: // Right arrow.
      case 40: // Down arrow.
        return true;

      case 9:  // Tab.
      case 13: // Enter.
      case 27: // Esc.
        this.hidePopup(e.keyCode);
        return true;

      default: // All other keys.
        if (input.value.length > 0 && !input.readOnly) {
          this.populatePopup();
        }
        else {
          this.hidePopup(e.keyCode);
        }
        return true;
    }
  };

  /**
   * Puts the currently highlighted suggestion into the autocomplete field.
   */
  Drupal.jsAC.prototype.select = function (node) {
    this.input.value = $(node).data('autocompleteValue');
  };

  /**
   * Highlights the next suggestion.
   */
  Drupal.jsAC.prototype.selectDown = function () {
    if (this.selected && this.selected.nextSibling) {
      this.highlight(this.selected.nextSibling);
    }
    else if (this.popup) {
      var lis = $('li', this.popup);
      if (lis.length > 0) {
        this.highlight(lis.get(0));
      }
    }
  };

  /**
   * Highlights the previous suggestion.
   */
  Drupal.jsAC.prototype.selectUp = function () {
    if (this.selected && this.selected.previousSibling) {
      this.highlight(this.selected.previousSibling);
    }
  };

  /**
   * Highlights a suggestion.
   */
  Drupal.jsAC.prototype.highlight = function (node) {
    if (this.selected) {
      $(this.selected).removeClass('selected');
    }
    $(node).addClass('selected');
    this.selected = node;
    $(this.ariaLive).html($(this.selected).html());
  };

  /**
   * Unhighlights a suggestion.
   */
  Drupal.jsAC.prototype.unhighlight = function (node) {
    $(node).removeClass('selected');
    this.selected = false;
    $(this.ariaLive).empty();
  };

  /**
   * Hides the autocomplete suggestions.
   */
  Drupal.jsAC.prototype.hidePopup = function (keycode) {
    // Select item if the right key or mousebutton was pressed.
    if (this.selected && ((keycode && keycode != 46 && keycode != 8 && keycode != 27) || !keycode)) {
      this.input.value = $(this.selected).data('autocompleteValue');
    }
    // Hide popup.
    var popup = this.popup;
    if (popup) {
      this.popup = null;
      $(popup).fadeOut('fast', function () { $(popup).remove(); });
    }
    this.selected = false;
    $(this.ariaLive).empty();
  };

  /**
   * Positions the suggestions popup and starts a search.
   */
  Drupal.jsAC.prototype.populatePopup = function () {
    var $input = $(this.input);
    var position = $input.position();
    // Show popup.
    if (this.popup) {
      $(this.popup).remove();
    }
    this.selected = false;
    this.popup = $('<div id="autocomplete"></div>')[0];
    this.popup.owner = this;
    $(this.popup).css({
      top: parseInt(position.top + this.input.offsetHeight, 10) + 'px',
      left: parseInt(position.left, 10) + 'px',
      width: $input.innerWidth() + 'px',
      display: 'none'
    });
    $input.before(this.popup);

    // Do search.
    this.db.owner = this;
    this.db.search(this.input.value);
  };

  /**
   * Fills the suggestion popup with any matches received.
   */
  Drupal.jsAC.prototype.found = function (matches) {
    // If no value in the textfield, do not show the popup.
    if (!this.input.value.length) {
      return false;
    }

    // Prepare matches.
    var ul = $('<ul></ul>');
    var ac = this;
    for (key in matches) {
      $('<li></li>')
        .html($('<div></div>').html(matches[key]))
        .mousedown(function () { ac.select(this); })
        .mouseover(function () { ac.highlight(this); })
        .mouseout(function () { ac.unhighlight(this); })
        .data('autocompleteValue', key)
        .appendTo(ul);
    }

    // Show popup with matches, if any.
    if (this.popup) {
      if (ul.children().length) {
        $(this.popup).empty().append(ul).show();
        $(this.ariaLive).html(Drupal.t('Autocomplete popup'));
      }
      else {
        $(this.popup).css({ visibility: 'hidden' });
        this.hidePopup();
      }
    }
  };

  Drupal.jsAC.prototype.setStatus = function (status) {
    switch (status) {
      case 'begin':
        $(this.input).addClass('throbbing');
        $(this.ariaLive).html(Drupal.t('Searching for matches...'));
        break;
      case 'cancel':
      case 'error':
      case 'found':
        $(this.input).removeClass('throbbing');
        break;
    }
  };

  // AUTOCOMPLETE OVERRIDE END.

})(jQuery);
