function init() {
  const body = document.querySelector("body");
  const button = document.querySelector(".js-search-toggle");
  const buttonmob = document.querySelector(".js-search-toggle__mob");

  const closebutton = document.querySelector(".js-close-search");

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

  buttonmob.onclick = () => {
    openSearch();
  };

  closebutton.onclick = () => {
    closeSearch();
  };
}

export { init as default };
