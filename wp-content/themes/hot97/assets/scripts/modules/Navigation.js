const $ = window.jQuery;

const s = {
  topLevels: $('.menu-item-has-children'),
}

function init() {
  if (s.topLevels.length > 0) {
    bindEvents();
  }
}

function bindEvents() {
  s.topLevels.on("focusin focusout", function() {toggleMenu($(this))});
}

function toggleMenu( $el ) {
  if ( $el.attr('aria-expanded') === "true" ) {
    $el.attr('aria-expanded', 'false');
  } else {
    $el.attr('aria-expanded', 'true');
  }
}

export { init as default }
