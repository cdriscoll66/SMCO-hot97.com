function init() {
  /* this is the observer at the bottom of the scroll */
  const loadMoreObs = document.getElementsByClassName("load-more-observer");
  const postid = loadMoreObs[0].getAttribute('data-id');
  const postContainer = document.querySelector(".posts");
  let pagednumber = 0;

  /* Intersection Observer options */

  const obsOptions = {
    root: null,
    rootMargin: "500px",
    threshold: 1.0
  };

  /* only load on page with observer */
  if (!loadMoreObs.length) {
    return;
  }


  /* call Intersection api - to listen - and fire callback */
  const observer = new IntersectionObserver(entries => {
    intersectionObserverCallback(entries);
  }, obsOptions);
  observer.observe(loadMoreObs[0]);
  //working with loadMoreObs[0] becasue there should only be one on the template. if there's more we'll have to foreach the observe, etc.

  /* callback checks if on screen - if so -> handles posts */
  const intersectionObserverCallback = entries => {
    if (entries[0].isIntersecting) {
      handleLoadMorePosts('singlepost');
    }
  };


  const handleLoadMorePosts = (context) => {
    pagednumber += 1;

    let query = '';

    switch(context) {
      case 'archive':
      query = "/home-load-more/?paged=" + pagednumber;
      break;
      case 'singlepost':
      query = "single-post-load-more/" + postid + "/?paged=" + pagednumber;
      break;
      default:
      query = "/home-load-more/?paged=" + pagednumber;
    }

    fetch(query)
      .then(response => response.text())
      .then(data => addPosts(data));
  };

  const addPosts = posts => {
    postContainer.insertAdjacentHTML( 'beforeend', posts );
  };
}

export { init as default };
