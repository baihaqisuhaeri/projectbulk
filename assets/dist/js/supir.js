$("#bagian_2_edit").hide();
var table;
$(document).ready(function () {
  //datatables
  table = $("#tabel_supir").DataTable({
    scrollX: true,
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], //Initial no order.

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "supir/tabel-supir",
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
    $("#nama_supir2").val(data[1]);

    $("#btn_edit").val(id);
  });
  $("#bagian_2_edit").hide();
});

get_unit_supir();

function get_unit_supir() {
  $.ajax({
    url: "supir/unit-supir",
    success: function (data) {
      $("#unitSupir").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

function get_unit_supir2() {
  $.ajax({
    url: "supir/unit-supir",
    success: function (data) {
      $("#unitSupir2").html(data);
      //$("#unit_spm").html(data);
    },
  });
}
// function tambahBarang() {
$(document).on("submit", "#tambahSupir", function (e) {
  e.preventDefault();

  $("#error_unit_supir").html("");
  $("#error_nama_supir").html("");

  var namaUnit = $("#unitSupir").val();
  var namaSupir = $("#nama_supir").val();

  var err = 0;

  if (namaUnit == "") {
    $("#error_unit_supir").html("Unit tidak boleh kosong!");
    err += 1;
  }
  

  if (namaSupir == "") {
    $("#error_nama_supir").html("Nama supir tidak boleh kosong!");
    err += 1;
  }

  if (err == 0) {
    $.ajax({
      url: "supir/tambah-supir",
      type: "post",
      data: {
        namaUnit: namaUnit,
        namaSupir: namaSupir,
      },
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#tabel_supir").DataTable();
          mytable.draw();
          Swal.fire("Berhasil!", "Supir berhasil ditambahkan!", "success");
          $("#unitSupir").val("").change();
          $("#nama_supir").val("");
        } else {
          alert("failed");
        }
      },
    });
  } 
});
//}
$(document).on("click", ".deleteSupir", function (event) {
  var table = $("#tabel_supir").DataTable();
  event.preventDefault();
  var id = $(this).data("id");

  Swal.fire({
    title: "Apakah anda yakin ingin menghapus supir ini ? ",
    text: "Supir tidak dapat dikembalikan setelah dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "cancel",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.dismiss !== "cancel") {
      $.ajax({
        url: "supir/hapus-supir",
        data: {
          id: id,
        },
        type: "post",
        success: function (data) {
          var json = JSON.parse(data);
          status = json.status;
          if (status == "success") {
            mytable = $("#tabel_supir").DataTable();
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
      Swal.fire("Berhasil!", "Supir berhasil dihapus!", "success");
    } else {
      return null;
      // Swal.fire("Berhasil!", "Barang berhasil dihapus!", "success");
    }
  });
});

$(document).on("submit", "#edit_supir", function (e) {
  e.preventDefault();

  $("#error_unit_supir2").html("");
  $("#error_nama_supir2").html("");


  var id = $("#btn_edit").val();
  var namaUnit2 = $("#unitSupir2").val();
  var namaSupir2 = $("#nama_supir2").val();

  var err = 0;

  if (namaUnit2 == "") {
    $("#error_unit_supir2").html("Unit tidak boleh kosong!");
    err += 1;
  }
  

  if (namaSupir2 == "") {
    $("#error_nama_supir2").html("Nama supir tidak boleh kosong!");
    err += 1;
  }

  if (err == 0) {
    $.ajax({
      url: "supir/edit-supir",
      type: "post",
      data: {
        id: id,
        namaUnit2: namaUnit2,
        namaSupir2: namaSupir2,
      },
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#tabel_supir").DataTable();
          mytable.draw();
          Swal.fire("Berhasil!", "Supir berhasil diubah!", "success");
          $("#bagian_2_edit").hide();
          // $("#unitBarang").val("Pilih Unit");
          // $("#tabel_barang").DataTable().ajax.reload();
        } else {
          Swal.fire("Gagal", "Supir gagal diubah, mohon coba kembali", "error");
          $("#bagian_2_edit").hide();
        }
      },
    });
  } 
});

$(".select2").select2({ width: "100%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});
