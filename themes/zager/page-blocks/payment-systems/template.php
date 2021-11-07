<?php
$payment_systems = $field['block_type'] === 'default' ? get_field('product_payment_systems_default', 'option') : $field['payment_systems'];
?>

<?php if ($payment_systems): ?>
	<div class="PaymentSystems Tabs_paymentSystems">
		<?php foreach ($payment_systems as $payment_system): ?>
			<?php
			$logo = wp_get_attachment_image($payment_system['logo'], 'full', false, array('class' => 'PaymentSystem_img'));
			?>

			<div class="PaymentSystem<?php echo $payment_system['display_button'] ? ' PaymentSystem-extended' : '' ?> PaymentSystems_item">
				<?php if ($logo): ?>
					<div class="PaymentSystem_imgWrapper">
						<?php echo $logo; ?>
					</div>
				<?php endif ?>
				
				<?php if ($payment_system['title']): ?>
					<h3 class="PaymentSystem_title">
						<?php echo $payment_system['title']; ?>
					</h3>
				<?php endif ?>

				<?php if ($payment_system['description']): ?>
					<div class="PaymentSystem_description">
						<?php echo $payment_system['description']; ?>
					</div>
				<?php endif ?>

				<?php
				if ($payment_system['display_button'] === 'yes' && $payment_system['button']['url'] && $payment_system['button']['text']):
					$button_style_classes = [
						'filled' => 'BtnYellow',
						'outline' => 'BtnOutline',
						'black' => 'BtnBlack',
					];

					$button_style_class = $button_style_classes[$payment_system['button']['button_style']];
					$button_additional_class = $button_style_class === 'BtnOutline' ? ' BtnOutline-lightBeigeBg BtnOutline-darkText ' : ' ';
					$button_icon_class = ($payment_system['button']['button_icon'] !== 'no_icon') ? $button_style_class . '-' . $payment_system['button']['button_icon'] . ' ' : ' ';
					$button_classes = $button_style_class . $button_additional_class . $button_icon_class . 'PaymentSystem_btn';
					?>
					<a class="<?php echo $button_classes ?>" href="<?php echo $payment_system['button']['url'] ?>">
						<?php echo $payment_system['button']['text'] ?>
					</a>
				<?php endif ?>
			</div>
		<?php endforeach ?>
	</div>
<?php endif ?>
