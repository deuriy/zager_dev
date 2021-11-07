<?php
$faq = $field['block_type'] === 'default' ? get_field('product_faq_default', 'option') : $field;
?>

<?php if ($faq['title'] || $faq['faq_items']): ?>
	<div class="Accordion Accordion-faqTab">
		<?php if ($faq['title']): ?>
			<h3 class="Accordion_title">
				<?php echo $faq['title'] ?>
			</h3>
		<?php endif ?>

		<?php if ($faq['faq_items']): ?>
			<div class="Accordion_items">
				<?php foreach ($faq['faq_items'] as $faq_item): ?>
					<div class="AccordionPanel AccordionPanel-small Accordion_item">
						<?php if ($faq_item->post_title): ?>
							<h3 class="AccordionPanel_title">
								<?php echo $faq_item->post_title; ?>
							</h3>
						<?php endif ?>

						<?php if ($faq_item->post_content): ?>
							<div class="AccordionPanel_content">
								<?php echo $faq_item->post_content; ?>
							</div>
						<?php endif ?>
					</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
	</div>
	<?php endif ?>