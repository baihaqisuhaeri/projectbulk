var kd_unit_global;

$(document).ready(function () {
    get_customer();
  });

$(".select2").select2({ width: "100%" });
$(".select2bs4").select2({
  theme: "bootstrap4",
});

$("#nama_customer").on("change", function () {
  $("#error_nama_customer").html("");
    var id_cust = $("#nama_customer").val();
    $.ajax({
        url: "permohonan-kwitansi/get-nama-customer",
        type: "post",
        data: { id_cust: id_cust },
        success: function (data) {
           // console.log(id_cust);
            data = JSON.parse(data);
          $("#kode_customer").val(data.kode_customer);
          set_tgl_mohon();
          kd_unit_global = data.kd_unit;
        },
      });

      
  });


  $(document).on("click", "#btn_tambah_detail", function () {
    // sampe sini 13 Oktober 2022 
    //id_array = [];
    var err = 0;
    var k_cus = $("#kode_customer").val();
    //console.log(k_cus);
    if (k_cus == "") {
      $("#error_nama_customer").html(
        "Customer harus dipilih terlebih dahulu"
      );
      err += 1;
    }
    if (err == 0) {
      
      $("#modal_detail").modal("show");
      $("#tabel_sj_detail").dataTable().fnDestroy();
      table = $("#tabel_sj_detail").DataTable({
        //scrollX: true,
        processing: true, //Feature control the processing indicator.
        serverSide: true, //Feature control DataTables' server-side processing mode.
        order: [], //Initial no order.
    
        // Load data for the table's content from an Ajax source
        ajax: {
          url: "permohonan-kwitansi/get-sj-detail",
          type: "POST",
          data: { k_cus: k_cus,
                  kd_unit: kd_unit_global
                   },
        },
    
      });
     
    }
      
      
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

  