import _ from 'lodash';

function init() {
  console.log("Conor, your JS is scripting");

  /* this is the observer at the bottom of the scroll */
  const loadMoreObs = document.getElementsByClassName("load-more-observer");
  /* Intersection Observer options */

  const obsOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 1.0
  };

  /* only load on page with observer */
  if (!loadMoreObs.length) {
    console.log("noload");
    return;
  }


  console.log("load");

  /* call Intersection api - to listen - and fire callback */
  const observer = new IntersectionObserver(
    (entries) => {
      intersectionObserverCallback( entries );
    },
    obsOptions
  );
  observer.observe(loadMoreObs[0]);
    //working with loadMoreObs[0] becasue there should only be one on the template. if there's more we'll have to foreach the observe, etc.

  function intersectionObserverCallback( entries ) {
      if (entries[0].isIntersecting) {
        console.log('how bout now')
        handleLoadMorePosts();

      }
      //

  }


}



export { init as default };
