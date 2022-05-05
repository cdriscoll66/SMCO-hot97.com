function init() {
  const body = document.querySelector("body");
  const button = document.querySelector(".js-toggle");
  const buttonclose = document.querySelector(".js-close");
  const overlay = document.querySelector(".o-drawer__overlay");
  const drawer = document.querySelector("#drawer");
  // const subexpand = document.querySelectorAll(".menu-expand");
  // const menulist = document.querySelector("ul.mobile-menu");

  // open main nav drawer
  const openNav = () => {
      body.classList.add("show-menu", "visible__menu");
      // drawer.setAttribute("open", "");
  };

  // close main nav drawer
  const closeNav = () => {
      body.classList.remove("show-menu");
      setTimeout(() => {
          body.classList.remove("visible__menu");
      }, 500);

      // let openSubNavs = menulist.querySelectorAll(".expanded");

      // openSubNavs.forEach((subnav) => {
      //     subnav.classList.remove("expanded", "visible__menu");
      // });
  };

  // // open dropdown subnav in drawer
  // const openSubMenu = (parent) => {
  //     parent.classList.add("expanded", "visible__menu");
  // };

  // // close dropdown subnav in draw
  // const closeSubMenu = (parent) => {
  //     parent.classList.remove("expanded");
  //     setTimeout(() => {
  //         parent.classList.remove("visible__menu");
  //     }, 500);
  // };

  button.onclick = () => {
      openNav();
  };

  window.addEventListener("resize", () => {
      closeNav();
  });

  overlay.onclick = () => {
      closeNav();
  };

  buttonclose.onclick = () => {
      closeNav();
  };

  // handles subnav
  // subexpand.forEach((sub) => {
  //     sub.addEventListener("click", (event) => {
  //         let parent = event.target.closest(".menu-item-has-children");
  //         if (parent.classList.contains("expanded")) {
  //             closeSubMenu(parent);
  //         } else {
  //             openSubMenu(parent);
  //         }
  //     });
  // });

  drawer.addEventListener("focusout", (event) => {
      if (drawer.matches(":not(:focus-within)")) {
              buttonclose.focus();
      }
  });
}

export { init as default };
