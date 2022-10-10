$(document).on("click", "#btn_tambah_detail", function () {
    $("#modal_detail").modal("show");
    
  });

  $(document).ready(function () {
    get_customer();
    
  });

  $(".select2").select2({ width: "100%" });
$(".select2bln").select2({ width: "15%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

$("#nama_customer").on("change", function () {
    var id_cust = $("#nama_customer").val();
    $.ajax({
        url: "permohonan-kwitansi/get-nama-customer",
        type: "post",
        data: { id_cust: id_cust },
        success: function (data) {
            console.log(id_cust);
            data = JSON.parse(data);
          $("#kode_customer").val(data.kode_customer);
        },
      });
  });

// List of Function

  function get_customer() {
    $.ajax({
      url: "permohonan-kwitansi/customer",
      type: "post",
      //data: { unitSj: unitSj },
      success: function (data) {
        $("#nama_customer").html(data);
      },
    });
  }



// End of List of Function

 