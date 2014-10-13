
/**
 * @file
 * Autocomplete.js overrides.
 *
 * Important: this is NOT a fully replacement for autocomplete.js file, and
 * features only overrides of two methods:
 *    
 *    - Drupal.jSAC
 *        Optionally removes the .blur() method, so the popup stays open even
 *        when it loses its focus. This is useful if you want to style the popup
 *        and leave it open.
 *    - Drupal.jsAC.prototype.populatePopup
 *        Give the autocomplete popup OUTER width of the parent element, instead
 *        of the inner one. This way the popup will be the same size as the
 *        parent input field.
 *
 * Created by: Topsitemakers
 * http://www.topsitemakers.com/
 */

(function ($) {

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

      // Because further code adds more methods to the Drupal.jsAC object, which
      // is overridden here, it is necessary to copy the rest of the
      // implementation in order to avoid JS errors.
      // 
      // Uncomment the following line (and add a semicolon in the line above)
      // when you want to leave the autocomplete box open in order to style or
      // debug it.
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

      // If we want to make the dropdown element as wide as the parent input,
      // INCLUDING the borders, we should use .outerWidth() instead of
      // .innerWidth().
      width: $input.outerWidth() + 'px',

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

})(jQuery);
