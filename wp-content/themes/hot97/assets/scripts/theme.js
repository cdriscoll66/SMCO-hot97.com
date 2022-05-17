import Flickity from 'flickity';
import FancyBox from './modules/FancyBox.js';
import LoadMorescroll from './modules/LoadMoreScroll';
import MobileMenuDrawer from './modules/MobileMenuDrawer';
import OpenSearch from './modules/OpenSearch';

document.addEventListener('DOMContentLoaded', function() {
  FancyBox();
  LoadMorescroll();
  MobileMenuDrawer();
  OpenSearch();

  let elem = document.querySelector('.js-dj-carousel');
  let flkty = new Flickity( elem, {
    freeScroll: true,
    contain: true,
    pageDots: false,
    cellAlign: 'left',
    arrowShape: {
      x0: 10,
      x1: 60, y1: 50,
      x2: 65, y2: 45,
      x3: 20
    },
  });
});
