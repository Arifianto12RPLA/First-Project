$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id-oper").val($(this).data("id"));
  $(".modal-body #user").val($(this).data("username"));
  $(".modal-body #imel").val($(this).data("email"));
  $(".modal-body #pass").val($(this).data("password"));
  $(".modal-body #telpon").val($(this).data("telepon"));
  $(".modal-body #address").val($(this).data("alamat"));
});
$(document).on("click", "#btn-hapus", function () {
  $(".modal-footer #id-admin").val($(this).data("id"));
});

$(document).ready(function () {
  $(".dropify").dropify();
});
