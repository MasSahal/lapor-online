$(document).ready(function () {
  "use strict";

  //set fokus ke awal
  $("#usermail").focus();

  $("#form-validate").validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
      },
    },
    messages: {
      email: {
        required: "Kolom email wajib di isi!",
        email: "Masukan email dengan benar",
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
