$(document).ready(function () {
  "use strict";

  $(function () {
	$("#kategori").focus();
	$("#form-validate").validate({
	  rules: {
		kategori: {
		  required: true,
		},
	  },
	  messages: {
		kategori: {
		  required: "Kolom Kategori Wajib Diisi"
		},
	  errorElement: "span",
	  errorPlacement: function (error, element) {
		error.addClass("invalid-feedback");
		element.closest(".form-group").append(error);
	  },
	  highlight: function (element, errorClass, validClass) {
		$(element).addClass("is-invalid");
	  },
	  unhighlight: function (element, errorClass, validClass) {
		$(element).removeClass("is-invalid");
	  },
	});
  });
});
