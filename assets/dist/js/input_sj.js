var table_alamat;
$(document).ready(function () {
  //datatables
  table_alamat = $("#tabel_alamat_kirim").DataTable({
    scrollX: true,
    processing: true, //Feature control the processing indicator.
    serverSide: true, //Feature control DataTables' server-side processing mode.
    order: [], //Initial no order.

    // Load data for the table's content from an Ajax source
    ajax: {
      url: "input-sj/tabel-alamat-kirim",
      type: "POST",
    },
  });

  $("#tabel_alamat_kirim tbody").on("click", ".pilih_alamat_kirim", function () {
    var data = table_alamat.row($(this).parents("tr")).data();
   // var id = $(this).data("id");
    


    $("#nama_supir2").val(data[1]);

    $("#btn_edit").val(id);
  });
  $("#bagian_2_edit").hide();
});




$(".select2").select2({ width: "100%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

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

$("#unitSj").on("change", function () {
    //$("#data_plafon").slideUp("slow");
  
    var unit = $("#unitSj").val();
    get_customer();
   
  });

$(document).on("click","#btnAlamatKirim",function() {
  $('#modal_alamat').modal('show');
});
  

function get_customer() {
    var unitSj = $("#unitSj").val();
  
    $.ajax({
      url: "input-sj/customer",
      type: "post",
      data: { unitSj: unitSj },
      success: function (data) {
        $("#nama_customer").html(data);
      },
    });
  }
