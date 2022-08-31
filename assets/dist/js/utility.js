
$(".select2").select2({ width: "250%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

var global_bln="";

  $(document).on("click", "#btnTutupBulan", function () {
    $("#error_unit").html("");
    $("#aktif_unit").html("");
    $('#modal_tutupBulan').modal('show');
    get_unit();
    
    // Swal.fire({
    //     title: 'Are you sure?',
    //     text: "Proses Tutup Bulan akan mengakhiri seluruh transaksi pada bulan Juni 2022",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Yes, delete it!'
    //   }).then((result) => {
    //     console.log();
    //     if (result.value == true) {
    //       Swal.fire(
    //         'Deleted!',
    //         'Your file has been deleted.',
    //         'success'
    //       )
    //     }
    //   })
});

function get_unit() {
  $.ajax({
    url: "utility/unit",
    success: function (data) {
      $("#unit").html(data);
      //$("#unit_spm").html(data);
    },
  });
}

$(document).on("click", "#btnProses", function (event) {
  
  var unit = $("#unit").val();

  var err = 0;

  if (unit == "") {
    $("#error_unit").html("Unit tidak boleh kosong!");
    err += 1;
  }

  if (err == 0) {
    $('#modal_konfirmasi_tutupBulan').modal('show');
  } 

  
  //$('#modal_tutupBulan').modal('hide');
  
});

function tutupBulan(){
  $("#error_unit").html("");
  $("#aktif_unit").html("");
  $('#modal_tutupBulan').modal('hide');
  $('#modal_konfirmasi_tutupBulan').modal('hide');

  var unit = $("#unit").val();
  
    // console.log(global_bln);
    // console.log(unit);
    $.ajax({
      url: "utility/tutup-bulan",
      type: "post",
      data: {
        unit: unit,
        bln: global_bln
        
      },
      success: function (data) {
        var json = JSON.parse(data);
        var status = json.status;
        if (status == "success") {
         
          Swal.fire("Berhasil!", "Tutup bulan berhasil dilakukan!", "success");
          
         
        } else {
         
          Swal.fire("Gagal!", "Bulan aktif masih sama dengan bulan current", "error");
        }
      },
    });

}


function get_bulan_aktif() {
  var kd_unit = $("#unit").val();
  $.ajax({
    url: "utility/get-bulan-aktif",
    type: "POST",
    data: {
      kd_unit: kd_unit,
    },
    success: function (data) {
      data = JSON.parse(data);
      //console.log(data.tgl_aktif);
      $("#aktif_unit").html("Bulan aktif : " + data.tgl_aktif);
      global_bln = data.tgl_aktif;
    },
  });
}


$("#unit").on("change", function () {
  $("#error_unit").html("");
  get_bulan_aktif();
});