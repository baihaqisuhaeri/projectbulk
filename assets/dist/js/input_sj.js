var table_alamat;





$(".select2").select2({ width: "100%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

get_unit_sj();

function get_unit_sj() {
  $.ajax({
    url: "input-sj/unit-sj",
    success: function (data) {
      $("#unitSj").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

$("#unitSj").on("change", function () {
    //$("#data_plafon").slideUp("slow");
  
    var unit = $("#unitSj").val();
    get_customer();
   
  });

$(document).on("click","#btnAlamatKirim",function() {
  $('#modal_alamat').modal('show');
  var k_cus = $("#nama_customer").val().split("|");
  $("#no_customer_modal").val(k_cus[0]);
  $("#nama_customer_modal").val(k_cus[1]);
  k_cus = k_cus[0];
  

  $(document).ready(function () {
    //datatables
    $("#tabel_alamat_kirim").dataTable().fnDestroy();
    table_alamat = $("#tabel_alamat_kirim").DataTable({
      
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
      
  
      // Load data for the table's content from an Ajax source
      ajax: {
        url: "input-sj/tabel-alamat-kirim",
        type: "POST",
        data: {
          k_cus: k_cus,
        },
      },
    });
  
    $("#tabel_alamat_kirim tbody").on("click", "#pilih_alamat_kirim_modal", function () {
      var data = table_alamat.row($(this).parents("tr")).data();
     // var id = $(this).data("id");
      
  
  
      $("#npwp_modal").val(data[2]);
      $("#alamat_kirim_ke_modal").val(data[3]);
      $("#alamat1_modal").val(data[4]);
      $("#alamat2_modal").val(data[5]);
      $("#alamat3_modal").val(data[6]);
      
      
  
      $("#btn_edit").val(id);
    });
    $("#npwp_modal").val("");
      $("#alamat_kirim_ke_modal").val("");
      $("#alamat1_modal").val("");
      $("#alamat2_modal").val("");
      $("#alamat3_modal").val("");
    
  });
});
  

function get_customer() {
    var unitSj = $("#unitSj").val();
  
    $.ajax({
      url: "input-sj/customer",
      type: "post",
      data: { unitSj: unitSj },
      success: function (data) {
        $("#nama_customer").html(data);
      },
    });
  }
