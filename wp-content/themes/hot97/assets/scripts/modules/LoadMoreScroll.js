import { debounce } from "lodash/debounce";

function init() {
  /* this is the observer at the bottom of the scroll */
  const loadMoreObs = document.getElementsByClassName("load-more-observer");
  const postContainer = document.querySelector("ul.posts");
  let pagednumber = 0;

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
  const observer = new IntersectionObserver(entries => {
    intersectionObserverCallback(entries);
  }, obsOptions);
  observer.observe(loadMoreObs[0]);
  //working with loadMoreObs[0] becasue there should only be one on the template. if there's more we'll have to foreach the observe, etc.

  /* callback checks if on screen - if so -> handles posts */
  const intersectionObserverCallback = entries => {
    if (entries[0].isIntersecting) {
      handleLoadMorePosts();
    }
  };


  const handleLoadMorePosts = () => {
    pagednumber += 1;
    let query = "/post-feed/" + pagednumber;
    fetch(query)
      .then(response => response.text())
      .then(data => addPosts(data));
  };

  const addPosts = posts => {
    postContainer.append(posts);
    console.log(postContainer);
    console.log(posts);
  };
}

export { init as default };
