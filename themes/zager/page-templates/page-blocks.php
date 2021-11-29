<?php
/**
 * Template Name: Block Layout Page
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$page_blocks = get_field('page_blocks');
$acf_layouts_names = array_unique(array_column($page_blocks, 'acf_fc_layout'));
?>

<main class="Main">

  <?php render_page_layouts($page_blocks); ?>

</main><!-- #main -->

<?php
get_footer();
?>

<?php foreach ($acf_layouts_names as $layout_name): ?>
  <?php if ($layout_name == 'banner'): ?>
    <script>
      new Swiper('.IconsAndTextsSwiper', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        autoHeight: true,
      });
    </script>
  <?php elseif ($layout_name == 'feedback_section'): ?>
    <script>
      const players = Plyr.setup('audio', {
        controls: ['play-large', 'play', 'progress', 'duration', 'captions', 'pip', 'airplay']
      });

      new Swiper('.FilterTabsListSwiper', {
        slidesPerView: 'auto',
        spaceBetween: 8,
      });

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
          let itemNames = item.dataset.itemName.split(', ');

          if (!itemNames.includes(filterName) && filterName != 'all') {
            item.style.display = 'none';
          } else {
            item.style.display = '';
          }
        });

        e.preventDefault();
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
    </script>
  <?php elseif ($layout_name == 'infoblock'): ?>
    <script>
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
    </script>
  <?php elseif ($layout_name == 'product_cards' || $layout_name == 'products' || $layout_name == 'series'): ?>
    <script>
      new Swiper('.ProductCardsSwiper', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        autoHeight: true,
      });
    </script>
  <?php elseif ($layout_name == 'product_section'): ?>
    <script>
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
    </script>
  <?php elseif ($layout_name == 'product_section'): ?>
    <script>
      new Swiper('.TestimonialsSwiper', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        autoHeight: true,
      });
    </script>
  <?php elseif ($layout_name == 'video_section'): ?>
    <script>
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
    </script>
  <?php elseif ($layout_name == 'faq_section'): ?>
    <script>
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
    </script>
  <?php elseif ($layout_name == 'video_player'): ?>
    <script>
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
    </script>
  <?php elseif ($layout_name == 'beneficiaries'): ?>
    <script>
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
    </script>
  <?php endif ?>
<?php endforeach ?>