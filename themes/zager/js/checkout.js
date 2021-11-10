function slideToggle(elem) {
  if (elem.offsetHeight < elem.scrollHeight) {
    elem.style.maxHeight = `${elem.scrollHeight}px`;
  } else {
    elem.style.maxHeight = '';
  }
}

document.addEventListener('DOMContentLoaded', function () {
	document.addEventListener('click', function (e) {
		let orderTableHeader = e.target.closest('.woocommerce-checkout-review-order-table__header');

		if (!orderTableHeader) return;

		let orderTable = orderTableHeader.closest('.woocommerce-checkout-review-order-table');
		let orderTableCartContent = orderTable.querySelector('.woocommerce-checkout-review-order-table__cart-content');

		orderTable.classList.toggle('woocommerce-checkout-review-order-table--collapsed');
	});

	document.addEventListener('click', function (e) {
		let orderTableCloseBtn = e.target.closest('.woocommerce-checkout-review-order-table__close-btn');

		if (!orderTableCloseBtn) return;

		console.log('Click!');

		let orderTable = orderTableCloseBtn.closest('.woocommerce-checkout-review-order-table');
		orderTable.classList.add('woocommerce-checkout-review-order-table--collapsed');

		e.preventDefault();
	});

	document.addEventListener('click', function (e) {
		e.preventDefault();

		let nextCheckoutStep = e.target.closest('.multistage-form__buttons');

		if (!nextCheckoutStep) return;

		let multistageForm = nextCheckoutStep.closest('.multistage-form');

		let currentStageBlock = multistageForm.querySelector('.multistage-form__stage-block--current');
		currentStageBlock.classList.remove('multistage-form__stage-block--current', 'stage-block--current');
		currentStageBlock.nextElementSibling.classList.add('multistage-form__stage-block--current', 'stage-block--current');

		let stageCurrentItem = multistageForm.querySelector('.stages__item--current');
		stageCurrentItem.classList.remove('stages__item--current', 'stages__item--disabled');
		stageCurrentItem.nextElementSibling.classList.add('stages__item--current');
	});

	document.addEventListener('click', function (e) {
		let stagesItem = e.target.closest('.stages__item');

		if (!stagesItem || stagesItem.classList.contains('stages__item--disabled')) return;

		let multistageForm = stagesItem.closest('.multistage-form');
		let currentStagesItem = multistageForm.querySelector('.stages__item--current');

		if (stagesItem != currentStagesItem) {
			currentStagesItem.classList.remove('stages__item--current');
			stagesItem.classList.add('stages__item--current');
			let stageIndex = stagesItem.dataset.stageIndex;

			let currentStageBlock = multistageForm.querySelector('.multistage-form__stage-block--current');
			let stageBlock = multistageForm.querySelector(`.multistage-form__stage-block[data-stage-index="${stageIndex}"]`);

			currentStageBlock.classList.remove('multistage-form__stage-block--current', 'stage-block--current');
			stageBlock.classList.add('multistage-form__stage-block--current', 'stage-block--current');
		}
	});
});