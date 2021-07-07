$(document).ready(function () {
	var baseUrl = "http://localhost/shopit/";
	load_data();

	function load_data(query) {
		$.ajax({
			url: baseUrl + "catalog/fetch",
			method: "POST",
			data: { query: query },
			success: function (data) {
				$("#result").html(data);
			},
		});
	}
});

$(document).on("click", ".delete-product", function (e) {
	if (!confirm("Do you want to delete the product?")) {
		e.preventDefault();
	}
});
