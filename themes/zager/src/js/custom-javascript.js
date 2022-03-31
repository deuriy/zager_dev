document.addEventListener('DOMContentLoaded', function () {
  let menuHamburger = document.querySelector('.MenuHamburger');
  let mobileNavigation = document.querySelector('.MobileNavigation');
  let mobileMainMenu = document.querySelector('.MobileNavigation .MainMenu');
  let closeMobileNavigation = document.querySelector('.MobileNavigation_closeBtn');

  function slideToggle(elem) {
    if (elem.offsetHeight < elem.scrollHeight) {
      elem.style.maxHeight = `${elem.scrollHeight}px`;
    } else {
      elem.style.maxHeight = '';
    }
  }

  // mobileNavigation.classList.remove('MobileNavigation-opened');
  // alert('Loaded!');

  menuHamburger.addEventListener('click', function (e) {
    menuHamburger.classList.toggle('MenuHamburger-active');
    mobileNavigation.classList.toggle('MobileNavigation-opened');

    document.body.style.overflow = document.documentElement.clientWidth < 768 ? 'hidden' : '';

    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    if (document.documentElement.clientWidth > 767) {
      if (!mobileNavigation.contains(e.target) && !menuHamburger.contains(e.target)) {
        menuHamburger.classList.remove('MenuHamburger-active');
        mobileNavigation.classList.remove('MobileNavigation-opened');
      }
    }
  });

  closeMobileNavigation.addEventListener('click', function (e) {
    menuHamburger.classList.remove('MenuHamburger-active');
    mobileNavigation.classList.remove('MobileNavigation-opened');
    document.body.style.overflow = '';
  });

  document.addEventListener('click', function (e) {
    let mainMenuLink = e.target.closest('.MainMenu_link');

    if (!mainMenuLink || !mobileNavigation.contains(mainMenuLink) || mainMenuLink.parentNode.classList.contains('MainMenu_item-parent')) return;

    menuHamburger.classList.remove('MenuHamburger-active');
    mobileNavigation.classList.remove('MobileNavigation-opened');
    document.body.style.overflow = '';
  });

  mobileMainMenu.addEventListener('click', function (e) {
    let parentMenuLink = e.target.closest('.MainMenu_item-parent > .MainMenu_link');

    if (!parentMenuLink) return;

    let parentMenuItem = parentMenuLink.parentNode;

    parentMenuItem.classList.toggle('MainMenu_item-expanded');
    slideToggle(parentMenuItem);
    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    let secondaryMenuTitle = e.target.closest('.SecondaryMenu_title');

    if (!secondaryMenuTitle) return;

    let secondaryMenu = secondaryMenuTitle.closest('.SecondaryMenu');
    secondaryMenu.classList.toggle('SecondaryMenu-expanded');
    slideToggle(secondaryMenu);
  });

  // document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
  //   "use strict";

  //   anchor.addEventListener("click", function (event) {
  //     event.preventDefault();

  //     if (this.getAttribute("href") == '#' || this.dataset.action !== undefined) return;

  //     document.querySelector(this.getAttribute("href")).scrollIntoView({
  //       behavior: "smooth",
  //     });
  //   });
  // });
});