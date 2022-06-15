function init() {
  /* this is the observer at the bottom of the scroll */
  const loadMoreWatch = document.getElementsByClassName("js-load-more");

  /* only load on page with observer */
  if (!loadMoreWatch.length) {
    return;
  }

  const loadMoreObs = document.getElementById("load-more-observer");
  const loadMoreBtn = document.getElementById("load-more-button");

  const posturl = loadMoreWatch[0].getAttribute("data-url");


  const postContainer = document.querySelector(".js-post-collect");

  let pagednumber = 0;

  const handleLoadMorePosts = () => {
    pagednumber += 1;

    let query = "/" + posturl + "/?paged" + pagednumber;

    fetch(query)
      .then(response => response.text())
      .then(data => addPosts(data));
  };

  const addPosts = posts => {
    postContainer.insertAdjacentHTML("beforeend", posts);
  };



  if (loadMoreObs) {
    console.log("obs");
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
    observer.observe(loadMoreObs);

    /* callback checks if on screen - if so -> handles posts */
    const intersectionObserverCallback = entries => {
      if (entries[0].isIntersecting) {
        handleLoadMorePosts(poststyle);
      }
    };
  }

  /* Button handle options */
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", () => {
      handleLoadMorePosts(poststyle);
    });
  }
}

export { init as default };
