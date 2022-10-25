$(".select2").select2({ width: "100%" });
$(".select2bln").select2({ width: "15%" });
var id_array = [];
var id_array_use = [];
var kd_unit_global
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
                kd_unit: kd_unit_global
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
      if(id_array_use.length>0){
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
      $("#error_sj").html("");
    }
    });




  $(document).on("click", "#btn_simpan_alamat", function () {
    
    
  });
  
  $(document).ready(function () {
    get_customer();
    
    //$("#bagian_tambah_detail").hide();
    table = $("#tabel_permohonan_kwitansi").DataTable({
      scrollX: true,
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
  
      // Load data for the table's content from an Ajax source
      ajax: {
        url: "permohonan-kwitansi/tabel-permohonan-kwitansi",
        type: "POST",
      },
  
      //Set column definition initialisation properties.
      // columnDefs: [
      //   {
      //     targets: "_all", //first column / numbering column
      //     orderable: false, //set not orderable
      //   },
      // ],
      
    });
    
    $("#tabel_supir tbody").on("click", ".edit_supir", function () {
      var data = table.row($(this).parents("tr")).data();
      var id = $(this).data("id");
      //var unitBarang = $("#unitBarang :selected").text();
  
      $("html, body").animate(
        {
          scrollTop: 1300,
        },
        500
      );
  
      $("#bagian_2_edit").slideDown("slow");
      get_unit_supir2();
      //$("#unitSupir2").val(data[1]);
      kode_supir2 = data[2]; // revisi
      $("#nama_supir2").val(data[1]);
  
      $("#btn_edit").val(id);
    });
    $("#bagian_2_edit").hide();
    
    
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
    $("#error_sj").html("");
    var err = 0;

    var tanggal_mohon = $("#tanggal_mohon").val();
    var nama_customer = $("#nama_customer").val();
    var tanggal_berita_acara = $("#tanggal_berita_acara").val();

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

    if (nama_customer == "") {
      $("#error_nama_customer").html(
        "Nama Customer tidak boleh kosong!"
      );
      err += 1;
    }

    // if (tanggal_berita_acara == "") {
    //   $("#error_tanggal_berita_acara").html(
    //     "Tanggal berita acara tidak boleh kosong!"
    //   );
    //   err += 1;
    // }

    if (id_array_use.length == 0) {
      $("#error_sj").html(
        "Surat jalan harus dipilih terlebih dahulu!"
      );
      err += 1;
    }

   

    if (err == 0) {
      var kg_kirim = $("#kilogram").val();
      var noUrutSpm = $("#no_spm").val();
      $("#modal_konfirmasi_tambah_permohonan_kwitansi").modal("show");
    }
    
  });


  function tambahPermohonanKwitansi() {
    $("#modal_konfirmasi_tambah_permohonan_kwitansi").modal("hide");
  
    var no_mohon = $("#no_mohon").val();
    var tanggal_mohon = $("#tanggal_mohon").val();
    var nama_customer = $("#nama_customer").val();
    var kode_customer = $("#kode_customer").val();
    var tanggal_berita_acara = $("#tanggal_berita_acara").val();
    var alamat_kirim_1 = $("#alamat_kirim_1").val();
    var alamat_kirim_2 = $("#alamat_kirim_2").val();
    var alamat_kirim_3 = $("#alamat_kirim_3").val();
    
  
    $.ajax({
      url: "permohonan-kwitansi/tambah-permohonan-kwitansi",
      type: "post",
      dataType: "text",
  
      data: {
        no_mohon: no_mohon,
        tgl_mohon: tanggal_mohon,
        id_cus: nama_customer,
        k_cus: kode_customer,
        tgl_Area: tanggal_berita_acara,
        alk_cus1: alamat_kirim_1,
        alk_cus2: alamat_kirim_2,
        alk_cus3: alamat_kirim_3,
        id_sj: id_array_use,


        
      },
      success: function (data) {
         var data = JSON.parse(data);
         //console.log(data.status);
         
        var status = data.status;
        // var json = JSON.parse(data);
       // console.log(data.status);
        if (status == "true") {
          // mytable = $("#tabel_permohonan_kwitansi").DataTable();
          // mytable.draw();

          mytable = $("#tabel_sj_detail_dipilih").DataTable();
          $("#tabel_sj_detail_dipilih").dataTable().fnDestroy();
          var tes = ["kosong"];
    table = $("#tabel_sj_detail_dipilih").DataTable({
      scrollX: true,
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
  
      // Load data for the table's content from an Ajax source
      ajax: {
        url: "permohonan-kwitansi/get-sj-detail-pilih",
        type: "POST",
        data: { id: tes
                },
      },
  
    });

    id_array = [];
    id_array_use = [];
    $("#nama_customer").val("").change();
    mytable = $("#tabel_permohonan_kwitansi").DataTable();
    mytable.draw();
          Swal.fire("Berhasil!", "Permintaan Kwitansi berhasil ditambahkan!", "success");
          //sukses_tambah = "yes";
          $("#no_mohon").val("");
          $("#tanggal_mohon").val("");
          $("#nama_customer").val("");
          $("#kode_customer").val("");
          $("#tanggal_berita_acara").val("");
          $("#alamat_kirim_1").val("");
          $("#alamat_kirim_2").val("");
          $("#alamat_kirim_3").val("");
          
        
        } else {
          // alert("a");
          Swal.fire(
            "Gagal!",
            "Nomor Permohnan Kwitansi Jalan sudah ada!",
            "error"
          );
        }
       
        
      },
    });
  }

  var id_sj_batal = "";
$(document).on("click", ".batal_permohonan_kwitansi", function (event) {
  id_sj_batal_permohonan_kwitansi = $(this).data("id");
  //console.log(nomor_sj_batal);

  $("#modal_konfirmasi_batal_permohonan_kwitansi").modal("show");
});

function batalPermohonanKwitansi() {
  $("#modal_konfirmasi_batal_permohonan_kwitansi").modal("hide");
  //var table = $("#tabel_sj").DataTable();

  $.ajax({
    url: "permohonan-kwitansi/batal-permohonan-kwitansi",
    data: {
      id: id_sj_batal_permohonan_kwitansi,
    },
    type: "post",
    success: function (data) {
      var json = JSON.parse(data);
      status = json.status;
      if (status == "success") {
        mytable = $("#tabel_permohonan_kwitansi").DataTable();
        mytable.draw();

        $("#" + id_sj_batal_permohonan_kwitansi)
          .closest("tr")
          .remove();
        Swal.fire("Berhasil!", "Permohonan Kwitansi berhasil dibatalkan", "success");
      } else {
        // alert("Failed");
        Swal.fire("Information", "Permohonan Kwitansi sudah dibatalkan", "warning");
        return;
      }
    },
  });
}







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

 