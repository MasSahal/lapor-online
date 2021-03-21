$(document).ready(function () {
  "use strict";

  //set fokus ke awal
  $("#usermail").focus();

  $("#form-validate").validate({
    rules: {
      mailnik: {
        required: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      mailnik: {
        required: "Kolom email/NIK wajib di isi!",
      },
      password: {
        required: "Kolom password wajib di isi!",
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
