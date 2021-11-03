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
});