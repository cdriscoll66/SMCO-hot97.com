/**
 * Fancybox
 *
 * @link https://fancyapps.com/fancybox/3/docs/#options
 *
 * @author Dylan James Wagner
 * @package Baseline
 * @subpackage Scripts
 * @since 2.0.0
 */
import '@fancyapps/fancybox';

const fancyboxCSS = require('@fancyapps/fancybox/dist/jquery.fancybox.css');

function init() {

  jQuery('\
    a[href$=".jpg"], \
    a[href$=".jpeg"], \
    a[href$=".png"], \
    a[href$=".gif"], \
    a[href*="placehold.it"], \
    a[href*="via.placeholder.com"], \
    a[href*="?attachment_id="] \
  ')
    .addClass('js-fancybox');

  /** Connect gallery images copy captions */
  jQuery('\
    .gallery, \
    .wp-block-gallery \
  ').each(function(index) {
    const $element = jQuery(this);

    /** Classic Editor Gallery */
    $element.find('.gallery-item').each(function() {
      const $element = jQuery(this);
      const caption = $element.find('.wp-caption-text').text().trim();

      /** Connect gallery images copy captions */
      $element.find('a')
        .attr('data-fancybox', 'gallery-' + index)
        .attr('data-caption', caption);
    });

    /** Block Editor Gallery */
    $element.find('.blocks-gallery-item').each(function() {
      const $element = jQuery(this);
      const caption = $element.find('figcaption').text().trim();

      /** Connect gallery images copy captions */
      $element.find('a')
        .attr('data-fancybox', 'block-gallery-' + index)
        .attr('data-caption', caption);
    });
  });

  /**
   * Options
   *
   * @link https://fancyapps.com/fancybox/3/docs/#options
   */
  jQuery('.js-fancybox').fancybox({
    buttons : [
      'slideShow',
      'share',
      'zoom',
      'fullScreen',
      'close'
    ],
    thumbs : {
      autoStart : true
    }
  });
}

export {init as default}
