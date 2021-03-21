$(document).ready(function () {
  "use strict";

  $(function () {
    $("#nik").focus();
    $("#form-validate").validate({
      rules: {
        nik: {
          required: true,
          minlength: 16,
          maxlength: 17,
        },
        username: {
          required: true,
          minlength: 3,
          maxlength: 30,
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
          minlength: "Masukan NIK dengan benar!",
          maxlength: "Masukan NIK dengan benar!",
        },
        username: {
          required: "Kolom nama wajib di isi!",
          minlength: "Nama terlalu pendek",
          maxlength: "Nama terlalu panjang",
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
