import Flickity from 'flickity';
import matchHeight from 'jquery-match-height';
import FancyBox from './modules/FancyBox.js';
import LoadMorescroll from './modules/LoadMoreScroll';
import MobileMenuDrawer from './modules/MobileMenuDrawer';
import OpenSearch from './modules/OpenSearch';

let $ = window.jQuery;

document.addEventListener('DOMContentLoaded', function() {
  FancyBox();
  LoadMorescroll();
  MobileMenuDrawer();
  OpenSearch();

  let DJCarousels = document.querySelectorAll('.js-dj-carousel');
  for ( let i=0, len = DJCarousels.length; i < len; i++ ) {
    let carousel = DJCarousels[i];
    new Flickity( carousel, {
      freeScroll: true,
      contain: true,
      groupCells: true,
      pageDots: false,
      cellAlign: 'left',
      arrowShape: {
        x0: 10,
        x1: 60, y1: 50,
        x2: 65, y2: 45,
        x3: 20
      },
    });
  }

  let featuredCarousels = document.querySelectorAll('.js-featured-carousel');
  for ( let i=0, len = featuredCarousels.length; i < len; i++ ) {
    let carousel = featuredCarousels[i];
    new Flickity( carousel, {
      freeScroll: true,
      contain: true,
      groupCells: true,
      pageDots: false,
      cellAlign: 'left',
      arrowShape: {
        x0: 10,
        x1: 60, y1: 50,
        x2: 65, y2: 45,
        x3: 20
      },
    });
  }

  $('.js-featured-carousel-slide').matchHeight();

});
