jQuery(document).ready(function ($) {
	ACF_Block_ImageMap();

	function ACF_Block_ImageMap() {
		// Record clicks on image
		$(".image-map img").on("click", function (e) {
			// Get click position on image
			let bcr = this.getBoundingClientRect();

			$(".marker").remove();

			// Calculate positions in percentage
			let top = Math.round(((e.clientY - bcr.top) / bcr.height) * 100);
			let left = Math.round(((e.clientX - bcr.left) / bcr.width) * 100);

			// Update corresponding marker values
			$(".active-marker td[data-name='top'] input").val(top);
			$(".active-marker td[data-name='left'] input").val(left);

			// Visualise marker on clik
			$(this)
				.closest(".image-wrap")
				.append(
					"<div class='marker' style='top:" +
						top +
						"%; left: " +
						left +
						"%;'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill='#43bca9' stroke='#000' stroke-width='1.01' d='M10,0.5 C6.41,0.5 3.5,3.39 3.5,6.98 C3.5,11.83 10,19 10,19 C10,19 16.5,11.83 16.5,6.98 C16.5,3.39 13.59,0.5 10,0.5 L10,0.5 Z'></path><circle fill='#000' stroke='#000' cx='10' cy='6.8' r='2.3'></circle></svg></div>"
				);
		});

		$("body").on("focus", ".image-markers input", function (e) {
			$(".image-markers tr").removeClass("active-marker");

			$(this).closest("tr").addClass("active-marker");

			let top = $(this)
				.closest("tr")
				.find(" td[data-name='top'] input")
				.val();
			let left = $(this)
				.closest("tr")
				.find(" td[data-name='left'] input")
				.val();

			$(".marker").remove();
			$(this)
				.closest(".acf-field-group")
				.find(".image-wrap")
				.append(
					"<div class='marker' style='top:" +
						top +
						"%; left: " +
						left +
						"%;'><svg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill='#43bca9' stroke='#000' stroke-width='1.01' d='M10,0.5 C6.41,0.5 3.5,3.39 3.5,6.98 C3.5,11.83 10,19 10,19 C10,19 16.5,11.83 16.5,6.98 C16.5,3.39 13.59,0.5 10,0.5 L10,0.5 Z'></path><circle fill='#000' stroke='#000' cx='10' cy='6.8' r='2.3'></circle></svg></div>"
				);
		});
	}
});
