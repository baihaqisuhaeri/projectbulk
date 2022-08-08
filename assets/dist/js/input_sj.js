var table_alamat;
var harga_po="";
var spm_brlk="";
$('.modal').css('overflow-y', 'auto');
var volume_spm="kosong";
var tk_sj = "";
get_unit_marketing();
get_suplier();
get_ppn();


$(".select2").select2({ width: "100%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

$("#nama_customer").on("change", function () {

  get_no_spm();
 
});


function get_no_spm() {
  var kodeCustomer = $("#nama_customer").val().split("_");
  kodeCustomer = kodeCustomer[0];
  $.ajax({
    url: "input-sj/get-no-spm",
    type: "post",
    data: { kodeCustomer: kodeCustomer
             },
    success: function (data) {
      $("#no_spm").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

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

function get_mobil_sj() {
  var unitSj = $("#unitSj").val();
  $.ajax({
    url: "input-sj/get-mobil-sj",
    type: "POST",
        data: {
          unitSj: unitSj
        },
    success: function (data) {
      $("#no_kendaraan").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_supir_sj() {
  var unitSj = $("#unitSj").val();
  $.ajax({
    url: "input-sj/get-supir-sj",
    type: "POST",
        data: {
          unitSj: unitSj
        },
    success: function (data) {
      $("#nama_supir").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_barang_sj() {
  var unitSj = $("#unitSj").val();
  $.ajax({
    url: "input-sj/get-barang-sj",
    type: "POST",
        data: {
          unitSj: unitSj
        },
    success: function (data) {
      $("#kode_barang").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_unit_marketing() {
 
  $.ajax({
    url: "input-sj/get-unit-marketing",
    
    success: function (data) {
      $("#unit_marketing").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_suplier() {
 
  $.ajax({
    url: "input-sj/get-suplier",
    
    success: function (data) {
      $("#suplier").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_ppn() {
 
  $.ajax({
    url: "input-sj/get-ppn",
    
    success: function (data) {
      data = JSON.parse(data);
      $("#ppn").val(data[0].ppn_persen+" %");
      //$("#unit_spm").html(data);
    },
  });
}



$("#unitSj").on("change", function () {
    //$("#data_plafon").slideUp("slow");
  
    
    get_customer();
    get_mobil_sj();
    get_supir_sj();
    get_barang_sj();
    
   
  });
var k_cus;
$(document).on("click","#btnAlamatKirim",function() {
  $("#error_nama_customer").html("");

  var namaCustomer = $("#nama_customer").val();
  
  var err = 0;
  
    if ( namaCustomer == null || namaCustomer == "") {
      $("#error_nama_customer").html("Nama customer harus dipilih terlebih dahulu!");
      err += 1;
    }

    if (err == 0) {
  
  $('#modal_alamat').modal('show');
  
  k_cus = $("#nama_customer").val().split("_");
  $("#no_customer_modal").val(k_cus[0]);
  $("#nama_customer_modal").val(k_cus[1]);
  k_cus = k_cus[0];
  
  

  $(document).ready(function () {
    //datatables
    $("#tabel_alamat_kirim").dataTable().fnDestroy();
    table_alamat = $("#tabel_alamat_kirim").DataTable({
      
      // scrollX: true,
      processing: true, //Feature control the processing indicator.
      serverSide: true, //Feature control DataTables' server-side processing mode.
      order: [], //Initial no order.
    //   "columnDefs": [
    //     {
    //         "targets": [7,8,9],
    //         "visible": false,
    //         "searchable": false
    //     }
    // ],
      
      
  
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
      var id = $(this).data("id");
     // var id = $(this).data("id");
      
  
  
      $("#npwp_modal").val(data[2]);
      $("#alamat_kirim_ke_modal").val(data[3]);
      $("#alamat_kirim1_modal").val(data[4]);
      $("#alamat_kirim2_modal").val(data[5]);
      $("#alamat_kirim3_modal").val(data[6]);
      
      
      
      $("#btn_edit").val(id);
      
    });
    $("#npwp_modal").val("");
      $("#alamat_kirim_ke_modal").val("");
      $("#alamat_kirim1_modal").val("");
      $("#alamat_kirim2_modal").val("");
      $("#alamat_kirim3_modal").val("");
      
    
  });
}
});


var unitSj;
function get_customer() {
     unitSj = $("#unitSj").val();
  
    $.ajax({
      url: "input-sj/customer",
      type: "post",
      data: { unitSj: unitSj },
      success: function (data) {
        $("#nama_customer").html(data);
      },
    });
  }

 
  $(document).on("click","#btn_tambah_alamat",function() {
    $('#modal_tambah_alamat').modal('show');
    //$('.modal').css('overflow-y', 'auto');
    $('#modal_alamat').modal('hide');
   
    //alert( table_alamat.row( ':last', { order: 'applied' } ).data() );
    var dataTablesAlamat = table_alamat.row( ':last-child' ).data();
    if(dataTablesAlamat == null){
      alamatBaru = "00";
    }else{    
    alamatBaru = parseInt(dataTablesAlamat[3]);
    alamatBaru+=1;
    if(alamatBaru<10){
      alamatBaru = "0" +alamatBaru;
    }
  }
  $.ajax({
    url: "input-sj/get-nama-customer",
    type: "post",
    data: { unitSj: unitSj,
            k_cus: k_cus
             },
    success: function (data) {
      //$("#nama_customer").html(data);
       data = JSON.parse(data);
       $("#nomor_customer_baru").val(data.k_Cus);
       $("#nama_customer_baru").val(data.n_cus);
       $("#nama_faktur_pajak_baru").val(data.nmcab);
       $("#alamat1_customer_baru_hidden").val(data.al1_cus);
       $("#alamat2_customer_baru_hidden").val(data.al2_cus);
       $("#alamat3_customer_baru_hidden").val(data.al3_cus);

       

       $("#error_alamat_kirim1_baru").html("");
       $("#error_alamat_kirim2_baru").html("");
       $("#error_alamat_kirim3_baru").html("");
       $("#error_npwp_baru").html("");

       $("#alamat_kirim1_baru").val("");
       $("#alamat_kirim2_baru").val("");
       $("#alamat_kirim3_baru").val("");
       $("#npwp_baru").val("");
        
       //console.log( $("#alamat1_customer_baru_hidden").val());
      
    },
  });

      $("#alamat_kirim_ke_baru").val(alamatBaru);
      //$("#nama_faktur_pajak_baru").val(dataTablesAlamat[1]);
      
      
   
    
    
  });

  $(document).on("click","#btn_kembali",function() {
    $('#modal_tambah_alamat').modal('hide');
    $('#modal_alamat').modal('show');
    //$('.modal').css('overflow-y', 'auto');
  });

  $(document).on("click","#btn_simpan_alamat_baru",function() {
    

    $("#error_alamat_kirim1_baru").html("");
    $("#error_alamat_kirim2_baru").html("");
    $("#error_alamat_kirim3_baru").html("");
    $("#error_npwp_baru").html("");
  
    var kodeCustomerBaru = $("#nomor_customer_baru").val();
    var namaCustomerBaru = $("#nama_customer_baru").val();
    var alamatKirimKeBaru = $("#alamat_kirim_ke_baru").val();
    var namaCabangBaru = $("#nama_faktur_pajak_baru").val();
    var npwpBaru  = $("#npwp_baru").val();
    var alamatKirim1 = $("#alamat_kirim1_baru").val();
    var alamatKirim2 = $("#alamat_kirim2_baru").val();
    var alamatKirim3 = $("#alamat_kirim3_baru").val();
    var alamat1CustomerBaru = $("#alamat1_customer_baru_hidden").val();
    var alamat2CustomerBaru = $("#alamat2_customer_baru_hidden").val();
    var alamat3CustomerBaru = $("#alamat3_customer_baru_hidden").val();
    
  
    var err = 0;
  
    if ( alamatKirim1 == "") {
      $("#error_alamat_kirim1_baru").html("Alamat kirim 1 tidak boleh kosong!");
      err += 1;
    }

   

    

    if ( npwpBaru == "") {
      $("#error_npwp_baru").html("NPWP tidak boleh kosong!");
      err += 1;
    }
    

  
    if (err == 0) {
      $('#modal_konfirmasi_tambah_alamat').modal('show');
      //$('.modal').css('overflow-y', 'auto');
  
    } 

  });

  function tambahAlamat(){
    $('#modal_konfirmasi_tambah_alamat').modal('hide');
      
    var kodeCustomerBaru = $("#nomor_customer_baru").val();
    var namaCustomerBaru = $("#nama_customer_baru").val();
    var alamatKirimKeBaru = $("#alamat_kirim_ke_baru").val();
    var namaCabangBaru = $("#nama_faktur_pajak_baru").val();
    var npwpBaru  = $("#npwp_baru").val();
    var alamatKirim1 = $("#alamat_kirim1_baru").val();
    var alamatKirim2 = $("#alamat_kirim1_baru").val();
    var alamatKirim3 = $("#alamat_kirim1_baru").val();
    var alamat1CustomerBaru = $("#alamat1_customer_baru_hidden").val();
    var alamat2CustomerBaru = $("#alamat2_customer_baru_hidden").val();
    var alamat3CustomerBaru = $("#alamat3_customer_baru_hidden").val();

    
      
      $.ajax({
        url: "input-sj/tambah-alamat-baru",
        type: "post",
        data: {
          kodeCustomerBaru: kodeCustomerBaru,
          namaCustomerBaru: namaCustomerBaru,
          alamatKirimKeBaru: alamatKirimKeBaru,
          namaCabangBaru: namaCabangBaru,
          npwpBaru: npwpBaru,
          alamatKirim1: alamatKirim1,
          alamatKirim2: alamatKirim2,
          alamatKirim3: alamatKirim3,
          alamat1CustomerBaru: alamat1CustomerBaru,
          alamat2CustomerBaru: alamat2CustomerBaru,
          alamat3CustomerBaru: alamat3CustomerBaru,
        },
        success: function (data) {
          var json = JSON.parse(data);
          var status = json.status;
          if (status == "true") {
            mytable = $("#tabel_alamat_kirim").DataTable();
            mytable.draw();
            Swal.fire("Berhasil!", "Alamat baru berhasil ditambahkan!", "success");
            $('#modal_tambah_alamat').modal('hide');
            $('#modal_alamat').modal('hide');
          } else {
           // alert("a");
            Swal.fire("Gagal!", "Supir sudah ada di unit yang sama!", "error");
          }
        },
      });
    
  }

  $(document).on("click","#btn_simpan_alamat",function() {
    
    $("#error_alamat_kirim_ke_modal").html("");
    $("#error_alamat_kirim1_modal").html("");
    $("#error_alamat_kirim2_modal").html("");
    $("#error_alamat_kirim3_modal").html("");
    $("#error_npwp_modal").html("");
    

    var alamatKirimKeModal = $("#alamat_kirim_ke_modal").val();
    var alamatKirim1Modal = $("#alamat_kirim1_modal").val();
    var alamatKirim2Modal = $("#alamat_kirim2_modal").val();
    var alamatKirim3Modal = $("#alamat_kirim3_modal").val();
    var npwpModal = $("#npwp_modal").val();

    var err = 0;

    if ( alamatKirimKeModal == "") {
      $("#error_alamat_kirim_ke_modal").html("Alamat kirim ke- tidak boleh kosong!");
      err += 1;
    }

    

    if ( npwpModal == "") {
      $("#error_npwp_modal").html("NPWP tidak boleh kosong!");
      err += 1;
    }

    if (err == 0) {
      $('#modal_alamat').modal('hide');
      
      $("#alamat1").val(alamatKirim1Modal);
      $("#alamat2").val(alamatKirim2Modal);
      $("#alamat3").val(alamatKirim3Modal);
      $("#kode_alamat").val(alamatKirimKeModal);
      $("#npwp").val(npwpModal);


  
    } 

  });


  $("#no_spm").on("change", function () {
   // console.log($("#no_spm").val());
    var noUrutSpm = $("#no_spm").val();
    $.ajax({
      url: "input-sj/get-data-spm",
      type: "post",
      dataType: "JSON",
      data: { noUrutSpm: noUrutSpm
             },
      success: function (data) {
      //  data = JSON.parse(data);
        //console.log(data[0].tgl_po);
        $("#nomor_po").val(data[0].no_po);
        $("#tanggal_po").val(data[0].tgl_po);
        spm_brlk = data[0].spm_brlk;
        harga_po = data[0].harga_po;
        if(data[0].tk=="T"){
          $("#rd_tunai").prop("checked", true);
          tk_sj = data[0].tk;
        }else if(data[0].tk=="K"){
          $("#rd_kredit").prop("checked", true);
          tk_sj = data[0].tk;
        }
       
      },
    });
  });
  


  $(document).on("submit", "#tambahSuratJalan", function (e) {
   // console.log(k_cus);
   e.preventDefault();

    $("#error_unitSj").html("");
    $("#error_nama_customer").html("");
    $("#error_no_spm").html("");
    $("#error_no_surat_jalan").html("");
    $("#error_tanggal_surat_jalan").html("");
    $("#error_no_kendaraan").html("");
    $("#error_unit_marketing").html("");
    $("#error_nama_supir").html("");
    $("#error_kode_barang").html("");
    $("#error_jumlah").html("");
    $("#error_keterangan").html("");
    $("#error_suplier").html("");
   
    $("#error_no_segel").html("");
    $("#error_pressure").html("");
    $("#error_temperatur").html("");
    $("#error_nilai_persen_pengambilan").html("");
    $("#error_nilai_persen_berangkat").html("");

    var err = 0;

    var unitSj = $("#unitSj").val();
    var nama_customer = $("#nama_customer").val();
    var no_spm = $("#no_spm").val();
    var no_surat_jalan = $("#no_surat_jalan").val();
    var tanggal_surat_jalan = $("#tanggal_surat_jalan").val();
    var no_kendaraan = $("#no_kendaraan").val();
    var unit_marketing = $("#unit_marketing").val();
    var nama_supir = $("#nama_supir").val();
    var kode_barang = $("#kode_barang").val();
    var jumlah = $("#jumlah").val();
    var keterangan = $("#keterangan").val();
    var suplier = $("#suplier").val();
    var no_faktur = $("#no_faktur").val();
    var no_segel = $("#no_segel").val();
    var pressure = $("#pressure").val();
    var temperatur = $("#temperatur").val();
    var nilai_persen_pengambilan = $("#nilai_persen_pengambilan").val();
    var nilai_persen_berangkat = $("#nilai_persen_berangkat").val();
    

    if (unitSj == "") {
      $("#error_unitSj").html("Unit tidak boleh kosong!");
      err += 1;
    }
    if (nama_customer == "") {
      $("#error_nama_customer").html("Nama Customer harus dipilih!");
      err += 1;
    }
    if (no_spm == "") {
      $("#error_no_spm").html("Nomor SPM harus dipilih!");
      err += 1;
    }
    
    if (tanggal_surat_jalan == "") {
      $("#error_tanggal_surat_jalan").html("Tanggal Surat Jalan tidak boleh kosong!");
      err += 1;
    }
    if (no_kendaraan == "") {
      $("#error_no_kendaraan").html("Kendaraan harus dipilih!");
      err += 1;
    }
    if (unit_marketing == "") {
      $("#error_unit_marketing").html("Unit marketing tidak boleh kosong!");
      err += 1;
    }
    if (nama_supir == "") {
      $("#error_nama_supir").html("Nama Supir harus dipilih!");
      err += 1;
    }
    if (kode_barang == "") {
      $("#error_kode_barang").html("Barang harus dipilih!");
      err += 1;
    }
    if (jumlah == "") {
      $("#error_jumlah").html("Jumlah tidak boleh kosong!");
      err += 1;
    }
    if (keterangan == "") {
      $("#error_keterangan").html("Keterangan tidak boleh kosong!");
      err += 1;
    }
    if (suplier == "") {
      $("#error_suplier").html("Suplier tidak boleh kosong!");
      err += 1;
    }
    
    if (no_segel == "") {
      $("#error_no_segel").html("Nomor Segel tidak boleh kosong!");
      err += 1;
    }
    if (pressure == "") {
      $("#error_pressure").html("Pressure tidak boleh kosong!");
      err += 1;
    }
    if (temperatur == "") {
      $("#error_temperatur").html("Temperatur tidak boleh kosong!");
      err += 1;
    }
    if (nilai_persen_pengambilan == "") {
      $("#error_nilai_persen_pengambilan").html("Nilai pengambilan tidak boleh kosong!");
      err += 1;
    }
    if (nilai_persen_berangkat == "") {
      $("#error_nilai_persen_berangkat").html("Nilai berangkat tidak boleh kosong!");
      err += 1;
    }
    if (err == 0) {
      
      var kg_kirim = $("#kilogram").val();
    var noUrutSpm = $("#no_spm").val();
    $.ajax({
      url: "input-sj/get-volume-spm",
      type: "post",
      dataType: "JSON",
      data: { noUrutSpm: noUrutSpm
             },
      success: function (data) {
         
        //console.log(data.volume_spm);
        
        if(parseFloat(kg_kirim)> data.volume_spm){
          $("#error_kilogram").html("Maaf maksimal volume yang bisa diisi adalah " +parseFloat(data.volume_spm)+" kg");
        }else{
          $("#error_kilogram").html("");
          $('#modal_konfirmasi_tambah_sj').modal('show');
        }
       
      },
    });
  
    } 








    

  });

  function tambahSj(){
    $('#modal_konfirmasi_tambah_sj').modal('hide');
      
    var unitSj = $("#unitSj").val();
    var customer = $("#nama_customer").val().split("_");
    var alamat_kirim1 = $("#alamat1").val();
    var alamat_kirim2 = $("#alamat2").val();
    var alamat_kirim3 = $("#alamat3").val();
    var k_altk = $("#kode_alamat").val();
    var npwp = $("#npwp").val();

    var no_po = $("#nomor_po").val();
    var tgl_po = $("#tanggal_po").val();
    var ppn = $("#ppn").val();
    
    var no_spm = $("#no_spm").val();
    var no_surat_jalan = $("#no_surat_jalan").val();
    var tanggal_surat_jalan = $("#tanggal_surat_jalan").val();
    var no_kendaraan = $("#no_kendaraan").val();
    var unit_marketing = $("#unit_marketing").val();
    var supir = $("#nama_supir").val().split("_");
    var barang = $("#kode_barang").val().split("_");
    var jumlah = $("#jumlah").val();
    var kg_kirim = $("#kilogram").val();
    var keterangan = $("#keterangan").val();
    var suplier = $("#suplier").val().split("_");
    var no_faktur = $("#no_faktur").val();
    var no_segel = $("#no_segel").val();
    var pressure = $("#pressure").val();
    var temperatur = $("#temperatur").val();
    var nilai_persen_pengambilan = $("#nilai_persen_pengambilan").val();
    var nilai_persen_berangkat = $("#nilai_persen_berangkat").val();
    
      
      $.ajax({
        url: "input-sj/tambah-sj",
        type: "post",
        dataType: 'text',
        
        data: {
          unitSj: unitSj,
          kode_customer: customer[0],
          nama_customer: customer[1],
          al1_cus: customer[2],
          al2_cus: customer[3],
          al3_cus: customer[4],
          k_wilayah: customer[5],
          npwp: customer[6],
          alamat_kirim1: alamat_kirim1,
          alamat_kirim2: alamat_kirim2,
          alamat_kirim3: alamat_kirim3,
          k_altk: k_altk,
          npwp_krm: npwp,
          no_po: no_po,
          tgl_po: tgl_po,
          ppn: ppn,
          no_spm: no_spm,
          spm_brlk: spm_brlk,
          no_surat_jalan: no_surat_jalan,
          tanggal_surat_jalan: tanggal_surat_jalan,
          no_kendaraan: no_kendaraan,
          unit_marketing: unit_marketing,
          nama_supir: supir[2],
          kode_supir: supir[0],
          kode_barang: barang[0],
          k_div: barang[1],
          kode_berat: barang[2],
          h_jual: barang[3],
          kode_tim: barang[4],
          jumlah: jumlah,
          kg_kirim: kg_kirim,
          keterangan: keterangan,
          k_supl: suplier[0],
          n_supl: suplier[1],
          no_faktur: no_faktur,
          no_segel: no_segel,
          pressure: pressure,
          temperatur: temperatur,
          nilai_persen_pengambilan: nilai_persen_pengambilan,
          nilai_persen_berangkat: nilai_persen_berangkat,

          tk: tk_sj,
        },
        success: function (data) {
          console.log(data);
         // var json = JSON.parse(data);
          var status = data.status;
          if (status == "true") {
           // mytable = $("#tabel_sj").DataTable();
           // mytable.draw();
            Swal.fire("Berhasil!", "Surat jalan berhasil ditambahkan!", "success");
           
          } else {
           // alert("a");
            Swal.fire("Gagal!", "Surat Jalan sudah ada di unit yang sama!", "error");
          }
          Swal.fire("Berhasil!", "Surat jalan berhasil ditambahkan!", "success");
        },
      });
    
  }


  $('input[name=jumlah]').on('change', function(){

    var kode_barang = $("#kode_barang").val().split("_");
    kode_barang = kode_barang[0];
    var jumlah = $("#jumlah").val();
    //console.log(kode_barang);
    $.ajax({
      url: "input-sj/get-kg-barang",
      type: "post",
      dataType: "JSON",
      data: { kode_barang: kode_barang
             },
      success: function (data) {
        //data = JSON.parse(data);
       // console.log(data);
        if(kode_barang!="" ){
        // console.log(data);
         var jumlah_kg = jumlah*data[0].jml_kg;
         $("#kilogram").val(jumlah_kg);
        }

        
      },
    });
    
  });0

  