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
  const totalPosts = (loadMoreBtn.getAttribute("data-totalremaining") !== null) ? parseInt(loadMoreBtn.getAttribute("data-totalremaining")) : 0;
  const postContainer = document.querySelector(".js-post-collect");

  if (postContainer.childElementCount > (totalPosts - 8)) {
    loadMoreBtn.style.display = "none";
}

  let pagednumber = 0;

  const handleLoadMorePosts = () => {

    pagednumber += 1;

    let query = "/" + posturl + "/?paged=" + pagednumber;
    fetch(query)
      .then(response => response.text())
      .then(data => addPosts(data));
  };

  const addPosts = posts => {
    postContainer.insertAdjacentHTML("beforeend", posts);
  };



  if (loadMoreObs) {
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
        handleLoadMorePosts();
      }
    };
  }

  /* Button handle options */
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", () => {
      handleLoadMorePosts();
      if (postContainer.childElementCount > (totalPosts - 8)) {
        loadMoreBtn.style.display = "none";
    }
  });
  }
}

export { init as default };
