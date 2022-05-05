function init() {
  const body = document.querySelector("body");
  const button = document.querySelector(".js-search-toggle");





  const openSearch = () => {
    body.classList.add("show-search", "visible__search");
    // drawer.setAttribute("open", "");
};

// close main nav drawer
const closeSearch = () => {
    body.classList.remove("show-search");
    setTimeout(() => {
        body.classList.remove("visible__search");
    }, 500);
  };


  button.onclick = () => {
    openSearch();
};

}

export { init as default };
