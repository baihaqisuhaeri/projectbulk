$("#bagian_2_edit").hide();
var table;
$(document).ready(function () {
  //datatables
  table = $("#tabel_mobil").DataTable({
    scrollX: true,
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], //Initial no order.

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "mobil/tabel-mobil",
      type: "POST",
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
          columns: [
            0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
            19, 20, 21,
          ],
        },
      },
      {
        extend: "print",
        exportOptions: {
          columns: [
            0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
            19, 20, 21,
          ],
        },
      },
      {
        extend: "pdfHtml5",
        exportOptions: {
          columns: [
            0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18,
            19, 20, 21,
          ],
        },
      },
      "colvis",
    ],
  });

  $("#tabel_mobil tbody").on("click", ".edit_mobil", function () {
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
    get_unit_mobil2();
    $("#plat_nomor2").val(data[1]);
    $("#nama_mobil2").val(data[2]);
    $("#tahun2").val(data[3]);
    $("#unitBarang2").val(data[4]);
    $("#tanggal_stnk2").val(data[5]);
    $("#tanggal_kirim2").val(data[6]);

    $("#btn_edit").val(id);
  });
  $("#bagian_2_edit").hide();
});

get_unit_mobil();

function get_unit_mobil() {
  $.ajax({
    url: "mobil/unit-mobil",
    success: function (data) {
      $("#unitMobil").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_unit_mobil2() {
  $.ajax({
    url: "mobil/unit-mobil",
    success: function (data) {
      $("#unitMobil2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}
// function tambahBarang() {
$(document).on("submit", "#tambahMobil", function (e) {
  e.preventDefault();

  var namaUnit = $("#unitMobil").val();
  var namaMobil = $("#nama_mobil").val();
  var platNomor = $("#plat_nomor").val();
  var tahun = $("#tahun").val();
  var tanggalStnk = $("#tanggal_stnk").val();
  var tanggalKirim = $("#tanggal_kirim").val();

  if (namaUnit != "" && namaMobil != "") {
    $.ajax({
      url: "mobil/tambah-mobil",
      type: "post",
      data: {
        namaUnit: namaUnit,
        namaMobil: namaMobil,
        platNomor: platNomor,
        tahun: tahun,
        tanggalStnk: tanggalStnk,
        tanggalKirim: tanggalKirim,
      },
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#tabel_mobil").DataTable();
          mytable.draw();
          Swal.fire("Berhasil!", "Mobil berhasil ditambahkan!", "success");
          $("#unitMobil").val("");
          $("#nama_mobil").val("");
          $("#plat_nomor").val("");
          $("#tahun").val("");
          $("#tanggal_stnk").val("");
          $("#tanggal_kirim").val("");
        } else {
          alert("failed");
        }
      },
    });
  } else {
    alert("Ada data yang masih kosong");
  }
});
//}
$(document).on("click", ".deleteMobil", function (event) {
  var table = $("#tabel_mobil").DataTable();
  event.preventDefault();
  var id = $(this).data("id");

  Swal.fire({
    title: "Apakah anda yakin ingin menghapus mobil ini ? ",
    text: "Mobil tidak dapat dikembalikan setelah dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "cancel",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.dismiss !== "cancel") {
      $.ajax({
        url: "mobil/hapus-mobil",
        data: {
          id: id,
        },
        type: "post",
        success: function (data) {
          var json = JSON.parse(data);
          status = json.status;
          if (status == "success") {
            mytable = $("#tabel_mobil").DataTable();
            mytable.draw();

            $("#" + id)
              .closest("tr")
              .remove();
          } else {
            alert("Failed");
            return;
          }
        },
      });
      Swal.fire("Berhasil!", "Mobil berhasil dihapus!", "success");
    } else {
      return null;
      // Swal.fire("Berhasil!", "Barang berhasil dihapus!", "success");
    }
  });
});

$(document).on("submit", "#edit_mobil", function (e) {
  e.preventDefault();
  var id = $("#btn_edit").val();
  var namaUnit2 = $("#unitMobil2").val();
  var namaMobil2 = $("#nama_mobil2").val();
  var platNomor2 = $("#plat_nomor2").val();
  var tahun2 = $("#tahun2").val();
  var tanggalStnk2 = $("#tanggal_stnk2").val();
  var tanggalKirim2 = $("#tanggal_kirim2").val();

  if (namaUnit2 != "" && namaMobil2 != "") {
    $.ajax({
      url: "mobil/edit-mobil",
      type: "post",
      data: {
        id: id,
        namaUnit2: namaUnit2,
        namaMobil2: namaMobil2,
        platNomor2: platNomor2,
        tahun2: tahun2,
        tanggalStnk2: tanggalStnk2,
        tanggalKirim2: tanggalKirim2,
      },
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#tabel_mobil").DataTable();
          mytable.draw();
          Swal.fire("Berhasil!", "Mobil berhasil diubah!", "success");
          $("#bagian_2_edit").hide();
          // $("#unitBarang").val("Pilih Unit");
          // $("#tabel_barang").DataTable().ajax.reload();
        } else {
          Swal.fire("Gagal", "Mobil gagal diubah, mohon coba kembali", "error");
        }
      },
    });
  } else {
    alert("Ada data yang masih kosong");
  }
});

// $("#unitMobil").on("change", function () {
//   get_supir();
// });

// function get_supir() {
//   var unitMobil = $("#unitMobil").val();
//   $.ajax({
//     url: "mobil/supir",
//     type: "post",
//     data: { unitMobil: unitMobil },
//     success: function (data) {
//       $("#nama_supir").html(data);
//     },
//   });
// }

$(".select2").select2({ width: "100%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});
