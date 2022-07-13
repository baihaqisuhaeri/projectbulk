$("#bagian_2_edit").hide();
var table;
$(document).ready(function () {
  //datatables
  table = $("#tabel_barang").DataTable({
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], //Initial no order.

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "barang/tabel-barang",
      type: "POST",
      // data: function (data) {
      //   data.unit = $("#unit").val();
      //   data.no_urut = $("#no_urut_po").val();
      // },
    },

    //Set column definition initialisation properties.
    columnDefs: [
      {
        targets: "_all", //first column / numbering column
        orderable: false, //set not orderable
      },
    ],
    dom: "Bfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        },
      },
      "colvis",
    ],
  });

  $("#tabel_barang tbody").on("click", ".edit_barang", function () {
    var data = table.row($(this).parents("tr")).data();
    var id = $(this).data("id");
    //var unitBarang = $("#unitBarang :selected").text();

    $("html, body").animate(
      {
        scrollTop: 1500,
      },
      500
    );

    $("#bagian_2_edit").slideDown("slow");
    get_unit_barang2();
    $("#kode_barang2").val(data[1]);
    $("#nama_barang2").val(data[2]);
    $("#kode_div2").val(data[3]);
    $("#kode_berat2").val(data[4]);
    $("#jumlah_kg2").val(data[5]);
    $("#harga_pokok2").val(data[6]);
    $("#harga_jual2").val(data[7]);
    $("#kode_jual2").val(data[8]);
    $("#kode_tim2").val(data[9]);
    $("#btn_edit").val(id);
  });
  $("#bagian_2_edit").hide();
});

// function tambahBarang() {
$(document).on("submit", "#tambahBarang", function (e) {
  e.preventDefault();
  $("#error_unit_barang").html("");
  $("#error_nama_barang").html("");
  $("#error_harga_pokok").html("");
  $("#error_harga_jual").html("");
  $("#error_kode_div").html("");
  $("#error_kode_berat").html("");
  $("#error_jumlah_kg").html("");
  $("#error_kode_jual").html("");
  $("#error_kode_tim").html("");
  $("#error_kode_unit").html("");

  var kodeUnit = $("#unitBarang").val();
  //var unitBarang = $("unitBarang").val();
  var namaBarang = $("#nama_barang").val();
  var hargaPokok = $("#harga_pokok").val();
  var hargaJual = $("#harga_jual").val();
  var kodeDiv = $("#kode_div").val();
  var kodeBerat = $("#kode_berat").val();
  var jumlahKg = $("#jumlah_kg").val();
  var kodeJual = $("#kode_jual").val();
  var kodeTim = $("#kode_tim").val();

  var err = 0;

  if (kodeUnit == "") {
    $("#error_unit_barang").html("Unit tidak boleh kosong!");
    err += 1;
  }
  if (namaBarang == "") {
    $("#error_nama_barang").html("Nama barang tidak boleh kosong!");
    err += 1;
  }

  if (hargaPokok == "") {
    $("#error_harga_pokok").html("Harga pokok tidak boleh kosong!");
    err += 1;
  }

  if (hargaJual == "") {
    $("#error_harga_jual").html("Harga jual tidak boleh kosong!");
    err += 1;
  }

  if (kodeDiv == "") {
    $("#error_kode_div").html("Kode divisi tidak boleh kosong!");
    err += 1;
  }

  if (kodeBerat == "") {
    $("#error_kode_berat").html("Kode berat tidak boleh kosong!");
    err += 1;
  }

  if (jumlahKg == "") {
    $("#error_jumlah_kg").html("Jumlah kg tidak boleh kosong!");
    err += 1;
  }

  if (kodeJual == "") {
    $("#error_kode_jual").html("Kode jual tidak boleh kosong!");
    err += 1;
  }

  if (kodeTim == "") {
    $("#error_kode_tim").html("Kode tim tidak boleh kosong!");
    err += 1;
  }

  if (err == 0) {
    $('#modal_konfirmasi_tambah').modal('show');


    
  }
});
//}

function tambah(){
  $('#modal_konfirmasi_tambah').modal('hide');

  var kodeUnit = $("#unitBarang").val();
  //var unitBarang = $("unitBarang").val();
  var namaBarang = $("#nama_barang").val();
  var hargaPokok = $("#harga_pokok").val();
  var hargaJual = $("#harga_jual").val();
  var kodeDiv = $("#kode_div").val();
  var kodeBerat = $("#kode_berat").val();
  var jumlahKg = $("#jumlah_kg").val();
  var kodeJual = $("#kode_jual").val();
  var kodeTim = $("#kode_tim").val();
  $.ajax({
    url: "barang/tambah-barang",
    type: "post",
    data: {
      namaBarang: namaBarang,
      hargaPokok: hargaPokok,
      hargaJual: hargaJual,
      kodeDiv: kodeDiv,
      kodeBerat: kodeBerat,
      jumlahKg: jumlahKg,
      kodeJual: kodeJual,
      kodeTim: kodeTim,
      kodeUnit: kodeUnit,
    },
    success: function (data) {
      var json = JSON.parse(data);
      var status = json.status;
      if (status == "true") {
        mytable = $("#tabel_barang").DataTable();
        mytable.draw();
        //  alert("Barang berhasil ditambahkan");
        Swal.fire("Berhasil!", "Barang berhasil ditambahkan!", "success");
        $("#unitBarang").val("").change();
        $("#nama_barang").val("");
        $("#harga_pokok").val("");
        $("#harga_jual").val("");
        $("#kode_div").val("");
        $("#kode_berat").val("");
        $("#jumlah_kg").val("");
        $("#kode_jual").val("");
        $("#kode_tim").val("");
        // $("#unitBarang").val("Pilih Unit");
        // $("#tabel_barang").DataTable().ajax.reload();
      } else {
        // alert("failed");
        Swal.fire(
          "Gagal",
          "Barang gagal ditambah, mohon coba kembali",
          "error"
        );
      }
    },
  });
}

get_unit_barang();

function get_unit_barang() {
  $.ajax({
    url: "barang/unit-barang",
    success: function (data) {
      $("#unitBarang").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_unit_barang2() {
  $.ajax({
    url: "barang/unit-barang",
    success: function (data) {
      $("#unitBarang2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

$(document).on("change", "#bulan_aktif", function () {
  var bulanAktif = $("#bulan_aktif").val();
  // $.ajax({
  //   url: "barang/tabel-barang",
  //   type: "post",
  //   data: {
  //     bulanAktif: bulanAktif,
  //   },
  //   success: function (data) {
  //     var json = JSON.parse(data);
  //     var status = json.status;
  //     if (status == "true") {
  //       mytable = $("#tabel_barang").DataTable();
  //       mytable.draw();
  //       alert("Barang berhasil ditambahkan");
  //       $("#bulan_aktif").val("");
  //     } else {
  //       alert("failed");
  //     }
  //   },
  // });

  // alert($(this).find(":selected").val() + " selected val");
  // alert($(this).attr("id") + " select id");
  $("#tabel_barang").dataTable().fnDestroy();
  table = $("#tabel_barang").DataTable({
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], //Initial no order.

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "barang/tabel-barang",
      type: "POST",
      data: {
        bulanAktif: bulanAktif,
      },
      // data: function (data) {
      //   data.unit = $("#unit").val();
      //   data.no_urut = $("#no_urut_po").val();
      // },
    },

    //Set column definition initialisation properties.
    columnDefs: [
      {
        targets: "_all", //first column / numbering column
        orderable: false, //set not orderable
      },
    ],
    dom: "Bfrtip",
    buttons: [
      {
        extend: "excelHtml5",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
        },
      },
      "colvis",
    ],
  });
  $("#bagian_2_edit").hide();
});

var id = $(this).data("id");
$(document).on("click", ".deleteBarang", function (event) {
  var table = $("#tabel_barang").DataTable();
  event.preventDefault();
  $('#modal_konfirmasi_hapus').modal('show');
   id = $(this).data("id");
  
});

function hapus(){
  $('#modal_konfirmasi_hapus').modal('hide');
  $.ajax({
    url: "barang/hapus-barang",
    data: {
      id: id,
    },
    type: "post",
    success: function (data) {
      var json = JSON.parse(data);
      status = json.status;
      if (status == "success") {
        mytable = $("#tabel_barang").DataTable();
        mytable.draw();
        //alert("Barang berhasil dihapus");
        Swal.fire("Berhasil!", "Barang berhasil dihapus!", "success");
        $("#" + id)
          .closest("tr")
          .remove();
      } else {
        //alert("Failed");
        Swal.fire("Gagal", "Barang berhasil diubah!", "error");
        return;
      }
    },
  });
}

$(document).on("submit", "#edit_barang", function (e) {
  e.preventDefault();
  $("#error_unit_barang2").html("");
  $("#error_nama_barang2").html("");
  $("#error_harga_pokok2").html("");
  $("#error_harga_jual2").html("");
  $("#error_kode_div2").html("");
  $("#error_kode_berat2").html("");
  $("#error_jumlah_kg2").html("");
  $("#error_kode_jual2").html("");
  $("#error_kode_tim2").html("");
  $("#error_kode_unit2").html("");

  var id = $("#btn_edit").val();
  var kodeBarang2 = $("#kode_barang2").val();
  var namaBarang2 = $("#nama_barang2").val();
  var hargaPokok2 = $("#harga_pokok2").val();
  var hargaJual2 = $("#harga_jual2").val();
  var kodeDiv2 = $("#kode_div2").val();
  var kodeBerat2 = $("#kode_berat2").val();
  var jumlahKg2 = $("#jumlah_kg2").val();
  var kodeJual2 = $("#kode_jual2").val();
  var kodeTim2 = $("#kode_tim2").val();
  var kodeUnit2 = $("#unitBarang2").val();

  var err = 0;

  if (kodeUnit2 == "") {
    $("#error_unit_barang2").html("Unit tidak boleh kosong!");
    err += 1;
  }
  if (namaBarang2 == "") {
    $("#error_nama_barang2").html("Nama barang tidak boleh kosong!");
    err += 1;
  }

  if (hargaPokok2 == "") {
    $("#error_harga_pokok2").html("Harga pokok tidak boleh kosong!");
    err += 1;
  }

  if (hargaJual2 == "") {
    $("#error_harga_jual2").html("Harga jual tidak boleh kosong!");
    err += 1;
  }

  if (kodeDiv2 == "") {
    $("#error_kode_div2").html("Kode divisi tidak boleh kosong!");
    err += 1;
  }

  if (kodeBerat2 == "") {
    $("#error_kode_berat2").html("Kode berat tidak boleh kosong!");
    err += 1;
  }

  if (jumlahKg2 == "") {
    $("#error_jumlah_kg2").html("Jumlah kg tidak boleh kosong!");
    err += 1;
  }

  if (kodeJual2 == "") {
    $("#error_kode_jual2").html("Kode jual tidak boleh kosong!");
    err += 1;
  }

  if (kodeTim2 == "") {
    $("#error_kode_tim2").html("Kode tim tidak boleh kosong!");
    err += 1;
  }
  if (err == 0) {
    $('#modal_konfirmasi_edit').modal('show');
  }
});

function edit(){

  var id = $("#btn_edit").val();
  var kodeBarang2 = $("#kode_barang2").val();
  var namaBarang2 = $("#nama_barang2").val();
  var hargaPokok2 = $("#harga_pokok2").val();
  var hargaJual2 = $("#harga_jual2").val();
  var kodeDiv2 = $("#kode_div2").val();
  var kodeBerat2 = $("#kode_berat2").val();
  var jumlahKg2 = $("#jumlah_kg2").val();
  var kodeJual2 = $("#kode_jual2").val();
  var kodeTim2 = $("#kode_tim2").val();
  var kodeUnit2 = $("#unitBarang2").val();

  $('#modal_konfirmasi_edit').modal('hide');
  $.ajax({
    url: "barang/edit-barang",
    type: "post",
    data: {
      kodeBarang2: kodeBarang2,
      namaBarang2: namaBarang2,
      hargaPokok2: hargaPokok2,
      hargaJual2: hargaJual2,
      kodeDiv2: kodeDiv2,
      kodeBerat2: kodeBerat2,
      jumlahKg2: jumlahKg2,
      kodeJual2: kodeJual2,
      kodeTim2: kodeTim2,
      kodeUnit2: kodeUnit2,
      id: id,
    },
    success: function (data) {
      var json = JSON.parse(data);
      var status = json.status;
      if (status == "true") {
        mytable = $("#tabel_barang").DataTable();
        mytable.draw();
        // alert("Barang berhasil diubah");
        Swal.fire("Berhasil!", "Barang berhasil diubah!", "success");
        $("#bagian_2_edit").hide();
        // $("#unitBarang").val("Pilih Unit");
        // $("#tabel_barang").DataTable().ajax.reload();
      } else {
        // alert("Barang gagal diubah");
        Swal.fire(
          "Berhasil",
          "Tidak ada perubahan data!",
          "success"
        );
        $("#bagian_2_edit").hide();
      }
    },
  });
}

// $(document).ready(function () {
//   table = $("#tabel_barang").DataTable({
//     dom: "Bfrtip",
//     buttons: ["copy", "csv", "excel", "pdf", "print"],
//   });
// });
$(".select2").select2({ width: "100%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});
