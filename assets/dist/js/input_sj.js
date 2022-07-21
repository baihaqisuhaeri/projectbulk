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
