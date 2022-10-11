$(".select2").select2({ width: "100%" });
$(".select2bln").select2({ width: "15%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

$(document).on("click", "#btn_tambah_detail", function () {

  var err = 0;
  var kode_customer = $("#kode_customer").val();
  console.log(kode_customer);
  if (kode_customer == "") {
    $("#error_nama_customer").html(
      "Customer harus dipilih terlebih dahulu"
    );
    err += 1;
  }
  if (err == 0) {
    $("#modal_detail").modal("show");
  }
    
    
  });

  $(document).on("click", "#btn_simpan_alamat", function () {
    
    
  });
  
  $(document).ready(function () {
    get_customer();
    $("#bagian_2_edit").hide();
    //$("#bagian_tambah_detail").hide();
    
    
  });

 



$("#nama_customer").on("change", function () {
  $("#error_nama_customer").html("");
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

 