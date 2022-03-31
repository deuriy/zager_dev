document.addEventListener('DOMContentLoaded', function () {
  function slideToggle(elem) {
    if (elem.offsetHeight < elem.scrollHeight) {
      elem.style.maxHeight = `${elem.scrollHeight}px`;
    } else {
      elem.style.maxHeight = '';
    }
  }

  const players = Plyr.setup('audio', {
    controls: ['play-large', 'play', 'progress', 'duration', 'captions', 'pip', 'airplay']
  });

  Fancybox.bind(`[data-fancybox="gallery"]`, {
    showClass: 'fancybox-fadeIn',
    placeFocusBack: false
  });

  Fancybox.bind(`.FancyboxPopupLink`, {
    dragToClose: false,
    showClass: 'fancybox-fadeIn',
    mainClass: 'fancybox__container--popup'
  });

  let productThumbs = new Swiper(".ProductImgSwiper_thumbs", {
    loop: true,
    spaceBetween: 8,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });

  let productImgSwiperFullScreenBtn = document.querySelector('.ProductImgSwiper_fullScreenBtn');
  let productGallery = new Swiper(".ProductImgSwiper_gallery", {
    loop: true,
    spaceBetween: 20,
    slidesPerView: 'auto',
    // autoHeight: true,
    centeredSlides: true,

    navigation: {
      nextEl: ".ProductImgSwiper_next",
      prevEl: ".ProductImgSwiper_prev",
    },

    thumbs: {
      swiper: productThumbs,
      slideThumbActiveClass: 'ProductImgSwiper_thumbsSlide-active'
    },

    breakpoints: {
      1024: {
        slidesPerView: 1,
      },
    },

    on: {
      init: function () {
        let productImgActiveSlide = document.querySelector(`.ProductImgSwiper_gallery .swiper-slide-active`);
        productImgSwiperFullScreenBtn.href = productImgActiveSlide.querySelector('img').src;
      }
    }
  });

  productGallery.on('slideChange', function () {
    setTimeout(() => {
      let productImgActiveSlide = document.querySelector(`.ProductImgSwiper_gallery .swiper-slide-active`);
      productImgSwiperFullScreenBtn.href = productImgActiveSlide.querySelector('img').src;
    }, 0);
  });

  new Swiper('.VideoSwiper', {
    slidesPerView: 'auto',
    spaceBetween: 20,

    pagination: {
      el: '.SwiperControls_pagination',
      clickable: true,
      bulletClass: 'SwiperPagination_bullet',
      bulletActiveClass: 'SwiperPagination_bullet-active',
    },

    navigation: {
      nextEl: '.VideoSection_next',
    },

    breakpoints: {
      768: {
        spaceBetween: 48
      },
    },
  });

  new Swiper('.ProductCardsSwiper', {
    slidesPerView: 'auto',
    spaceBetween: 20,
  });

  document.addEventListener('click', function (e) {
    let qaMoreLink = e.target.closest('.QA_moreLink');

    if (!qaMoreLink) return;

    let qa = qaMoreLink.closest('.QA');

    if (!qa) return;

    let qaItems = qa.querySelector('.QA_items');

    qaItems.classList.toggle('QA_items-expanded');
    qaMoreLink.classList.toggle('ArrowLink-arrowTop');
    slideToggle(qaItems);

    if (qaMoreLink.classList.contains('ArrowLink-arrowTop')) {
      qaMoreLink.textContent = 'Read Less';
    } else {
      qaMoreLink.textContent = 'Read More';
    }

    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    let productDescToggleLink = e.target.closest('.Product_descToggleLink');

    if (!productDescToggleLink) return;

    let productDesc = productDescToggleLink.previousElementSibling;

    if (productDesc.classList.contains('Product_description-truncated')) {
      productDesc.classList.remove('Product_description-truncated');
      productDescToggleLink.textContent = 'Read Less';
    } else {
      productDesc.classList.add('Product_description-truncated');
      productDescToggleLink.textContent = 'Read More';
    }

    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    let accordionPanelTitle = e.target.closest('.AccordionPanel_title');

    if (!accordionPanelTitle) return;

    let accordionPanel = accordionPanelTitle.closest('.AccordionPanel');
    accordionPanel.classList.toggle('AccordionPanel-expanded');
    slideToggle(accordionPanel);
  });

  document.addEventListener('click', function (e) {
    let accordionPanelCloseBtn = e.target.closest('.AccordionPanel_closeBtn');

    if (!accordionPanelCloseBtn) return;

    let accordionPanel = accordionPanelCloseBtn.closest('.AccordionPanel');
    accordionPanel.classList.remove('AccordionPanel-expanded');
    slideToggle(accordionPanel);
    e.preventDefault();
  });

  document.querySelectorAll('a[href^="#"]:not(a[href="#"])').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();

      let targetElem = document.querySelector(this.getAttribute("href"));

      if (!targetElem) return;

      targetElem.scrollIntoView({
        behavior: "smooth",
      });
    });
  });

  window.addEventListener('scroll', function () {
    let productOptionsCard = document.querySelector('.PriceCard-productOptions');
    let productOptionsBtnWrapper = document.querySelector('.Product_optionsBtnWrapper');

    if (!productOptionsCard || !productOptionsBtnWrapper) return;

    let coords = productOptionsCard.getBoundingClientRect();

    if (coords.top < -coords.height || coords.bottom > document.documentElement.clientHeight + coords.height) {
      productOptionsBtnWrapper.classList.remove('Product_optionsBtnWrapper-invisible');
    } else {
      productOptionsBtnWrapper.classList.add('Product_optionsBtnWrapper-invisible');
    }
  });

  document.querySelectorAll('.Tabs_list').forEach(tabList => {
    tabList.querySelectorAll('.Tabs_item').forEach((tab, tabIndex) => {
      tab.dataset.tabIndex = tabIndex;

      tab.onclick = () => {
        let activeTab = tab.parentNode.querySelector('.Tabs_item-active');

        if (activeTab) {
          activeTab.classList.remove('Tabs_item-active');
        }

        tab.classList.add('Tabs_item-active');

        let parent = tab.closest('.Tabs');
        let tabsContent = parent.querySelectorAll('.Tabs_content');

        parent.querySelectorAll('.Tabs_list').forEach(tabsList => {
          tabsList.querySelector(`.Tabs_item:nth-child(${tabIndex + 1})`).click();
        })

        tabsContent.forEach(function (tabContent, tabContentIndex) {
          tabContent.style.display = 'none';
        });

        tabsContent[tabIndex].style.display = 'block';
      }
    });
  });

  document.querySelectorAll('.Tabs').forEach(tabs => {
    tabs.querySelectorAll('.Tabs_content').forEach((tabContent, tabIndex) => {
      tabContent.dataset.tabIndex = tabIndex;
    });
  });

  // Mobile popup
  let mobilePopupState = {
    visibility: false
  };

  function toggleMobilePopup(state, mobilePopup) {
    if (!mobilePopup) return;

    if (mobilePopupState.visibility) {
      mobilePopup.classList.add('MobilePopup-opened');
      document.body.style.overflow = 'hidden';
    } else {
      mobilePopup.classList.remove('MobilePopup-opened');
      document.body.style.cssText = '';
    }
  }

  function openMobilePopup(mobilePopupID) {
    let mobilePopup = document.getElementById(mobilePopupID);

    if (!mobilePopup) return;

    let openedMobilePopup = document.querySelector('.MobilePopup-opened');

    if (openedMobilePopup) {
      closeMobilePopup(openedMobilePopup.id);
    }

    mobilePopupState.visibility = true;
    window.history.pushState(mobilePopupState, null, "");
    toggleMobilePopup(mobilePopupState, mobilePopup);
  }

  function closeMobilePopup(mobilePopupID) {
    let mobilePopup = document.getElementById(mobilePopupID);

    if (!mobilePopup) return;

    mobilePopupState.visibility = false;
    window.history.pushState(mobilePopupState, null, "");
    toggleMobilePopup(mobilePopupState, mobilePopup);
  }

  document.addEventListener('click', function (e) {
    let mobilePopupLink = e.target.closest('[data-action="openMobilePopup"]');

    if (!mobilePopupLink) return;

    let mobilePopupID = mobilePopupLink.getAttribute('href').slice(1);
    openMobilePopup(mobilePopupID);

    let mobilePopupTitle = mobilePopupLink.dataset.mobilePopupTitle;
    if (mobilePopupTitle !== undefined) {
      let mobilePopup = document.getElementById(mobilePopupID);
      mobilePopup.querySelector('.MobilePopup_title').textContent = mobilePopupTitle;
    }

    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    let closePopup = e.target.closest('[data-action="closeMobilePopup"]');

    if (!closePopup) return;

    let mobilePopupID;

    if (closePopup.hasAttribute('href')) {
      mobilePopupID = closePopup.getAttribute('href').slice(1);
    }
    if (closePopup.closest('.MobilePopup')) {
      mobilePopupID = closePopup.closest('.MobilePopup').id;
    }

    window.history.back();
    e.preventDefault();
  });

  document.addEventListener('click', function (e) {
    let mobilePopupOverlay = e.target.closest('.MobilePopup_overlay');

    if (!mobilePopupOverlay) return;

    mobilePopupOverlay.closest('.MobilePopup').classList.remove('MobilePopup-opened');
    document.body.style.cssText = '';
  });

  (function setDefaultMobilePopupState() {
    window.history.replaceState(mobilePopupState, null, "");
    toggleMobilePopup(mobilePopupState, document.querySelector('.MobilePopup'));
  })();

  window.addEventListener('popstate', function (e) {
    if (e.state) mobilePopupState = e.state;

    let openedMobilePopup = document.querySelector('.MobilePopup-opened');

    if (!openedMobilePopup) return;

    toggleMobilePopup(mobilePopupState, openedMobilePopup);
  });

  // Mobile Variations & add to cart popup
  // let wid = document.documentElement.clientWidth;
  // let productSidebar = document.querySelector('.Sidebar-product');
  // let productOptionsPopups = document.querySelectorAll('.MobilePopup-productOptions');

  // if (wid < 1024) {
  //   if (productSidebar) {
  //     productSidebar.remove();
  //   }
  // } else {
  //   productOptionsPopups.forEach(popup => popup.remove());
  // }
});

(function($){
  // $( ".single_variation_wrap" ).on( "show_variation", function ( event, variation ) {
  //   alert( variation.variation_id );
  //   console.log( variation );
  // } );

  // console.log('Yes!!!');
})(jQuery);