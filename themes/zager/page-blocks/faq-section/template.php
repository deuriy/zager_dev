<div class="AccordionSection">
  <div class="Container">
    <div class="FilterTabs FilterTabs-accordionSection">
    	<?php if ($field['category_tabs']): ?>
	      <div class="FilterTabsListSwiper swiper FilterTabsMenu FilterTabsMenu-accordionSection FilterTabs_menu FilterTabs_menu-swiper hidden-smPlus">
	        <div class="swiper-wrapper">
	        	<div class="swiper-slide FilterTabsListSwiper_slide">
	            <div class="FilterTabsMenu_item FilterTabsMenu_item-active" data-filter="all">All</div>
	          </div>
	        	<?php foreach ($field['category_tabs'] as $key => $cat_id): ?>
		      		<?php
	              $tab_category = get_term( $cat_id );
	            ?>

		          <div class="swiper-slide FilterTabsListSwiper_slide">
		            <div class="FilterTabsMenu_item" data-filter="<?php echo $tab_category->slug ?>">
		            	<?php echo $tab_category->name ?>
		            </div>
		          </div>
	        	<?php endforeach ?>
	        </div>
	      </div>

	      <div class="FilterTabsMenu FilterTabsMenu-accordionSection FilterTabs_menu hidden-xs">
	        <ul class="FilterTabsMenu_list">
						<li class="FilterTabsMenu_item FilterTabsMenu_item-active" data-filter="all">All</li>

			      <?php foreach ($field['category_tabs'] as $key => $cat_id): ?>
			      	<?php
	              $tab_category = get_term( $cat_id );
	            ?>

		          <li class="FilterTabsMenu_item" data-filter="<?php echo $tab_category->slug ?>">
		          	<?php echo $tab_category->name ?>
		          </li>
			      <?php endforeach ?>
	        </ul>
	      </div>
    	<?php endif ?>

    	<?php if ($field['faq_items']): ?>
      <div class="Accordion FilterTabs_items">
      	<?php foreach ($field['faq_items'] as $faq_item_id): ?>
      		<?php
      			$faq_item = get_post($faq_item_id);

      			$faq_categories = wp_get_post_terms( $faq_item_id, 'faq_category', array('hide_empty' => false) );
            $faq_categories_data = implode(', ', array_map(function($item) {
              return $item->slug;
            }, $faq_categories));
      		?>

	        <div class="AccordionPanel Accordion_item FilterTabs_item" data-item-name="<?php echo $faq_categories_data ?>">
	        	<?php if ($faq_item->post_title): ?>
		          <h3 class="AccordionPanel_title">
		          	<?php echo $faq_item->post_title ?>
		          </h3>
	        	<?php endif ?>

	        	<?php if ($faq_item->post_content): ?>
		          <div class="AccordionPanel_content">
		            <div class="AccordionPanel_contentWrapper">
		              <?php echo wpautop( $faq_item->post_content ) ?>
		            </div>
		            <div class="AccordionPanel_btnWrapper">
		            	<a class="BtnOutline BtnOutline-darkText BtnOutline-close AccordionPanel_closeBtn" href="#">CLOSE</a>
		            </div>
		          </div>
	        	<?php endif ?>
	        </div>
      	<?php endforeach ?>
      </div>
    	<?php endif ?>
    </div>
  </div>
</div>