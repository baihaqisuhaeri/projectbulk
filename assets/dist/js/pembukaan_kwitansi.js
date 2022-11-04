$(document).ready(function () {
    get_customer();
  });

$(".select2").select2({ width: "100%" });
$(".select2bs4").select2({
  theme: "bootstrap4",
});

//List of function

function get_customer() {
    $.ajax({
      url: "pembukaan-kwitansi/customer",
      type: "post",
      
      success: function (data) {
        $("#nama_customer").html(data);
      },
    });
  }