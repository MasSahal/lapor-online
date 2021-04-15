$(document).ready(function () {
  "use strict";

  $(function () {
    $("#nik").focus();
    $("#form-validate").validate({
      rules: {
        nik: {
          required: true,
          digits: true,
        },
        email: {
          required: true,
          email: true,
        },
        password: {
          required: true,
          minlength: 8,
        },
        terms: {
          required: true,
        },
      },
      messages: {
        nik: {
          required: "Kolom NIK wajib di isi!",
          digits: "Masukan 16 digit NIK dengan benar!",
        },
        email: {
          required: "Kolom email wajib di isi!",
          email: "Masukan email dengan benar!",
        },
        password: {
          required: "Kolom password wajib di isi!",
          minlength: "Password terlalu pendek",
        },
        terms: "Silahkan menyetujui kebijakan kami",
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
