$("#bagian_2_edit").hide();
var table;
$(document).ready(function () {
  //datatables
  table = $("#tabel_cabang").DataTable({
    scrollX: true,
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], //Initial no order.

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "cabang/tabel-cabang",
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

  $("#tabel_cabang tbody").on("click", ".edit_cabang", function () {
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
    $("#nama_cabang2").val(data[1]);
    $("#alamat1_cabang2").val(data[2]);
    $("#alamat2_cabang2").val(data[3]);
    $("#alamat3_cabang2").val(data[4]);
    $("#nomor_telepon2").val(data[5]);
    $("#nama_kontak2").val(data[6]);
    $("#nama_kepala_cabang2").val(data[7]);
    $("#jabatan2").val(data[8]);
    $("#npwp2").val(data[9]);
    $("#sk2").val(data[10]);
    $("#tanggal_sk2").val(data[11]);
    $("#nama_fp2").val(data[12]);
    $("#lokasi2").val(data[13]);
    $("#kode_nomor2").val(data[14]);

    $("#tanggal_aktif2").val(data[15]);
    $("#tutup_bulan2").val(data[16]);
    $("#nama_pt2").val(data[17]);
    $("#alamat_pjk12").val(data[18]);
    $("#alamat_pjk22").val(data[19]);
    $("#kode_spm2").val(data[20]);
    $("#plaf_unit2").val(data[21]);

    $("#btn_edit").val(id);
  });
  $("#bagian_2_edit").hide();
});

// function tambahBarang() {
$(document).on("submit", "#tambahCabang", function (e) {
  e.preventDefault();

  var namaCabang = $("#nama_cabang").val();
  var alamat1Cabang = $("#alamat1_cabang").val();
  var alamat2Cabang = $("#alamat2_cabang").val();
  var alamat3Cabang = $("#alamat3_cabang").val();
  var nomorTelepon = $("#nomor_telepon").val();
  var namaKontak = $("#nama_kontak").val();
  var namaKepalaCabang = $("#nama_kepala_cabang").val();
  var jabatan = $("#jabatan").val();
  var npwp = $("#npwp").val();
  var sk = $("#sk").val();
  var tanggalSk = $("#tanggal_sk").val();
  var namaFp = $("#nama_fp").val();
  var lokasi = $("#lokasi").val();
  var kodeNomor = $("#kode_nomor").val();

  var tanggalAktif = $("#tanggal_aktif").val();

  var namaPt = $("#nama_pt").val();
  var alamatPjk1 = $("#alamat_pjk1").val();
  var alamatPjk2 = $("#alamat_pjk2").val();
  var kodeSpm = $("#kode_spm").val();
  var plafonUnit = $("#plaf_unit").val();

  if (
    namaCabang != "" &&
    alamat1Cabang != "" &&
    alamat2Cabang != "" &&
    alamat3Cabang != "" &&
    nomorTelepon != "" &&
    namaKontak != "" &&
    namaKepalaCabang != "" &&
    jabatan != "" &&
    npwp != "" &&
    sk != "" &&
    tanggalSk != "" &&
    namaFp != "" &&
    lokasi != "" &&
    kodeNomor != "" &&
    tanggalAktif != "" &&
    namaPt != "" &&
    alamatPjk1 != "" &&
    alamatPjk2 != "" &&
    kodeSpm != "" &&
    plafonUnit != ""
  ) {
    $.ajax({
      url: "cabang/tambah-cabang",
      type: "post",
      data: {
        namaCabang: namaCabang,
        alamat1Cabang: alamat1Cabang,
        alamat2Cabang: alamat2Cabang,
        alamat3Cabang: alamat3Cabang,
        nomorTelepon: nomorTelepon,
        namaKontak: namaKontak,
        namaKepalaCabang: namaKepalaCabang,
        jabatan: jabatan,
        npwp: npwp,
        sk: sk,
        tanggalSk: tanggalSk,
        namaFp: namaFp,
        lokasi: lokasi,
        kodeNomor: kodeNomor,

        tanggalAktif: tanggalAktif,

        namaPt: namaPt,
        alamatPjk1: alamatPjk1,
        alamatPjk2: alamatPjk2,
        kodeSpm: kodeSpm,
        plafonUnit: plafonUnit,
      },
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#tabel_cabang").DataTable();
          mytable.draw();
          Swal.fire("Berhasil!", "Cabang berhasil ditambahkan!", "success");
          $("#nama_cabang").val("");
          $("#alamat1_cabang").val("");
          $("#alamat2_cabang").val("");
          $("#alamat3_cabang").val("");
          $("#nomor_telepon").val("");
          $("#nama_kontak").val("");
          $("#nama_kepala_cabang").val("");
          $("#jabatan").val("");
          $("#npwp").val("");
          $("#sk").val("");
          $("#tanggal_sk").val("");
          $("#nama_fp").val("");
          $("#lokasi").val("");
          $("#kode_nomor").val("");
          $("#tanggal_aktif").val("");

          $("#nama_pt").val("");
          $("#alamat_pjk1").val("");
          $("#alamat_pjk2").val("");
          $("#kode_spm").val("");
          $("#plaf_unit").val("");
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
$(document).on("click", ".deleteCabang", function (event) {
  var table = $("#tabel_cabang").DataTable();
  event.preventDefault();
  var id = $(this).data("id");

  Swal.fire({
    title: "Apakah anda yakin ingin menghapus cabang ini ? ",
    text: "Barang tidak dapat dikembalikan setelah dihapus!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "cancel",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.dismiss !== "cancel") {
      $.ajax({
        url: "cabang/hapus-cabang",
        data: {
          id: id,
        },
        type: "post",
        success: function (data) {
          var json = JSON.parse(data);
          status = json.status;
          if (status == "success") {
            mytable = $("#tabel_cabang").DataTable();
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
      Swal.fire("Berhasil!", "Cabang berhasil dihapus!", "success");
    } else {
      return null;
      // Swal.fire("Berhasil!", "Barang berhasil dihapus!", "success");
    }
  });
});

$(document).on("submit", "#edit_cabang", function (e) {
  e.preventDefault();
  var id = $("#btn_edit").val();
  var namaCabang2 = $("#nama_cabang2").val();
  var alamat1Cabang2 = $("#alamat1_cabang2").val();
  var alamat2Cabang2 = $("#alamat2_cabang2").val();
  var alamat3Cabang2 = $("#alamat3_cabang2").val();
  var nomorTelepon2 = $("#nomor_telepon2").val();
  var namaKontak2 = $("#nama_kontak2").val();
  var namaKepalaCabang2 = $("#nama_kepala_cabang2").val();
  var jabatan2 = $("#jabatan2").val();
  var npwp2 = $("#npwp2").val();
  var sk2 = $("#sk2").val();
  var tanggalSk2 = $("#tanggal_sk2").val();
  var namaFp2 = $("#nama_fp2").val();
  var lokasi2 = $("#lokasi2").val();
  var kodeNomor2 = $("#kode_nomor2").val();

  var tanggalAktif2 = $("#tanggal_aktif2").val();

  var namaPt2 = $("#nama_pt2").val();
  var alamatPjk12 = $("#alamat_pjk12").val();
  var alamatPjk22 = $("#alamat_pjk22").val();
  var kodeSpm2 = $("#kode_spm2").val();
  var plafonUnit2 = $("#plaf_unit2").val();

  if (
    namaCabang2 != "" &&
    alamat1Cabang2 != "" &&
    alamat2Cabang2 != "" &&
    alamat3Cabang2 != "" &&
    nomorTelepon2 != "" &&
    namaKontak2 != "" &&
    namaKepalaCabang2 != "" &&
    jabatan2 != "" &&
    npwp2 != "" &&
    sk2 != "" &&
    tanggalSk2 != "" &&
    namaFp2 != "" &&
    lokasi2 != "" &&
    kodeNomor2 != "" &&
    tanggalAktif2 != "" &&
    namaPt2 != "" &&
    alamatPjk12 != "" &&
    alamatPjk22 != "" &&
    kodeSpm2 != "" &&
    plafonUnit2 != ""
  ) {
    $.ajax({
      url: "cabang/edit-cabang",
      type: "post",
      data: {
        namaCabang2: namaCabang2,
        alamat1Cabang2: alamat1Cabang2,
        alamat2Cabang2: alamat2Cabang2,
        alamat3Cabang2: alamat3Cabang2,
        nomorTelepon2: nomorTelepon2,
        namaKontak2: namaKontak2,
        namaKepalaCabang2: namaKepalaCabang2,
        jabatan2: jabatan2,
        npwp2: npwp2,
        sk2: sk2,
        tanggalSk2: tanggalSk2,
        namaFp2: namaFp2,
        lokasi2: lokasi2,
        kodeNomor2: kodeNomor2,

        tanggalAktif2: tanggalAktif2,

        namaPt2: namaPt2,
        alamatPjk12: alamatPjk12,
        alamatPjk22: alamatPjk22,
        kodeSpm2: kodeSpm2,
        plafonUnit2: plafonUnit2,
        id: id,
      },
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "true") {
          mytable = $("#tabel_cabang").DataTable();
          mytable.draw();
          Swal.fire("Berhasil!", "Cabang berhasil diubah!", "success");
          $("#bagian_2_edit").hide();
          // $("#unitBarang").val("Pilih Unit");
          // $("#tabel_barang").DataTable().ajax.reload();
        } else {
          Swal.fire(
            "Gagal",
            "Cabang gagal diubah, mohon coba kembali",
            "error"
          );
        }
      },
    });
  } else {
    alert("Ada data yang masih kosong");
  }
});
