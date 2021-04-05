$(document).ready(function () {
  "use strict";

  $(function () {
    $("#subjek").focus();
    $("#form-validate").validate({
      rules: {
        subjek: {
          required: true,
          minlength: 10,
        },
        isi: {
          required: true,
        },
        kategori: {
          required: true,
        },
        file: {
          required: true,
          extension: "jpg|jpeg|png",
        },
      },
      messages: {
        subjek: {
          required: "Kolom wajib di isi!",
          minlength: "Judul terlalu pendek!",
        },
        isi: {
          required: "Kolom wajib di isi!",
        },
        kategori: {
          required: "Kolom wajib di isi!",
        },
        file: {
          required: "Mohon sertakan foto pendukung!",
          extension: "File tidak valid!",
        },
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
