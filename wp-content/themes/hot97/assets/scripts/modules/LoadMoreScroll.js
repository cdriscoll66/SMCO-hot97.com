function init() {
  /* this is the observer at the bottom of the scroll */
  const loadMoreWatch = document.getElementsByClassName("js-load-more");

  /* only load on page with observer */
  if (!loadMoreWatch.length) {
    return;
  }

  const loadMoreObs = document.getElementsByClassName("load-more-observer");
  const loadMoreBtn = document.getElementById("load-more-button");

  const poststyle = loadMoreWatch[0].getAttribute("data-style");
  const postcat = loadMoreWatch[0].getAttribute("data-cat");
  const postid = loadMoreWatch[0].getAttribute("data-id");
  const postquery = loadMoreWatch[0].getAttribute("data-query");

  const postContainer = document.querySelector(".js-post-collect");
  let pagednumber = 0;

  const handleLoadMorePosts = context => {
    pagednumber += 1;

    let query = "";

    switch (context) {
      case "archive":
        query = "/home-load-more/?paged=" + pagednumber;
        break;
      case "singlepost":
        query = "/single-post-load-more/" + postid + "/?paged=" + pagednumber;
        break;
        case "contentcat":
          query = "/content-category-load-more/" + postcat + "/?paged=" + pagednumber;
          break;
          case "category":
          query = "/category-feed-load-more/" + postcat + "/?paged=" + pagednumber;
          break;
        case "searchresults":
        query = "/search-results-load-more/" + postquery + "/?paged=" + pagednumber;
        break;
      default:
        query = "/home-load-more/?paged=" + pagednumber;
    }

    fetch(query)
      .then(response => response.text())
      .then(data => addPosts(data));
  };

  const addPosts = posts => {
    postContainer.insertAdjacentHTML("beforeend", posts);
  };

  if (loadMoreObs.length >= 1) {
    /* Intersection Observer options */
    const obsOptions = {
      root: null,
      rootMargin: "100px",
      threshold: 0
    };

    /* call Intersection api - to listen - and fire callback */
    const observer = new IntersectionObserver(entries => {
      intersectionObserverCallback(entries);
    }, obsOptions);
    observer.observe(loadMoreObs[0]);
    //working with loadMoreObs[0] becasue there should only be one on the template. if there's more we'll have to foreach the observe, etc.

    /* callback checks if on screen - if so -> handles posts */
    const intersectionObserverCallback = entries => {
      if (entries[0].isIntersecting) {
        handleLoadMorePosts(poststyle);
      }
    };
  }

  /* Button handle options */

loadMoreBtn.addEventListener("click", () => { handleLoadMorePosts(poststyle) });

}

export { init as default };
