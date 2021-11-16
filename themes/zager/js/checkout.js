document.addEventListener('DOMContentLoaded', function () {
	document.addEventListener('click', function (e) {
		let orderTableHeader = e.target.closest('.woocommerce-checkout-review-order-table__header');

		if (!orderTableHeader || document.documentElement.clientWidth > 767) return;

		let orderTable = orderTableHeader.closest('.woocommerce-checkout-review-order-table');
		let orderTableCartContent = orderTable.querySelector('.woocommerce-checkout-review-order-table__cart-content');

		orderTable.classList.toggle('woocommerce-checkout-review-order-table--collapsed');
	});

	document.addEventListener('click', function (e) {
		let orderTableCloseBtn = e.target.closest('.woocommerce-checkout-review-order-table__close-btn');

		if (!orderTableCloseBtn || document.documentElement.clientWidth > 767) return;

		let orderTable = orderTableCloseBtn.closest('.woocommerce-checkout-review-order-table');
		orderTable.classList.add('woocommerce-checkout-review-order-table--collapsed');

		e.preventDefault();
	});

	document.addEventListener('click', function (e) {
		let multistageFormStepBtn = e.target.closest('.multistage-form__step-btn');

		if (!multistageFormStepBtn) return;

		let multistageForm = multistageFormStepBtn.closest('.multistage-form');
		let currentStageBlock = multistageForm.querySelector('.multistage-form__stage-block--current');
		let stageCurrentItem = multistageForm.querySelector('.stages__item--current');

		currentStageBlock.classList.remove('multistage-form__stage-block--current');
		stageCurrentItem.classList.remove('stages__item--current');

		if (multistageFormStepBtn.dataset.action === 'prevStep') {
			let prevStageBlock = currentStageBlock.previousElementSibling;
			let prevStageItem = stageCurrentItem.previousElementSibling;

			prevStageBlock.classList.add('multistage-form__stage-block--current');
			prevStageItem.classList.add('stages__item--current');
		} else if(multistageFormStepBtn.dataset.action === 'nextStep') {
			let nextStageBlock = currentStageBlock.nextElementSibling;
			let nextStageItem = stageCurrentItem.nextElementSibling;

			nextStageBlock.classList.add('multistage-form__stage-block--current');
			nextStageItem.classList.add('stages__item--current');
		}

		let currentStageIndex = multistageForm.querySelector('.stages__item--current').dataset.stageIndex;
		let multistageFormButtonsWrapper = multistageForm.querySelector('.multistage-form__buttons');
		let checkoutPaymentBtnWrapper = multistageForm.querySelector('.woocommerce-checkout-payment__btn-wrapper');
		let multistageFormPrevBtn = multistageFormButtonsWrapper.querySelector('[data-action="prevStep"]');

		// console.log(currentStageIndex);

		if (currentStageIndex == 2) {
			multistageFormButtonsWrapper.classList.add('hidden');
			checkoutPaymentBtnWrapper.classList.remove('hidden');
		} else {
			multistageFormButtonsWrapper.classList.remove('hidden');
			checkoutPaymentBtnWrapper.classList.add('hidden');
		}

		if (currentStageIndex != 0) {
			multistageFormButtonsWrapper.classList.remove('multistage-form__buttons--justify-end');
			multistageFormPrevBtn.classList.remove('hidden');
		} else {
			multistageFormButtonsWrapper.classList.add('multistage-form__buttons--justify-end');
			multistageFormPrevBtn.classList.add('hidden');
		}

		e.preventDefault();
	});

	document.addEventListener('click', function (e) {
		let checkoutPaymentPrevBtn = e.target.closest('.woocommerce-checkout-payment__prev-btn');

		if (!checkoutPaymentPrevBtn) return;

		let multistageForm = checkoutPaymentPrevBtn.closest('.multistage-form');
		let currentStageBlock = multistageForm.querySelector('.multistage-form__stage-block--current');
		let stageCurrentItem = multistageForm.querySelector('.stages__item--current');

		currentStageBlock.classList.remove('multistage-form__stage-block--current');
		stageCurrentItem.classList.remove('stages__item--current');

		let multistageFormButtonsWrapper = multistageForm.querySelector('.multistage-form__buttons');
		let prevStageBlock = currentStageBlock.previousElementSibling;
		let prevStageItem = stageCurrentItem.previousElementSibling;

		prevStageBlock.classList.add('multistage-form__stage-block--current');
		prevStageItem.classList.add('stages__item--current');

		let checkoutPaymentBtnWrapper = multistageForm.querySelector('.woocommerce-checkout-payment__btn-wrapper');

		checkoutPaymentBtnWrapper.classList.add('hidden');
		multistageFormButtonsWrapper.classList.remove('hidden');

		e.preventDefault();
	});

	document.addEventListener('change', function(e) {
		let checkbox = e.target.closest('label.checkbox input[type="checkbox"]');

		if (!checkbox) return;

		let checkboxLabel = checkbox.parentNode;
		checkboxLabel.classList.toggle('checkbox--checked');
	});

	// document.addEventListener('change', function(e) {
	// 	let radio = e.target.closest('input[type="radio"]');

	// 	if (!radio || radio.name != 'same_as_billing_address') return;

	// 	console.log(document.getElementById('billing_address_no').checked);

	// 	document.getElementById('ship-to-different-address-checkbox').click();

	// 	// if (document.getElementById('billing_address_no').checked) {
	// 	// 	document.getElementById('ship-to-different-address-checkbox').checked = true;
	// 	// } else {
	// 	// 	document.getElementById('ship-to-different-address-checkbox').checked = false;
	// 	// }

	// 	console.log();
	// 	console.log(document.getElementById('ship-to-different-address-checkbox').checked);
	// });
});

(function($) {

	$('[data-action="nextStep"]').click(function() {
		let ajaxurl = '/wp-admin/admin-ajax.php';
		let data = {
			action: 'check_save_user_info',
			check: $('#save_user_info').prop('checked')
		}

		jQuery.post( ajaxurl, data, function( response ){
			// console.log( response );
		} );
	});

	$("#billing_phone").mask("(999) 999-9999");
	
})( jQuery );