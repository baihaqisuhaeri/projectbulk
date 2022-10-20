$(".select2").select2({ width: "100%" });
$(".select2bln").select2({ width: "15%" });
var id_array = [];
var id_array_use = [];
//var id_array_dipilih = [];
var bulan_aktif_global;
$(".select2bs4").select2({
  theme: "bootstrap4",
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
                 },
      },
  
    });
   
  }
    
    
  });



  $(document).on("click", "#btn_simpan_sj_detail", function () {
    var k_cus = $("#kode_customer").val();
    id_array_use = id_array;
    //id_array_dipilih = id_array_use;
      
      
      $("#modal_detail").modal("hide");

      $("#tabel_sj_detail_dipilih").dataTable().fnDestroy();
    table = $("#tabel_sj_detail_dipilih").DataTable({
      scrollX: true,
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
    if(id_array_use.length>0){
      $.ajax({
        url: "permohonan-kwitansi/set-alamat-dipilih",
        type: "post",
        data: { id: id_array_use[0] },
        success: function (data) {
           // console.log(id_cust);
            data = JSON.parse(data);
          $("#alamat_kirim_1").val(data.alk_cus1);
          $("#alamat_kirim_2").val(data.alk_cus2);
          $("#alamat_kirim_3").val(data.alk_cus3);
        },
      });
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
           // console.log(id_cust);
            data = JSON.parse(data);
          $("#kode_customer").val(data.kode_customer);
          set_tgl_mohon();
        },
      });

      
  });


  $(document).on("click", ".pilih_sj", function (event) {
    var id = $(this).data("id");
    var id_awal = id_array[0];
    if(id_array.length==0){

    
    if(id_array.includes(id)){

    }else{
      id_array.push(id);
    }
  }else{
    $.ajax({
      url: "permohonan-kwitansi/validasi-alamat-kirim",
      type: "post",
      data: { id_awal: id_awal,
              id_cek: id },
      success: function (data) {
         // console.log(id_cust);
          data = JSON.parse(data);
          console.log(data.status);
        if(data.status=="success"){
          //console.log("aneh");
          if(id_array.includes(id)){
           // console.log("aneh");
           Swal.fire("Warning!", "Alamat kirim sudah dipilih", "warning");
           //sampe sini 19 Oktober, tinggal bikin no mohon otomatisnya
          }else{
          //  console.log("aneh2");
            id_array.push(id);
          }
        }else{
          
          Swal.fire("Gagal!", "Alamat kirim harus sama dengan alamat yang pertama kali dipilih!", "error");
        }
      },
    });
  }
    
    
    // Sampe sini 12 Oktober 2022, tinggal masukin sj yg di pilih 
    
  });


  $("#tabel_sj_detail_dipilih tbody").on("click", ".hapus_pilih_sj", function () {
    var id = $(this).data("id");
    var index = id_array_use.indexOf(id); 
    id_array_use.splice(index,1);
    //console.log(id);
    $(this).closest('tr').remove();

  });


  $(document).on("submit", "#tambahPermohonanKwitansi", function (e) {
    e.preventDefault();
    $("#error_no_mohon").html("");
    $("#error_tanggal_mohon").html("");
    $("#error_nama_customer").html("");
    $("#error_kode_customer").html("");
    $("#error_tanggal_berita_acara").html("");
    $("#error_alamat_kirim_1").html("");
    $("#error_alamat_kirim_2").html("");
    $("#error_alamat_kirim_3").html("");
    var err = 0;

    var tanggal_mohon = $("#tanggal_mohon").val();

    console.log($("#tanggal_mohon").val().substring(0, 7));
    if (tanggal_mohon == "") {
      $("#error_tanggal_mohon").html(
        "Tanggal Mohon tidak boleh kosong!"
      );
      err += 1;
    }else if($("#tanggal_mohon").val().substring(0, 7)< bulan_aktif_global.substring(0, 7)){
      $("#error_tanggal_mohon").html(
        "Tanggal Mohon tidak boleh lebih kecil dari tanggal aktif unit!"
      );
      err += 1;
    }
    
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


  function set_tgl_mohon() {
    //var k_cus = $("#kode_customer").val();
    var id_cus = $("#nama_customer").val();
    
    $.ajax({
      url: "permohonan-kwitansi/set-tgl-mohon",
      type: "post",
      data: { id_cus: id_cus},
      success: function (data) {
        var data = JSON.parse(data);
        console.log(data.tgl_aktif);
        //var p = dateString.split(/\D/g)
        bulan_aktif_global = data.tgl_aktif;
        $("#tanggal_mohon").val(data.tgl_aktif);
       
      },
    });
  }



// End of List of Function

 