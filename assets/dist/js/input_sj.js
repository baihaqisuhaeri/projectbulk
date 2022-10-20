var no_surat_jalan = "";
var table_alamat;
var harga_po = "";
var spm_brlk = "";
$(".modal").css("overflow-y", "auto");
var volume_spm = "kosong";
var tk_sj = "";

get_suplier();
get_ppn();

var id_sj_edit = "";
var blnaktif_sj="";

var today = new Date();


var todayDate = new Date().toISOString().slice(0, 10);
var bulan_aktif = "";

//$("#tanggal_surat_jalan").val(todayDate);



var no_sj_edit = "";
var sukses_tambah = null;

var id_alamat_edit = "";


var kode_cus_global = data[3];
var no_spm_global = data[9];
var unit_global = data[8];



$(".select2").select2({ width: "100%" });
$(".select2bln").select2({ width: "15%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

$("#nama_customer").on("change", function () {
  get_no_spm();
  $("#alamat1").val("");
  $("#alamat2").val("");
  $("#alamat3").val("");
  $("#kode_alamat").val("");
  $("#npwp").val("");
});






function get_no_spm() {
  var kodeCustomer = $("#nama_customer").val().split("_");
  kodeCustomer = kodeCustomer[0];
  var unitSj = $("#unitSj").val();
  $.ajax({
    url: "input-sj/get-no-spm",
    type: "post",
    data: { kodeCustomer: kodeCustomer,
            unitSj: unitSj
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
      unitSj: unitSj,
    },
    success: function (data) {
      $("#no_kendaraan").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_mobil_sj_2() {
  var unitSj = $("#unitSj_2").val();
  $.ajax({
    url: "input-sj/get-mobil-sj",
    type: "POST",
    data: {
      unitSj: unitSj,
    },
    success: function (data) {
      $("#no_kendaraan_2").html(data);
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
      unitSj: unitSj,
    },
    success: function (data) {
      $("#nama_supir").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_supir_sj_2() {
  var unitSj = $("#unitSj_2").val();
  $.ajax({
    url: "input-sj/get-supir-sj",
    type: "POST",
    data: {
      unitSj: unitSj,
    },
    success: function (data) {
      $("#nama_supir_2").html(data);
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
      unitSj: unitSj,
    },
    success: function (data) {
      $("#kode_barang").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_barang_sj_2() {
  var unitSj = $("#unitSj_2").val();
  $.ajax({
    url: "input-sj/get-barang-sj",
    type: "POST",
    data: {
      unitSj: unitSj,
    },
    success: function (data) {
      $("#kode_barang_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_unit_marketing() {
  var kd_unit = $("#unitSj").val();
  $.ajax({
    url: "input-sj/get-unit-marketing",
    type: "POST",
    data: {
      kd_unit: kd_unit,
    },
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
      $("#ppn").val(data[0].ppn_persen + " %");
      //$("#unit_spm").html(data);
    },
  });
}

$("#unitSj").on("change", function () {
  //$("#data_plafon").slideUp("slow");
  //set_no_surat_jalan();
  get_tgl_aktif();

  get_customer();
  get_mobil_sj();
  get_supir_sj();
  get_barang_sj();
  get_bulan_aktif();
  get_unit_marketing();
  $("#alamat1").val("");
  $("#alamat2").val("");
  $("#alamat3").val("");
  $("#kode_alamat").val("");
  $("#npwp").val("");
});

$("#unitSj_2").on("change", function () {
  

  
  get_customer_2();
   get_mobil_sj_2();
   get_supir_sj_2();
   get_barang_sj_2();
  get_bulan_aktif_2();
  $("#alamat1_2").val("");
  $("#alamat2_2").val("");
  $("#alamat3_2").val("");
  $("#kode_alamat_2").val("");
  $("#npwp_2").val("");
});

function get_bulan_aktif() {
  var kd_unit = $("#unitSj").val();
  $.ajax({
    url: "input-sj/get-bulan-aktif",
    type: "POST",
    data: {
      kd_unit: kd_unit,
    },
    success: function (data) {
      data = JSON.parse(data);
      
      // todayDate =  todayDate.substring(0, 7);
      // console.log(todayDate);
      // console.log(data.tgl_aktif);
      // console.log(todayDate<data.tgl_aktif);
      bulan_aktif = data.tgl_aktif;
      $("#aktif_unitSj").html("Bulan aktif : " + data.tgl_aktif);
    },
  });
}

function get_bulan_aktif_2() {
  var kd_unit = $("#unitSj_2").val();
  if(kd_unit!=null){

  
  $.ajax({
    url: "input-sj/get-bulan-aktif",
    type: "POST",
    data: {
      kd_unit: kd_unit,
    },
    success: function (data) {
      
      data = JSON.parse(data);
      bulan_aktif = data.tgl_aktif;
      //console.log(data);
      //console.log(data.tgl_aktif);
      $("#aktif_unitSj_2").html("Bulan aktif : " + data.tgl_aktif);
    },
  });
}
}


function set_no_surat_jalan() {
  var kd_unit = $("#unitSj").val();
  var tanggal_surat_jalan = $("#tanggal_surat_jalan").val();
  $.ajax({
    url: "input-sj/set-no-jalan",
    type: "POST",
    data: {
      kd_unit: kd_unit,
      tanggal_surat_jalan: tanggal_surat_jalan,
    },
    success: function (data) {
      data = JSON.parse(data);
      
    //console.log(data.no_sj);
      //bulan_aktif = data.tgl_aktif;
      $("#no_surat_jalan").val(data.no_sj);
    },
  });
}



var k_cus;
$(document).on("click", "#btnAlamatKirim", function () {
  $("#error_nama_customer").html("");

  var namaCustomer = $("#nama_customer").val();

  var err = 0;

  if (namaCustomer == null || namaCustomer == "") {
    $("#error_nama_customer").html(
      "Nama customer harus dipilih terlebih dahulu!"
    );
    err += 1;
  }

  if (err == 0) {
    $("#modal_alamat").modal("show");

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

      $("#tabel_alamat_kirim tbody").on(
        "click",
        "#pilih_alamat_kirim_modal",
        function () {
          var data = table_alamat.row($(this).parents("tr")).data();
          var id = $(this).data("id");
          // var id = $(this).data("id");

          $("#npwp_modal").val(data[2]);
          $("#alamat_kirim_ke_modal").val(data[3]);
          $("#alamat_kirim1_modal").val(data[4]);
          $("#alamat_kirim2_modal").val(data[5]);
          $("#alamat_kirim3_modal").val(data[6]);

          $("#btn_edit").val(id);
        }
      );
      $("#npwp_modal").val("");
      $("#alamat_kirim_ke_modal").val("");
      $("#alamat_kirim1_modal").val("");
      $("#alamat_kirim2_modal").val("");
      $("#alamat_kirim3_modal").val("");

      $("#tabel_alamat_kirim tbody").on(
        "click",
        ".editAlamatKirim",
        function () {
          id_alamat_edit = $(this).data("id");
          $("#modal_alamat").modal("hide");
          $("#modal_tambah_alamat_edit").modal("show");
          var data = table_alamat.row($(this).parents("tr")).data();
          var id = $(this).data("id");
          var kode_customer_edit = $("#no_customer_modal").val();
          //console.log(data[4]);
          $("#npwp_baru_edit").val(data[2]);
          $("#alamat_kirim1_baru_edit").val(data[4]);
          $("#alamat_kirim2_baru_edit").val(data[5]);
          $("#alamat_kirim3_baru_edit").val(data[6]);

          alamat_kirim1_baru;
          $("#editAlamatKirim").val(id);
        }
      );
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

function get_customer_2() {
  unitSj = $("#unitSj_2").val();

  $.ajax({
    url: "input-sj/customer",
    type: "post",
    data: { unitSj: unitSj },
    success: function (data) {
      $("#nama_customer_2").html(data);
    },
  });
}

function get_tgl_aktif() {
  var kd_unit = $("#unitSj").val();

  $.ajax({
    url: "input-sj/tgl-aktif",
    type: "post",
    data: { kd_unit: kd_unit },
    success: function (data) {
      var data = JSON.parse(data);
     // console.log(data.tgl_aktif);
      //var p = dateString.split(/\D/g)
      $("#tanggal_surat_jalan").val(data.tgl_aktif);
      set_no_surat_jalan();
    },
  });
}

function get_tgl_aktif_2() {
  var kd_unit = $("#unitSj_2").val();

  $.ajax({
    url: "input-sj/tgl-aktif",
    type: "post",
    data: { kd_unit: kd_unit },
    success: function (data) {
      var data = JSON.parse(data);
      console.log(data.tgl_aktif);
      //var p = dateString.split(/\D/g)
      $("#tanggal_surat_jalan_2").val(data.tgl_aktif);
      set_no_surat_jalan();
    },
  });
}



$(document).on("click", "#btn_tambah_alamat", function () {
  $("#modal_tambah_alamat").modal("show");
  //$('.modal').css('overflow-y', 'auto');
  $("#modal_alamat").modal("hide");

  //alert( table_alamat.row( ':last', { order: 'applied' } ).data() );
  var dataTablesAlamat = table_alamat.row(":last-child").data();
  if (dataTablesAlamat == null) {
    alamatBaru = "00";
  } else {
    alamatBaru = parseInt(dataTablesAlamat[3]);
    alamatBaru += 1;
    if (alamatBaru < 10) {
      alamatBaru = "0" + alamatBaru;
    }
  }
  $.ajax({
    url: "input-sj/get-nama-customer",
    type: "post",
    data: { unitSj: unitSj, k_cus: k_cus },
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

$(document).on("click", "#btn_kembali", function () {
  $("#modal_tambah_alamat").modal("hide");
  $("#modal_alamat").modal("show");
  //$('.modal').css('overflow-y', 'auto');
});

$(document).on("click", "#btn_simpan_alamat_baru", function () {
  $("#error_alamat_kirim1_baru").html("");
  $("#error_alamat_kirim2_baru").html("");
  $("#error_alamat_kirim3_baru").html("");
  $("#error_npwp_baru").html("");

  var kodeCustomerBaru = $("#nomor_customer_baru").val();
  var namaCustomerBaru = $("#nama_customer_baru").val();
  var alamatKirimKeBaru = $("#alamat_kirim_ke_baru").val();
  var namaCabangBaru = $("#nama_faktur_pajak_baru").val();
  var npwpBaru = $("#npwp_baru").val();
  var alamatKirim1 = $("#alamat_kirim1_baru").val();
  var alamatKirim2 = $("#alamat_kirim2_baru").val();
  var alamatKirim3 = $("#alamat_kirim3_baru").val();
  var alamat1CustomerBaru = $("#alamat1_customer_baru_hidden").val();
  var alamat2CustomerBaru = $("#alamat2_customer_baru_hidden").val();
  var alamat3CustomerBaru = $("#alamat3_customer_baru_hidden").val();

  var err = 0;

  if (alamatKirim1 == "") {
    $("#error_alamat_kirim1_baru").html("Alamat kirim 1 tidak boleh kosong!");
    err += 1;
  }

  if (npwpBaru == "") {
    $("#error_npwp_baru").html("NPWP tidak boleh kosong!");
    err += 1;
  }

  if (err == 0) {
    $("#modal_konfirmasi_tambah_alamat").modal("show");
    //$('.modal').css('overflow-y', 'auto');
  }
});

function tambahAlamat() {
  $("#modal_konfirmasi_tambah_alamat").modal("hide");

  var kodeCustomerBaru = $("#nomor_customer_baru").val();
  var namaCustomerBaru = $("#nama_customer_baru").val();
  var alamatKirimKeBaru = $("#alamat_kirim_ke_baru").val();
  var namaCabangBaru = $("#nama_faktur_pajak_baru").val();
  var npwpBaru = $("#npwp_baru").val();
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
        $("#modal_tambah_alamat").modal("hide");
        $("#modal_alamat").modal("show");
      } else {
        // alert("a");
        Swal.fire("Gagal!", "Supir sudah ada di unit yang sama!", "error");
      }
    },
  });
}

$(document).on("click", "#btn_simpan_alamat", function () {
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

  if (alamatKirimKeModal == "") {
    $("#error_alamat_kirim_ke_modal").html(
      "Alamat kirim ke- tidak boleh kosong!"
    );
    err += 1;
  }

  if (npwpModal == "") {
    $("#error_npwp_modal").html("NPWP tidak boleh kosong!");
    err += 1;
  }

  if (err == 0) {
    $("#modal_alamat").modal("hide");

    $("#alamat1").val(alamatKirim1Modal);
    $("#alamat2").val(alamatKirim2Modal);
    $("#alamat3").val(alamatKirim3Modal);
    $("#kode_alamat").val(alamatKirimKeModal);
    $("#npwp").val(npwpModal);
  }
});

$("#no_spm").on("change", function () {
  // console.log($("#no_spm").val());
  if (sukses_tambah == null) {
    var noUrutSpm = $("#no_spm").val();
    $.ajax({
      url: "input-sj/get-data-spm",
      type: "post",
      dataType: "JSON",
      data: { noUrutSpm: noUrutSpm },
      success: function (data) {
        //  data = JSON.parse(data);
        //console.log(data[0].tgl_po);
        $("#nomor_po").val(data[0].no_po);
        $("#tanggal_po").val(data[0].tgl_po);
        spm_brlk = data[0].spm_brlk;
        harga_po = data[0].harga_po;
        if (data[0].tk == "T") {
          $("#rd_tunai").prop("checked", true);
          tk_sj = data[0].tk;
        } else if (data[0].tk == "K") {
          $("#rd_kredit").prop("checked", true);
          tk_sj = data[0].tk;
        }
      },
    });
  } else {
    sukses_tambah = null;
  }
});

$(document).on("submit", "#tambahSuratJalan", function (e) {
  // console.log(k_cus);
  e.preventDefault();
  //console.log(todayDate);
  
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
  $("#error_no_faktur").html("");
  
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
  no_surat_jalan = $("#no_surat_jalan").val();
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
    $("#error_tanggal_surat_jalan").html(
      "Tanggal Surat Jalan tidak boleh kosong!"
    );
    err += 1;
  }else if($("#tanggal_surat_jalan").val().substring(0, 7)< bulan_aktif){
    $("#error_tanggal_surat_jalan").html(
      "Tanggal Surat Jalan tidak boleh lebih kecil dari tanggal aktif unit!"
    );
    err += 1;
  }
  // console.log($("#tanggal_surat_jalan").val().substring(0, 7));
  // console.log($("#tanggal_surat_jalan").val());
  // console.log(bulan_aktif);
  
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
  if (no_faktur == "") {
    $("#error_no_faktur").html("Nomor Faktur tidak boleh kosong!");
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
    $("#error_nilai_persen_pengambilan").html(
      "Nilai pengambilan tidak boleh kosong!"
    );
    err += 1;
  }
  if (nilai_persen_berangkat == "") {
    $("#error_nilai_persen_berangkat").html(
      "Nilai berangkat tidak boleh kosong!"
    );
    err += 1;
  }
  if (err == 0) {
    var kg_kirim = $("#kilogram").val();
    var noUrutSpm = $("#no_spm").val();
    $.ajax({
      url: "input-sj/get-volume-spm",
      type: "post",
      dataType: "JSON",
      data: { noUrutSpm: noUrutSpm },
      success: function (data) {
        //console.log(data.volume_spm);

        if (parseFloat(kg_kirim) > data.volume_spm) {
          $("#error_kilogram").html(
            "Maaf maksimal volume yang bisa diisi adalah " +
              parseFloat(data.volume_spm) +
              " kg"
          );
        } else {
          $("#error_kilogram").html("");
          $("#modal_konfirmasi_tambah_sj").modal("show");
        }
      },
    });
  }
});

function tambahSj() {
  $("#modal_konfirmasi_tambah_sj").modal("hide");


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
  no_surat_jalan = $("#no_surat_jalan").val();
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
    dataType: "text",

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
       var data = JSON.parse(data);
       //console.log(data.status);
       
      var status = data.status;
      // var json = JSON.parse(data);
     // console.log(data.status);
      if (status == "success") {
        mytable = $("#tabel_sj").DataTable();
        mytable.draw();
        $("#aktif_unitSj").html("");
        Swal.fire("Berhasil!", "Surat jalan berhasil ditambahkan!", "success");
        sukses_tambah = "yes";
      $("#unitSj").val("").change();
      $("#nama_customer").val("").change();
      $("#alamat1").val("");
      $("#alamat2").val("");
      $("#alamat3").val("");
      $("#kode_alamat").val("");
      $("#npwp").val("");

      $("#nomor_po").val("");
      $("#tanggal_po").val("");
      $("#ppn").val("");

      $("#no_spm").val("").change();
      $("#no_surat_jalan").val("");
      $("#tanggal_surat_jalan").val("");
      $("#no_kendaraan").val("");
      $("#unit_marketing").val("").change();
      $("#nama_supir").val("").change("");
      $("#kode_barang").val("").change("");
      $("#jumlah").val("");
      $("#kilogram").val("");
      $("#keterangan").val("");
      $("#suplier").val("").change();
      $("#no_faktur").val("");
      $("#no_segel").val("");
      $("#pressure").val("");
      $("#temperatur").val("");
      $("#nilai_persen_pengambilan").val("");
      $("#nilai_persen_berangkat").val("");
      $("#rd_tunai").prop("checked", false);
      $("#rd_kredit").prop("checked", false);
      } else {
        // alert("a");
        Swal.fire(
          "Gagal!",
          "Nomor Surat Jalan sudah ada!",
          "error"
        );
      }
      //Swal.fire("Berhasil!", "Surat jalan berhasil ditambahkan!", "success");
      // $("#unitSupir").val("").change();
      // $("#nama_supir").val("");
      
    },
  });
}

$("input[name=jumlah]").on("change", function () {
  var kode_barang = $("#kode_barang").val().split("_");
  kode_barang = kode_barang[0];
  var jumlah = $("#jumlah").val();
  //console.log(kode_barang);
  $.ajax({
    url: "input-sj/get-kg-barang",
    type: "post",
    dataType: "JSON",
    data: { kode_barang: kode_barang },
    success: function (data) {
      //data = JSON.parse(data);
      // console.log(data);
      if (kode_barang != "") {
        // console.log(data);
        var jumlah_kg = jumlah * data[0].jml_kg;
        $("#kilogram").val(jumlah_kg);
      }
    },
  });
});

$(document).ready(function () {
  //datatables
  table = $("#tabel_sj").DataTable({
    scrollX: true,
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], //Initial no order.

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "input-sj/tabel-sj",
      type: "POST",
    },

    "createdRow": function( row, data, dataIndex ) {
      //console.log(data[34]);
      if ( data[35] == "*" ) {
        $(row).css("background-color", "#f0ecec");
      }
      else if ( data[38] != "0000-00-00 00:00:00" ) {
        $(row).css("background-color", "#d8fcd4");
      }
      else if(data[37] != "0000-00-00 00:00:00"){
        $(row).css("background-color", "#d8d4fc");
      }
      else{
         $(row).css("background-color", "white");
      }
  },

    //Set column definition initialisation properties.

    // columnDefs: [
    //   {
    //     targets: "_all", //first column / numbering column
    //     orderable: false, //set not orderable
    //   },
    // ],
    //bisa hide column
    "aoColumnDefs": [{ "bVisible": false, "aTargets": [34,35,36,37,38] }]
  });
  // fnSetColumnVis( 1, false );

  $("#tabel_sj tbody").on("click", ".edit_sj", function () {
    var data = table.row($(this).parents("tr")).data();
    var id = $(this).data("id");
    var no_sj = data[1];
    //$("#jumlah_2").val(parseInt(data[21].qty_kirim));
    no_sj_edit = no_sj;
    id_sj_edit = $(this).data("id");
    $("#unitSj_2").val("cekedit");
    $("#unitSj_2").select2().trigger("change");
    //var unitBarang = $("#unitBarang :selected").text();

    $("html, body").animate(
      {
        scrollTop: 3300,
      },
      500
    );

    $("#bagian_2_edit").slideDown("slow");
    //get_unit_supir2();
    //$("#unitSupir2").val(data[1]);
    kode_supir2 = data[2]; // revisi
    kode_cus_global = data[3];
    no_spm_global = data[9];
    unit_global = data[8];
    
    
    //get_bulan_aktif_sj(no_sj);
    

    var kode_cus = data[3];
    var no_spm = data[9];
    var unit = data[8];
    var k_sales = data[17];
    var k_barang = data[19];
    var k_supl = data[30];
    get_no_spm_edit(kode_cus_global, no_spm_global ,unit_global);
    get_unit_sj_edit(unit);
    get_customer_edit(kode_cus, unit);
      $("#jumlah_2").val(parseInt(data[20]));
      $("#kilogram_2").val(parseInt(data[21]));
      $("#keterangan_2").val(data[22]);
      $("#no_faktur_2").val(data[24]);
      $("#no_segel_2").val(parseInt(data[25]));
      $("#pressure_2").val(parseInt(data[26]));
      $("#temperatur_2").val(parseInt(data[27]));
      $("#nilai_persen_pengambilan_2").val(parseInt(data[28]));
      $("#nilai_persen_berangkat_2").val(parseInt(data[29]));


    $("#alamat1_2").val(data[4]);
    $("#alamat2_2").val(data[5]);
    $("#alamat3_2").val(data[6]);
    $("#npwp_2").val(data[7]);
    $("#nomor_po_2").val(data[11]);
    $("#tanggal_po_2").val(data[12]);
    $("#ppn_2").val(data[13]);
    $("#no_surat_jalan_2").val(data[1]);
    $("#tanggal_surat_jalan_2").val(data[10]);

    $("#kode_alamat_2").val(data[37]);

    if (data[14] == "Tunai") {
      $("#rd_tunai_2").prop("checked", true);
      tk_sj = "T";
    } else if (data[14] == "Kredit") {
      $("#rd_kredit_2").prop("checked", true);
      tk_sj = "K";
    }
    blnaktif_sj = data[35];
    get_mobil_sj_edit(data[15] + "_" + data[8]);
    get_unit_marketing_edit(data[18]);
    get_supir_sj_edit(unit, k_sales);
    get_barang_sj_edit(unit, data[19]);
    get_no_segel_edit(no_sj);
    //console.log(k_supl);
    get_suplier_edit(k_supl);

    $("#btn_edit").val(id);
    
  });

  $("#tabel_sj tbody").on("click", ".cetak_sjss", function () {
    var data = table.row($(this).parents("tr")).data();

    var cetak_no_sj = data[1];
    var cetak_nama_customer = data[2];
    var cetak_alamat_kirim1 = data[4];
    var cetak_alamat_kirim2 = data[5];
    var cetak_alamat_kirim3 = data[6];
    var cetak_tanggal_surat_jalan = data[10];
    var cetak_kode_mobil = data[15];
    var cetak_kode_supir = data[17];
    var cetak_no_segel = data[25];
    var cetak_no_po = data[11];
    // var cetak_ = data[];
    // var cetak_ = data[];
    // var cetak_ = data[];
    // var cetak_ = data[];
    // var cetak_ = data[];
    // var cetak_ = data[];
    // var cetak_ = data[];
    // var cetak_ = data[];
    // var cetak_ = data[];

    $.ajax({
      url: "input-sj/cetak",
      type: "post",
      data: {
        cetak_no_sj: cetak_no_sj,
        cetak_nama_customer: cetak_nama_customer,
        cetak_alamat_kirim1: cetak_alamat_kirim1,
        cetak_alamat_kirim2: cetak_alamat_kirim2,
        cetak_alamat_kirim3: cetak_alamat_kirim3,
        cetak_tanggal_surat_jalan: cetak_tanggal_surat_jalan,
        cetak_kode_mobil: cetak_kode_mobil,
        cetak_kode_supir: cetak_kode_supir,
        cetak_no_segel: cetak_no_segel,
        cetak_no_po: cetak_no_po,
      },
      success: function (data) {
        //$("#nama_customer_2").html(data);
      },
    });

    //$("#btn_edit").val(id);
  });
  $("#bagian_2_edit").hide();
});

var id_sj = "";
$(document).on("click", ".deleteSj", function (event) {
  id_sj = $(this).data("id");
  //console.log($(this).data("id"));

  $("#modal_konfirmasi_delete").modal("show");
});

function deleteSj() {
  $("#modal_konfirmasi_delete").modal("hide");
  var table = $("#tabel_sj").DataTable();

  $.ajax({
    url: "input-sj/hapus-sj",
    data: {
      id: id_sj,
    },
    type: "post",
    success: function (data) {
      var json = JSON.parse(data);
      status = json.status;
      if (status == "success") {
        mytable = $("#tabel_sj").DataTable();
        mytable.draw();

        $("#" + id_sj)
          .closest("tr")
          .remove();
        Swal.fire("Berhasil!", "Surat Jalan berhasil dihapus!", "success");
      } else {
        // alert("Failed");
        Swal.fire("Gagal!", "Surat Jalan gagal dihapus!", "error");
        return;
      }
    },
  });
}

var id_sj_batal = "";
var no_sj_batal = "";
$(document).on("click", ".batal_sj", function (event) {
  id_sj_batal = $(this).data("id");
  no_sj_batal = $(this).data("no_sj");
  //console.log(no_sj_batal);

  $("#modal_konfirmasi_batal").modal("show");
});

function batalSj() {
  $("#modal_konfirmasi_batal").modal("hide");
  var table = $("#tabel_sj").DataTable();

  $.ajax({
    url: "input-sj/batal-sj",
    data: {
      id: id_sj_batal,
      no_sj: no_sj_batal
    },
    type: "post",
    success: function (data) {
      var json = JSON.parse(data);
      status = json.status;
      if (status == "success") {
        mytable = $("#tabel_sj").DataTable();
        mytable.draw();

        $("#" + id_sj_batal)
          .closest("tr")
          .remove();
        Swal.fire("Berhasil!", "Surat Jalan berhasil dibatalkan", "success");
      } else {
        // alert("Failed");
        Swal.fire("Information", "Surat Jalan sudah dibatalkan", "warning");
        return;
      }
    },
  });
}




function get_unit_sj_edit(unit) {
  $.ajax({
    url: "input-sj/unit-sj",
    type: "post",
    data: { unit: unit },
    success: function (data) {
      $("#unitSj_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_customer_edit(kode_cus, unit_edit) {
  $.ajax({
    url: "input-sj/customer",
    type: "post",
    data: { kode_cus: kode_cus, unit_edit: unit_edit },
    success: function (data) {
      $("#nama_customer_2").html(data);
    },
  });
}




$(document).on("click", "#btnAlamatKirim_2", function () {
  $("#error_nama_customer_2").html("");

  var namaCustomer = $("#nama_customer_2").val();

  var err = 0;

  if (namaCustomer == null || namaCustomer == "") {
    $("#error_nama_customer_2").html(
      "Nama customer harus dipilih terlebih dahulu!"
    );
    err += 1;
  }

  if (err == 0) {
    $("#modal_alamat_2").modal("show");

    k_cus = $("#nama_customer_2").val().split("_");
    $("#no_customer_modal_2").val(k_cus[0]);
    $("#nama_customer_modal_2").val(k_cus[1]);
    k_cus = k_cus[0];

    $(document).ready(function () {
      //datatables
      $("#tabel_alamat_kirim_2").dataTable().fnDestroy();
      table_alamat = $("#tabel_alamat_kirim_2").DataTable({
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
            status_edit: "aktif",
          },
        },
      });

      $("#tabel_alamat_kirim_2 tbody").on(
        "click",
        "#pilih_alamat_kirim_modal_2",
        function () {
          var data = table_alamat.row($(this).parents("tr")).data();
          var id = $(this).data("id");
          // var id = $(this).data("id");

          $("#npwp_modal_2").val(data[2]);
          $("#alamat_kirim_ke_modal_2").val(data[3]);
          $("#alamat_kirim1_modal_2").val(data[4]);
          $("#alamat_kirim2_modal_2").val(data[5]);
          $("#alamat_kirim3_modal_2").val(data[6]);

          $("#btn_edit_2").val(id);
        }
      );
      $("#npwp_modal_2").val("");
      $("#alamat_kirim_ke_modal_2").val("");
      $("#alamat_kirim1_modal_2").val("");
      $("#alamat_kirim2_modal_2").val("");
      $("#alamat_kirim3_modal_2").val("");
    });
  }
});

$(document).on("click", "#btn_simpan_alamat_2", function () {
  $("#error_alamat_kirim_ke_modal_2").html("");
  $("#error_alamat_kirim1_modal_2").html("");
  $("#error_alamat_kirim2_modal_2").html("");
  $("#error_alamat_kirim3_modal_2").html("");
  $("#error_npwp_modal_2").html("");

  var alamatKirimKeModal = $("#alamat_kirim_ke_modal_2").val();
  var alamatKirim1Modal = $("#alamat_kirim1_modal_2").val();
  var alamatKirim2Modal = $("#alamat_kirim2_modal_2").val();
  var alamatKirim3Modal = $("#alamat_kirim3_modal_2").val();
  var npwpModal = $("#npwp_modal_2").val();

  var err = 0;

  if (alamatKirimKeModal == "") {
    $("#error_alamat_kirim_ke_modal_2").html(
      "Alamat kirim ke- tidak boleh kosong!"
    );
    err += 1;
  }

  if (npwpModal == "") {
    $("#error_npwp_modal_2").html("NPWP tidak boleh kosong!");
    err += 1;
  }

  if (err == 0) {
    $("#modal_alamat_2").modal("hide");

    $("#alamat1_2").val(alamatKirim1Modal);
    $("#alamat2_2").val(alamatKirim2Modal);
    $("#alamat3_2").val(alamatKirim3Modal);
    $("#kode_alamat_2").val(alamatKirimKeModal);
    $("#npwp_2").val(npwpModal);
  }
});

function get_no_spm_edit(kode_cus, no_spm, unitSj) {
  //var kodeCustomer = $("#nama_customer_2").val().split("_");
  //kodeCustomer = kodeCustomer[0];
  //console.log(kode_cus);
  $.ajax({
    url: "input-sj/get-no-spm",
    type: "post",
    data: { kodeCustomer: kode_cus, no_spm: no_spm,
            unitSj: unitSj
          },
    success: function (data) {
      $("#no_spm_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

$("#no_spm_2").on("change", function () {
  // console.log($("#no_spm").val());
  var noUrutSpm = $("#no_spm_2").val();
  $.ajax({
    url: "input-sj/get-data-spm",
    type: "post",
    dataType: "JSON",
    data: { noUrutSpm: noUrutSpm },
    success: function (data) {
      //  data = JSON.parse(data);
      //console.log(data[0].tgl_po);
      $("#nomor_po_2").val(data[0].no_po);
      $("#tanggal_po_2").val(data[0].tgl_po);
      spm_brlk = data[0].spm_brlk;
      harga_po = data[0].harga_po;
      if (data[0].tk == "T") {
        $("#rd_tunai_2").prop("checked", true);
        tk_sj = data[0].tk;
      } else if (data[0].tk == "K") {
        $("#rd_kredit_2").prop("checked", true);
        tk_sj = data[0].tk;
      }
    },
  });
});

function get_mobil_sj_edit(mobil_unik) {
  var unitSj = $("#unitSj_2").val();
  $.ajax({
    url: "input-sj/get-mobil-sj",
    type: "POST",
    data: {
      mobil_unik: mobil_unik,
      unitSj: unitSj,
      status_edit: "aktif",
    },
    success: function (data) {
      $("#no_kendaraan_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_unit_marketing_edit(unit_mkt) {
  $.ajax({
    url: "input-sj/get-unit-marketing",
    type: "POST",
    data: {
      unit_mkt: unit_mkt,
      status_edit: "aktif",
    },

    success: function (data) {
      $("#unit_marketing_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_supir_sj_edit(unitSj, k_sales) {
  $.ajax({
    url: "input-sj/get-supir-sj",
    type: "POST",
    data: {
      unitSj: unitSj,
      k_sales: k_sales,
      status_edit: "aktif",
    },
    success: function (data) {
      $("#nama_supir_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_barang_sj_edit(unitSj, k_barang) {
  $.ajax({
    url: "input-sj/get-barang-sj",
    type: "POST",
    data: {
      unitSj: unitSj,
      k_barang: k_barang,
      status_edit: "aktif",
    },
    success: function (data) {
      $("#kode_barang_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

// function get_no_segel_edit(no_sj) {
//   $.ajax({
//     url: "input-sj/get-sj",
//     type: "POST",
//     data: {
//       no_sj: no_sj,
//     },
//     success: function (data) {
//       data = JSON.parse(data);
//       //console.log(data[0].qty_kirim);
//       $("#jumlah_2").val(parseInt(data[0].qty_kirim));
//       $("#kilogram_2").val(parseInt(data[0].kg_kirim));
//     },
//   });
// }

function get_no_segel_edit(no_sj) {
  $.ajax({
    url: "input-sj/get-sj",
    type: "POST",
    data: {
      no_sj: no_sj,
    },
    success: function (data) {
      data = JSON.parse(data);
      //console.log(data[0].qty_kirim);
      //$("#jumlah_2").val(parseInt(data[0].qty_kirim));
      // $("#kilogram_2").val(parseInt(data[0].kg_kirim));
      // $("#keterangan_2").val(data[0].ket);
      // $("#no_faktur_2").val(data[0].no_faktur);
      // $("#no_segel_2").val(parseInt(data[0].no_segel));
      // $("#pressure_2").val(parseInt(data[0].awl_presur));
      // $("#temperatur_2").val(parseInt(data[0].awl_suhu));
      // $("#nilai_persen_pengambilan_2").val(parseInt(data[0].awal));
      // $("#nilai_persen_berangkat_2").val(parseInt(data[0].akhir));
    },
  });
}

function get_suplier_edit(k_supl) {
  $.ajax({
    url: "input-sj/get-suplier",
    type: "POST",
    data: {
      k_supl: k_supl,
      status_edit: "aktif",
    },
    success: function (data) {
      $("#suplier_2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

$("input[name=jumlah_2]").on("change", function () {
  var kode_barang = $("#kode_barang_2").val().split("_");
  kode_barang = kode_barang[0];
  var jumlah = $("#jumlah_2").val();
  //console.log(kode_barang);
  $.ajax({
    url: "input-sj/get-kg-barang",
    type: "post",
    dataType: "JSON",
    data: { kode_barang: kode_barang },
    success: function (data) {
      //data = JSON.parse(data);
      // console.log(data);
      if (kode_barang != "") {
        // console.log(data);
        var jumlah_kg = jumlah * data[0].jml_kg;
        $("#kilogram_2").val(jumlah_kg);
      }
    },
  });
});

  
$(document).on("submit", "#edit_sj", function (e) {
  
  // console.log(k_cus);
  e.preventDefault();

  $("#error_unitSj_2").html("");
  $("#error_nama_customer_2").html("");
  $("#error_no_spm_2").html("");
  $("#error_no_surat_jalan_2").html("");
  $("#error_tanggal_surat_jalan_2").html("");
  $("#error_no_kendaraan_2").html("");
  $("#error_unit_marketing_2").html("");
  $("#error_nama_supir_2").html("");
  $("#error_kode_barang_2").html("");
  $("#error_jumlah_2").html("");
  $("#error_no_faktur_2").html("");
  
  $("#error_keterangan_2").html("");
  $("#error_suplier_2").html("");

  $("#error_no_segel_2").html("");
  $("#error_pressure_2").html("");
  $("#error_temperatur_2").html("");
  $("#error_nilai_persen_pengambilan_2").html("");
  $("#error_nilai_persen_berangkat_2").html("");

  var err = 0;

  var unitSj = $("#unitSj_2").val();
  var nama_customer = $("#nama_customer_2").val();
  var no_spm = $("#no_spm_2").val();
  var no_surat_jalan = $("#no_surat_jalan_2").val();
  var tanggal_surat_jalan = $("#tanggal_surat_jalan_2").val();
  var no_kendaraan = $("#no_kendaraan_2").val();
  var unit_marketing = $("#unit_marketing_2").val();
  var nama_supir = $("#nama_supir_2").val();
  var kode_barang = $("#kode_barang_2").val();
  var jumlah = $("#jumlah_2").val();
  var keterangan = $("#keterangan_2").val();
  var suplier = $("#suplier_2").val();
  var no_faktur = $("#no_faktur_2").val();
  var no_segel = $("#no_segel_2").val();
  var pressure = $("#pressure_2").val();
  var temperatur = $("#temperatur_2").val();
  var nilai_persen_pengambilan = $("#nilai_persen_pengambilan_2").val();
  var nilai_persen_berangkat = $("#nilai_persen_berangkat_2").val();

  if (unitSj == "") {
    $("#error_unitSj_2").html("Unit tidak boleh kosong!");
    err += 1;
  }
  if (nama_customer == "") {
    $("#error_nama_customer_2").html("Nama Customer harus dipilih!");
    err += 1;
  }
  if (no_spm == "") {
    $("#error_no_spm_2").html("Nomor SPM harus dipilih!");
    err += 1;
  }

  if (tanggal_surat_jalan == "") {
    $("#error_tanggal_surat_jalan_2").html(
      "Tanggal Surat Jalan tidak boleh kosong!"
    );
    err += 1;
  }else if($("#tanggal_surat_jalan_2").val().substring(0, 7)< bulan_aktif){
    $("#error_tanggal_surat_jalan_2").html(
      "Tanggal Surat Jalan tidak boleh lebih kecil dari tanggal aktif unit!"
    );
    err += 1;
  }
  //console.log($("#tanggal_surat_jalan").val().substring(0, 7)< bulan_aktif);
  
  if (no_kendaraan == "") {
    $("#error_no_kendaraan_2").html("Kendaraan harus dipilih!");
    err += 1;
  }
  if (unit_marketing == "") {
    $("#error_unit_marketing_2").html("Unit marketing tidak boleh kosong!");
    err += 1;
  }
  if (nama_supir == "") {
    $("#error_nama_supir_2").html("Nama Supir harus dipilih!");
    err += 1;
  }
  if (kode_barang == "") {
    $("#error_kode_barang_2").html("Barang harus dipilih!");
    err += 1;
  }
  if (jumlah == "") {
    $("#error_jumlah_2").html("Jumlah tidak boleh kosong!");
    err += 1;
  }
  if (keterangan == "") {
    $("#error_keterangan_2").html("Keterangan tidak boleh kosong!");
    err += 1;
  }
  if (no_faktur == "") {
    $("#error_no_faktur_2").html("Nomor Faktur tidak boleh kosong!");
    err += 1;
  }
  if (suplier == "") {
    $("#error_suplier_2").html("Suplier tidak boleh kosong!");
    err += 1;
  }

  if (no_segel == "") {
    $("#error_no_segel_2").html("Nomor Segel tidak boleh kosong!");
    err += 1;
  }
  if (pressure == "") {
    $("#error_pressure_2").html("Pressure tidak boleh kosong!");
    err += 1;
  }
  if (temperatur == "") {
    $("#error_temperatur_2").html("Temperatur tidak boleh kosong!");
    err += 1;
  }
  if (nilai_persen_pengambilan == "") {
    $("#error_nilai_persen_pengambilan_2").html(
      "Nilai pengambilan tidak boleh kosong!"
    );
    err += 1;
  }
  if (nilai_persen_berangkat == "") {
    $("#error_nilai_persen_berangkat_2").html(
      "Nilai berangkat tidak boleh kosong!"
    );
    err += 1;
  }
  if (err == 0) {
    var kg_kirim = $("#kilogram_2").val();
    var noUrutSpm = $("#no_spm_2").val();
    $.ajax({
      url: "input-sj/get-volume-spm",
      type: "post",
      dataType: "JSON",
      data: {
        noUrutSpm: noUrutSpm,
        no_surat_jalan: no_surat_jalan,
        status_edit: "aktif",
      },
      success: function (data) {
        //console.log(data.volume_spm);

        if (parseFloat(kg_kirim) > data.volume_spm) {
          $("#error_kilogram_2").html(
            "Maaf maksimal volume yang bisa diisi adalah " +
              parseFloat(data.volume_spm) +
              " kg"
          );
        } else {
          $("#error_kilogram_2").html("");
          $("#modal_konfirmasi_edit_sj").modal("show");
        }
      },
    });
  }
});

function editSj() {
  $("#modal_konfirmasi_edit_sj").modal("hide");

  var unitSj = $("#unitSj_2").val();
  var customer = $("#nama_customer_2").val().split("_");
  var alamat_kirim1 = $("#alamat1_2").val();
  var alamat_kirim2 = $("#alamat2_2").val();
  var alamat_kirim3 = $("#alamat3_2").val();
  var k_altk = $("#kode_alamat_2").val();
  var npwp = $("#npwp_2").val();

  var no_po = $("#nomor_po_2").val();
  var tgl_po = $("#tanggal_po_2").val();
  var ppn = $("#ppn_2").val();

  var no_spm = $("#no_spm_2").val();
  var no_sj = no_sj_edit;
  var tanggal_surat_jalan = $("#tanggal_surat_jalan_2").val();
  var no_kendaraan = $("#no_kendaraan_2").val();
  var unit_marketing = $("#unit_marketing_2").val();
  var supir = $("#nama_supir_2").val().split("_");
  var barang = $("#kode_barang_2").val().split("_");
  var jumlah = $("#jumlah_2").val();
  var kg_kirim = $("#kilogram_2").val();
  var keterangan = $("#keterangan_2").val();
  var suplier = $("#suplier_2").val().split("_");
  var no_faktur = $("#no_faktur_2").val();
  var no_segel = $("#no_segel_2").val();
  var pressure = $("#pressure_2").val();
  var temperatur = $("#temperatur_2").val();
  var nilai_persen_pengambilan = $("#nilai_persen_pengambilan_2").val();
  var nilai_persen_berangkat = $("#nilai_persen_berangkat_2").val();

  $.ajax({
    url: "input-sj/edit-sj",
    type: "post",
    dataType: "text",

    data: {
      id: id_sj_edit,
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
      no_sj: no_sj,
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
      blnaktif: blnaktif_sj
    },
    success: function (data) {
      // console.log(data);
      var data = JSON.parse(data);
      var status = data.status;
      //console.log(status);
      if (status == "true") {
        mytable = $("#tabel_sj").DataTable();
        mytable.draw();
        Swal.fire("Berhasil!", "Surat jalan berhasil diubah!", "success");
        $("#bagian_2_edit").hide();
      } else {
        // alert("a");
        Swal.fire("Gagal!", "Nomor Surat Jalan sudah ada!", "error");
        $("#bagian_2_edit").hide();
        // sampe sini 5 Oktober 2022 , lagi di cek no_sj duplikat di edit sj
      }
      //  Swal.fire("Berhasil!", "Surat jalan berhasil diubah!", "success");
      //  $("#bagian_2_edit").hide();
    },
  });
}

var id_alamat = "";
$(document).on("click", ".deleteAlamatKirim", function (event) {
  id_alamat = $(this).data("id");
  id_alamat;
  $("#modal_konfirmasi_delete_alamat_kirim").modal("show");
});

function deleteAlamatKirim() {
  $("#modal_konfirmasi_delete_alamat_kirim").modal("hide");
  var table = $("#tabel_alamat_kirim").DataTable();

  $.ajax({
    url: "input-sj/hapus-alamat-kirim",
    data: {
      id: id_alamat,
    },
    type: "post",
    success: function (data) {
      var json = JSON.parse(data);
      status = json.status;
      if (status == "success") {
        mytable = $("#tabel_alamat_kirim").DataTable();
        mytable.draw();

        $("#" + id_alamat)
          .closest("tr")
          .remove();
        Swal.fire("Berhasil!", "Alamat kirim berhasil dihapus!", "success");
      } else {
        // alert("Failed");
        Swal.fire("Gagal!", "Alamat kirim berhasil dihapus!", "error");
        return;
      }
    },
  });
}

$(document).on("submit", "#edit_alamat_kirim", function (e) {
  // console.log(k_cus);
  e.preventDefault();

  $("#error_npwp_baru_edit").html("");
  $("#error_alamat_kirim1_baru_edit").html("");
  $("#error_alamat_kirim2_baru_edit").html("");
  $("#error_alamat_kirim3_baru_edit").html("");

  var err = 0;

  var npwp_edit = $("#npwp_baru_edit").val();
  var alamat_kirim1_edit = $("#alamat_kirim1_baru_edit").val();
  var alamat_kirim2_edit = $("#alamat_kirim2_baru_edit").val();
  var alamat_kirim3_edit = $("#alamat_kirim3_baru_edit").val();

  if (npwp_edit == "") {
    $("#error_npwp_baru_edit").html("Npwp tidak boleh kosong!");
    err += 1;
  }
  if (alamat_kirim1_edit == "") {
    $("#error_alamat_kirim1_baru_edit").html(
      "Alamat kirim 1 tidak boleh kosong!"
    );
    err += 1;
  }
  if (alamat_kirim2_edit == "") {
    $("#error_alamat_kirim2_baru_edit").html(
      "Alamat kirim 2 tidak boleh kosong!"
    );
    err += 1;
  }
  if (alamat_kirim3_edit == "") {
    $("#error_alamat_kirim3_baru_edit").html(
      "Alamat kirim 3 tidak boleh kosong!"
    );
    err += 1;
  }

  if (err == 0) {
    $("#modal_konfirmasi_edit_alamat_kirim").modal("show");
  }
});

function editAlamatKirim() {
  $("#modal_konfirmasi_edit_alamat_kirim").modal("hide");

  var npwp_edit = $("#npwp_baru_edit").val();
  var alamat_kirim1_edit = $("#alamat_kirim1_baru_edit").val();
  var alamat_kirim2_edit = $("#alamat_kirim2_baru_edit").val();
  var alamat_kirim3_edit = $("#alamat_kirim3_baru_edit").val();

  //console.log(id_alamat_edit);
  $.ajax({
    url: "input-sj/edit-alamat-kirim",
    type: "post",
    dataType: "JSON",

    data: {
      id_alamat_edit: id_alamat_edit,
      npwp_edit: npwp_edit,
      alamat_kirim1_edit: alamat_kirim1_edit,
      alamat_kirim2_edit: alamat_kirim2_edit,
      alamat_kirim3_edit: alamat_kirim3_edit,
    },
    success: function (data) {
      // console.log(data);
      //var data = JSON.parse(data);
      var status = data.status;

      //console.log(status);
      if (status == "true") {
        mytable = $("#tabel_alamat_kirim").DataTable();
        mytable.draw();
        Swal.fire("Berhasil!", "Alamat kirim berhasil diubah!", "success");
        $("#modal_tambah_alamat_edit").modal("hide");
        $("#modal_alamat").modal("show");
      } else {
        // alert("a");
        Swal.fire("Berhasil!", "Tidak ada perubahan!", "success");
        $("#modal_tambah_alamat_edit").modal("hide");
        $("#modal_alamat").modal("show");
      }
      //  Swal.fire("Berhasil!", "Surat jalan berhasil diubah!", "success");
      //  $("#bagian_2_edit").hide();
    },
  });
}

// function hasilPdf() {
//   var win = window.open("input-sj/cetak", "_blank");
//   $.ajax({
//     url: "input-sj/cetak",
//     type: "post",
//     data: { cetak_no_sj: "coba aja" },
//     success: function (data) {
//       //  $("#no_spm").html(data);
//       //$("#unit_spm").html(data);
//     },
//   });
//   win.focus();
// }

$("#nama_customer_2").on("change", function () {
  var kodeCustomer = $("#nama_customer_2").val().split("_");
  kodeCustomer = kodeCustomer[0];
  var unitSj = $("#unitSj_2").val();
  $("#alamat1_2").val("");
  $("#alamat2_2").val("");
  $("#alamat3_2").val("");
  $("#kode_alamat_2").val("");
  $("#npwp_2").val("");

  
  //variable no_spm_global sebenarnya tidak dibutuhkan, hanya untuk mengisi parameter saja
  get_no_spm_edit(kodeCustomer, no_spm_global , unitSj);
  
});


$(document).on("change", "#bulan_aktif", function () {
  var bulanAktif = $("#bulan_aktif").val();
 
  $("#tabel_sj").dataTable().fnDestroy();
  table = $("#tabel_sj").DataTable({
    scrollX: true,
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], 

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "input-sj/tabel-sj",
      type: "POST",
      data: {
        bulanAktif: bulanAktif,
      },
    },
    "aoColumnDefs": [{ "bVisible": false, "aTargets": [34,35,36,37,38] }],
    //Set column definition initialisation properties.
    "createdRow": function( row, data, dataIndex ) {
      //console.log(data[35]);
      //sampe sini 30 September 2022, tinggal yg edit klo udah tutup bulan
      if ( data[35] == "*" ) {
        $(row).css("background-color", "#f0ecec");
      }
      else if ( data[38] != "0000-00-00 00:00:00" ) {
        $(row).css("background-color", "#d8fcd4");
      }
      else if(data[37] != "0000-00-00 00:00:00"){
        $(row).css("background-color", "#d8d4fc");
      }
      else{
         $(row).css("background-color", "white");
      }
  },
  
    
  });
  
});


//1 september 2022

$("#tanggal_surat_jalan_2").on("change", function () {
  get_bulan_aktif_2();
  
});
