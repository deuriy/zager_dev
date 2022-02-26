<?php

if (is_404()) {
  $page_blocks = get_field('404_page_blocks', 'options');
} elseif (is_shop() || is_product_category()) {
  $shop_pages_settings = get_field('shop_pages', 'option');

  if (is_shop()) {
    $page_settings = $shop_pages_settings['default_shop_page'];
  } elseif (is_product_category('accessories')) {
    $page_settings = $shop_pages_settings['accessories_default_shop_page'];
  }

  if (!empty($page_settings['top_blocks']) && !empty($page_settings['top_blocks']['page_blocks'])) {
    $top_blocks = $page_settings['top_blocks']['page_blocks'];
  } else {
    $top_blocks = [];
  }

  if (!empty($page_settings['after_products']) && !empty($page_settings['after_products']['page_blocks'])) {
    $after_products = $page_settings['after_products']['page_blocks'];
  } else {
    $after_products = [];
  }

  if (!empty($page_settings['bottom_blocks']) && !empty($page_settings['bottom_blocks']['page_blocks'])) {
    $bottom_blocks = $page_settings['bottom_blocks']['page_blocks'];
  } else {
    $bottom_blocks = [];
  }  

  $page_blocks = array_merge($top_blocks, $after_products, $bottom_blocks);
} else {
  $page_blocks = get_field('page_blocks');
}

if ($page_blocks) {
  $acf_layouts_names = array_unique(array_column($page_blocks, 'acf_fc_layout'));
} else {
  $acf_layouts_names = [];
}

?>

<?php foreach ($acf_layouts_names as $layout_name): ?>
  <?php if ($layout_name == 'banner'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.IconsAndTextsSwiper', {
          slidesPerView: 'auto',
          spaceBetween: 20,
          autoHeight: true,
        });
      });
    </script>
  <?php elseif ($layout_name == 'feedback_section'): ?>
    <script>
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

        new Swiper('.FilterTabsListSwiper', {
          slidesPerView: 'auto',
          spaceBetween: 8,
        });

        // document.addEventListener('click', function (e) {
        //   let filterTabsMenuItem = e.target.closest('.FilterTabsMenu_item');

        //   if (!filterTabsMenuItem) return;

        //   let filterTabsMenu = filterTabsMenuItem.closest('.FilterTabsMenu');
        //   let activeFilterTabsMenuItem = filterTabsMenu.querySelector('.FilterTabsMenu_item-active');

        //   if (activeFilterTabsMenuItem) {
        //     activeFilterTabsMenuItem.classList.remove('FilterTabsMenu_item-active');
        //   }

        //   filterTabsMenuItem.classList.add('FilterTabsMenu_item-active');
        //   e.preventDefault();
        // });

        // document.addEventListener('click', function (e) {
        //   let filterTabsMenuItem = e.target.closest('.FilterTabsMenu_item');

        //   if (!filterTabsMenuItem) return;

        //   let filterName = filterTabsMenuItem.dataset.filter;
        //   let filterTabs = filterTabsMenuItem.closest('.FilterTabs');

        //   filterTabs.querySelectorAll('.FilterTabs_item').forEach(item => {
        //     let itemNames = item.dataset.itemName.split(', ');

        //     if (!itemNames.includes(filterName) && filterName != 'all') {
        //       item.style.display = 'none';
        //     } else {
        //       item.style.display = '';
        //     }
        //   });

        //   e.preventDefault();
        // });

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
      });
    </script>
  <?php elseif ($layout_name == 'infoblock'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        function checkInfoBlockHeight(infoBlock) {
          if (infoBlock.classList.contains('InfoBlock-offsetHalfUp')) {
            infoBlock.style.marginTop = `-${infoBlock.offsetHeight / 2}px`;

            let prevSection = infoBlock.closest('.InfoBlockSection').previousElementSibling;
            let paddingBottom = window.getComputedStyle(prevSection).paddingBottom;
            prevSection.style.paddingBottom = parseInt(paddingBottom) + (infoBlock.offsetHeight / 2) + 'px';
          } else if (infoBlock.classList.contains('InfoBlock-offsetHalfDown')) {
            infoBlock.style.marginBottom = `-${infoBlock.offsetHeight / 2}px`;
            
            let nextSection = infoBlock.closest('.InfoBlockSection').nextElementSibling;
            let paddingTop = window.getComputedStyle(nextSection).paddingTop;
            nextSection.style.paddingTop = parseInt(paddingTop) + (infoBlock.offsetHeight / 2) + 'px';
          }
        }

        let infoBlocksOffsetHalf = document.querySelectorAll('.InfoBlock-offsetHalfUp, .InfoBlock-offsetHalfDown');
        infoBlocksOffsetHalf.forEach(infoBlock => {
          checkInfoBlockHeight(infoBlock);
        });
      });
    </script>
  <?php elseif ($layout_name == 'product_cards' || $layout_name == 'products' || $layout_name == 'series' || $layout_name == 'product_cards_by_group'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.SeriesSwiper, .ProductCardsSwiper', {
          slidesPerView: 'auto',
          spaceBetween: 20,
          // autoHeight: true,
        });
      });
    </script>
  <?php elseif ($layout_name == 'product_section'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        let productSectionImgFullScreenBtn = document.querySelector('.ProductSectionImg_fullScreenBtn');
        let productSectionImgSwiper = new Swiper('.ProductSectionImgSwiper', {
          slidesPerView: 1,
          spaceBetween: 0,
          loop: true,
          // autoHeight: true,

          pagination: {
            el: '.ProductSectionImgSwiper_pagination',
            clickable: true,
            bulletClass: 'SwiperPagination_bullet',
            bulletActiveClass: 'SwiperPagination_bullet-active',
          },

          navigation: {
            prevEl: '.ProductSectionImg_prev',
            nextEl: '.ProductSectionImg_next',
          },

          on: {
            init: function () {
              let productImgActiveSlide = document.querySelector(`.ProductSectionImgSwiper .swiper-slide-active`);
              productSectionImgFullScreenBtn.href = productImgActiveSlide.querySelector('img').src;
            }
          }
        });

        productSectionImgSwiper.on('slideChange', function () {
          setTimeout(() => {
            let productImgActiveSlide = document.querySelector(`.ProductSectionImgSwiper .swiper-slide-active`);
            productSectionImgFullScreenBtn.href = productImgActiveSlide.querySelector('img').src;
          }, 0);
        });

        new Swiper('.TestimonialsSwiper', {
          slidesPerView: 'auto',
          spaceBetween: 20,
          autoHeight: true,
        });
      });
    </script>
  <?php elseif ($layout_name == 'video_section'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
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
      });
    </script>
  <?php elseif ($layout_name == 'faq_section'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.FilterTabsListSwiper', {
          slidesPerView: 'auto',
          spaceBetween: 8,
        });

        function slideToggle(elem) {
          if (elem.offsetHeight < elem.scrollHeight) {
            elem.style.maxHeight = `${elem.scrollHeight}px`;
          } else {
            elem.style.maxHeight = '';
          }
        }

        document.addEventListener('click', function (e) {
          let filterTabsMenuItem = e.target.closest('.FilterTabsMenu_item');

          if (!filterTabsMenuItem) return;

          let filterTabsMenu = filterTabsMenuItem.closest('.FilterTabsMenu');
          let activeFilterTabsMenuItem = filterTabsMenu.querySelector('.FilterTabsMenu_item-active');

          if (activeFilterTabsMenuItem) {
            activeFilterTabsMenuItem.classList.remove('FilterTabsMenu_item-active');
          }

          filterTabsMenuItem.classList.add('FilterTabsMenu_item-active');
          e.preventDefault();
        });

        document.addEventListener('click', function (e) {
          let filterTabsMenuItem = e.target.closest('.FilterTabsMenu_item');

          if (!filterTabsMenuItem) return;

          let filterName = filterTabsMenuItem.dataset.filter;
          let filterTabs = filterTabsMenuItem.closest('.FilterTabs');

          filterTabs.querySelectorAll('.FilterTabs_item').forEach(item => {
            let itemName = item.dataset.itemName;

            if (itemName != filterName && filterName != 'all') {
              item.style.display = 'none';
            } else {
              item.style.display = '';
            }
          });

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
      });
    </script>
  <?php elseif ($layout_name == 'video_player'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // Video Section
        document.addEventListener('click', function (e) {
          let videoTilePlaylist = e.target.closest('.VideoTile-playlist');

          if (!videoTilePlaylist) return;

          let videoID = videoTilePlaylist.getAttribute('href').slice(1);

          let videoPlayer = videoTilePlaylist.closest('.VideoPlayer');
          let activevideoTilePlaylist = videoPlayer.querySelector('.VideoTile-active');

          activevideoTilePlaylist.classList.remove('VideoTile-active');
          videoTilePlaylist.classList.add('VideoTile-active');

          let iframe = videoPlayer.querySelector('.VideoPlayer_video iframe');
          iframe.src = `https://www.youtube.com/embed/${videoID}?autoplay=1`;

          e.preventDefault();
        });

        const videoPlaylist = document.querySelector('.VideoPlaylist_items');
        const videoPlaylistPS = new PerfectScrollbar(videoPlaylist);

        videoPlaylist.addEventListener('ps-scroll-y', (e) => {
          if (videoPlaylist.scrollHeight == (videoPlaylist.scrollTop + videoPlaylist.clientHeight)) {
            videoPlaylist.parentNode.classList.add('VideoPlaylist_itemsWrapper-scrolled');
          } else {
            videoPlaylist.parentNode.classList.remove('VideoPlaylist_itemsWrapper-scrolled');
          }
        });
      });
    </script>
  <?php elseif ($layout_name == 'beneficiaries'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.BeneficiariesSwiper', {
          slidesPerView: 'auto',
          spaceBetween: 20,
          slideActiveClass: 'BeneficiariesSwiper_slide-active',

          pagination: {
            el: '.BeneficiariesSection_pagination',
            clickable: true,
            bulletClass: 'SwiperPagination_bullet',
            bulletActiveClass: 'SwiperPagination_bullet-active',
          },

          navigation: {
            nextEl: '.BeneficiariesSection_next',
          },

          breakpoints: {
            1024: {
              spaceBetween: 48,
            },
          },
        });
      });      
    </script>
  <?php elseif ($layout_name == 'posts_section'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        function slideToggle(elem) {
          if (elem.offsetHeight < elem.scrollHeight) {
            elem.style.maxHeight = `${elem.scrollHeight}px`;
          } else {
            elem.style.maxHeight = '';
          }
        }

        function setPostsVisibility(visible = true) {
          let prop = !visible ? 'none' : '';
          let posts = document.querySelectorAll('.PostsSection_item:nth-child(n+4)');
          posts.forEach(post => post.style.display = prop);
        }

        let postsSectionItems = document.querySelector('.PostsSection_items');
        if (postsSectionItems && document.documentElement.clientWidth <= 767) {
          setPostsVisibility(false);
          postsSectionItems.style.maxHeight = postsSectionItems.offsetHeight + 'px';
          setPostsVisibility();
        }

        document.addEventListener('click', function (e) {
          let allPostsButton = e.target.closest('.PostsSection_viewAllBtn');

          if (!allPostsButton) return;

          let noBorderPosts = postsSectionItems.querySelectorAll('.Post-noBorder');
          noBorderPosts.forEach(post => post.classList.remove('Post-noBorder'));

          slideToggle(postsSectionItems);
          allPostsButton.remove();

          e.preventDefault();
        });
      });      
    </script>
  <?php elseif ($layout_name == 'student_reviews'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('click', function (e) {
          let studentReviewMoreLink = e.target.closest('.StudentReview_moreLink');

          if (!studentReviewMoreLink) return;

          let studentReview = studentReviewMoreLink.closest('.StudentReview');
          studentReview.classList.add('StudentReview-expanded');
          studentReviewMoreLink.remove();

          e.preventDefault();
        });
      });
    </script>
  <?php elseif ($layout_name == 'artist_reviews'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.addEventListener('click', function (e) {
          let videoReviewMoreLink = e.target.closest('.VideoReview_moreLink');

          if (!videoReviewMoreLink) return;

          let videoReviewText = videoReviewMoreLink.closest('.VideoReview').querySelector('.VideoReview_text');
          videoReviewText.classList.toggle('VideoReview_text-expanded');

          if (videoReviewText.classList.contains('VideoReview_text-expanded')) {
            videoReviewMoreLink.textContent = 'Less';
          } else {
            videoReviewMoreLink.textContent = 'More';
          }
        });
      });

      (function($) {
        let page = 1;
        let postsPerPage = 9;
        let excludedReviewsIDs = [];

        $('.VideoReview').each(function(index, el) {
          excludedReviewsIDs.push(Number(el.dataset.reviewId));
        });

        function loadArtistReviews (page = 1) {
          let ajaxurl = '/wp-admin/admin-ajax.php';
          let data = {
            action: 'get_artist_reviews',
            contentType: 'application/json',
            page: page,
            posts_per_page: postsPerPage,
            excluded_reviews_ids: excludedReviewsIDs
          };

          $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: data,
            beforeSend: function( xhr ) {
              if ($( '.VideoReviews_items' ).length) {
                $( '.VideoReviews_items' ).after( '<div class="Reload Reload-center VideoReviews_reload"></div>' );
                $('.LoadingPosts').remove();
              }
            },
            success: function( response ) {
              if ($( '.VideoReviews_items' ).length) {
                $('.VideoReviews_reload').remove();
                $( '.VideoReviews_items' ).append(response);
                $( '.VideoReviews_items' ).after($('.LoadingPosts'));
              }
            }
          });
        }

        document.addEventListener('click', function (e) {
          let loadingPostsBtn = e.target.closest('.LoadingPosts_btn');

          if (!loadingPostsBtn) return;

          page++;
          loadArtistReviews(page);

          e.preventDefault();
        });
      })( jQuery );
    </script>
  <?php elseif ($layout_name == 'expandable_tables'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.Tabs_list').forEach(tabList => {
          tabList.querySelectorAll('.Tabs_item').forEach((tab, tabIndex) => {
            // tab.dataset.tabIndex = tabIndex;

            tab.onclick = () => {
              let parent = tab.closest('.Tabs');
              let activeTab = parent.querySelector('.Tabs_item-active');

              if (activeTab) {
                activeTab.classList.remove('Tabs_item-active');
              }

              tab.classList.add('Tabs_item-active');

              let tabsContent = parent.querySelectorAll('.Tabs_content');

              parent.querySelectorAll('.Tabs_list').forEach(tabsList => {
                tabsList.querySelector(`.Tabs_item:nth-child(${tabIndex + 1})`).click();
              })

              tabsContent.forEach(function (tabContent, tabContentIndex) {
                tabContent.style.display = 'none';
                tabContent.classList.remove('Tabs_content-active');
              });

              tabsContent[tabIndex].style.display = 'block';
              tabsContent[tabIndex].classList.add('Tabs_content-active');
            }
          });
        });

        document.querySelectorAll('.Tabs').forEach(tabs => {
          tabs.querySelectorAll('.Tabs_content').forEach((tabContent, tabIndex) => {
            tabContent.dataset.tabIndex = tabIndex;
          });
        });


        function setMaxHeight(elem) {
          elem.style.maxHeight = `${elem.scrollHeight}px`;
        }

        function setTabsVisibility(visible = true) {
          let allTabs = document.querySelectorAll('.Tabs');
          let prop = visible ? 'block' : '';

          allTabs.forEach(tabs => {
            let tabsContent = tabs.querySelectorAll('.Tabs_content');

            tabsContent.forEach(tabContent => {
              if (!tabContent.classList.contains('Tabs_content-active')) {
                tabContent.style.display = prop;
              }
            });
          });
        }

        setTabsVisibility();

        let expandedTables = document.querySelectorAll('.ExpandTable-expanded');
        expandedTables.forEach(expandTable => {
          setMaxHeight(expandTable);
        });

        setTabsVisibility(false);


        window.addEventListener('resize', function () {
          setTabsVisibility();

          expandedTables.forEach(expandTable => setMaxHeight(expandTable));

          setTabsVisibility(false);
        });

        document.addEventListener('click', function (e) {
          let expandTableSwitchLink = e.target.closest('.ExpandTable_switchLink');

          if (!expandTableSwitchLink) return;

          let expandTable = expandTableSwitchLink.closest('.ExpandTable');
          let expandTableTH = expandTable.querySelector('.ExpandTable_th');
          let expandTableTHStyle = getComputedStyle(expandTableTH);
          let expandTableTHHeight = expandTable.querySelector('.ExpandTable_th').offsetHeight + parseInt(expandTableTHStyle.borderBottomWidth) + parseInt(expandTableTHStyle.borderTopWidth);

          if (expandTable.clientHeight != expandTableTHHeight) {
            expandTable.querySelectorAll('.Hint_wrapper').forEach(hintWrapper => {
              hintWrapper.style.display = 'none';
            });
            expandTableSwitchLink.classList.add('SwitchLink-collapsed');
            expandTable.classList.remove('ExpandTable-expanded');
            setTimeout(() => {
              expandTable.style.maxHeight = `${expandTableTHHeight}px`;
            });
          } else {
            expandTable.querySelectorAll('.Hint_wrapper').forEach(hintWrapper => {
              hintWrapper.style.display = '';
            });
            expandTableSwitchLink.classList.remove('SwitchLink-collapsed');
            expandTable.style.maxHeight = `${expandTable.scrollHeight}px`;
            setTimeout(() => {
              expandTable.classList.add('ExpandTable-expanded');
            }, 100);
          }

          e.preventDefault();
        });

        function isTouchDevice() {
          return !!('ontouchstart' in window);
        }

        if (!isTouchDevice()) {
          document.addEventListener('mouseover', function (e) {
            let hint = e.target.closest('.Hint');

            if (!hint) return;

            hint.classList.add('Hint-opened');

            e.preventDefault();
          });

          document.addEventListener('mouseout', function (e) {
            let hint = e.target.closest('.Hint');

            if (!hint) return;

            hint.classList.remove('Hint-opened');

            e.preventDefault();
          });
        } else {
          document.addEventListener('touchstart', function (e) {
            let hintIcon = e.target.closest('.Hint_icon');

            if (!hintIcon) return;

            let hint = hintIcon.closest('.Hint');
            let openedHint = document.querySelector('.Hint-opened');

            if (openedHint && openedHint != hint) {
              openedHint.classList.remove('Hint-opened');
            }
            hint.classList.toggle('Hint-opened');
          });

          document.addEventListener('touchstart', function (e) {
            let hintWrapper = document.querySelector('.Hint-opened .Hint_wrapper');

            if (!hintWrapper) return;

            let hint = hintWrapper.closest('.Hint');
            let hintIcon = hint.querySelector('.Hint_icon');

            if (!hintWrapper.contains(e.target) && !hintIcon.contains(e.target)) {
              hint.classList.remove('Hint-opened');
            }
          });
        }

        document.addEventListener('click', function (e) {
          let hintIcon = e.target.closest('.Hint_icon');

          if (!hintIcon) return;

          e.preventDefault();
        });


        window.addEventListener('scroll', function () {
          let openedHintWrapper = document.querySelector('.Hint-opened .Hint_wrapper');

          if (!openedHintWrapper) return;

          let coords = openedHintWrapper.getBoundingClientRect();

          if (coords.top < 0 || coords.bottom > document.documentElement.clientHeight + coords.height / 2) {
            openedHintWrapper.closest('.Hint-opened').classList.remove('Hint-opened');
          }
        });

        // document.querySelectorAll('a[href^="#"]:not(a[href="#"])').forEach(anchor => {
        //   anchor.addEventListener("click", function (e) {
        //     e.preventDefault();

        //     let targetElem = document.querySelector(this.getAttribute("href"));

        //     if (!targetElem) return;

        //     if (targetElem.closest('.Tabs_content:not(.Tabs_content-active)')) {
        //       let tabs = targetElem.closest('.Tabs');
        //       let activeTabContent = tabs.querySelector('.Tabs_content-active');
        //       activeTabContent.classList.remove('Tabs_content-active');

        //       let tabContent = targetElem.closest('.Tabs_content');
        //       tabContent.classList.add('Tabs_content-active');

        //       let tabIndex = tabContent.dataset.tabIndex;
        //       let activeTabItem = tabs.querySelector('.Tabs_item-active');
        //       activeTabItem.classList.remove('Tabs_item-active');

        //       let tabItem = tabs.querySelector(`.Tabs_item[data-tab-index="${tabIndex}"]`);
        //       tabItem.classList.add('Tabs_item-active');
        //     }

        //     setTimeout(() => {
        //       targetElem.scrollIntoView({
        //         behavior: "smooth",
        //       });
        //     });

        //   });
        // });
      });
    </script>
  <?php elseif ($layout_name == 'accessories_section'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.AccessoriesSwiper', {
          slidesPerView: 'auto',
          spaceBetween: 20,

          pagination: {
            el: '.SwiperPagination',
            clickable: true,
            bulletClass: 'SwiperPagination_bullet',
            bulletActiveClass: 'SwiperPagination_bullet-active',
          },

          navigation: {
            prevEl: '.AccessoriesSection_prev',
            nextEl: '.AccessoriesSection_next',
          },

          breakpoints: {
            768: {
              slidesPerView: 4,
              spaceBetween: 34
            },
            1024: {
              spaceBetween: 48,
              slidesPerView: 4,
            },
            1200: {
              spaceBetween: 48,
              slidesPerView: 4,
              loop: true
            },
          },
        });
      });      
    </script>
  <?php endif ?>
<?php endforeach ?>