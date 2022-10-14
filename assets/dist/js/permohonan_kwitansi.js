$(".select2").select2({ width: "100%" });
$(".select2bln").select2({ width: "15%" });
var id_array = [];
var id_array_use = [];
var id_array_dipilih = [];
$(".select2bs4").select2({
  theme: "bootstrap4",
});

$(document).on("click", "#btn_tambah_detail", function () {
  // sampe sini 13 Oktober 2022 
  id_array = [];
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
                 },
      },
  
    });
   
  }
    
    
  });



  $(document).on("click", "#btn_simpan_sj_detail", function () {
    var k_cus = $("#kode_customer").val();
    id_array_use = id_array;
    id_array_dipilih = id_array_use;
      
      
      $("#modal_detail").modal("hide");

      $("#tabel_sj_detail_dipilih").dataTable().fnDestroy();
    table = $("#tabel_sj_detail_dipilih").DataTable({
      //scrollX: true,
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
  
      // Load data for the table's content from an Ajax source
      ajax: {
        url: "permohonan-kwitansi/get-sj-detail-pilih",
        type: "POST",
        data: { id: id_array_use,
                k_cus: k_cus },
      },
  
    });
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
           // console.log(id_cust);
            data = JSON.parse(data);
          $("#kode_customer").val(data.kode_customer);
        },
      });
  });


  $(document).on("click", ".pilih_sj", function (event) {
    var id = $(this).data("id");
    if(id_array.includes(id)){

    }else{
      id_array.push(id);
    }
    
    
    // Sampe sini 12 Oktober 2022, tinggal masukin sj yg di pilih 
    
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

 