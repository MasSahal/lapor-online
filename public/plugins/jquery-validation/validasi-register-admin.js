$(document).ready(function () {
  "use strict";

  $(function () {
    $("#nik").focus();
    $("#form-validate").validate({
      rules: {
        name: {
          required: true,
          minlength: 3,
        },
        username: {
          required: true,
        },
        email: {
          required: true,
          email: true,
        },
        telp: {
          required: true,
        },
        role: {
          required: true,
        },
        password: {
          required: true,
          minlength: 8,
        },
      },
      messages: {
        name: {
          required: "Kolom NIK wajib di isi!",
          minlength: "Masukan NIK dengan benar!",
        },
        username: {
          required: "Kolom nama wajib di isi!",
        },
        telp: {
          required: "Kolom noor telepon wajib di isi!",
        },
        role: {
          required: "Kolom role wajib di isi!",
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
