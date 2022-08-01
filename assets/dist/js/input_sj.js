var table_alamat;





$(".select2").select2({ width: "100%" });

$(".select2bs4").select2({
  theme: "bootstrap4",
});

$("#nama_customer").on("change", function () {

  get_no_spm();
 
});


function get_no_spm() {
  var kodeCustomer = $("#nama_customer").val().split("|");
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

$("#unitSj").on("change", function () {
    //$("#data_plafon").slideUp("slow");
  
    var unit = $("#unitSj").val();
    get_customer();
   
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
  k_cus = $("#nama_customer").val().split("|");
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

    if ( alamatKirim2 == "") {
      $("#error_alamat_kirim2_baru").html("Alamat kirim 2 tidak boleh kosong!");
      err += 1;
    }

    if ( alamatKirim3 == "") {
      $("#error_alamat_kirim3_baru").html("Alamat kirim 3 tidak boleh kosong!");
      err += 1;
    }

    if ( npwpBaru == "") {
      $("#error_npwp_baru").html("NPWP tidak boleh kosong!");
      err += 1;
    }
    

  
    if (err == 0) {
      $('#modal_konfirmasi_tambah_alamat').modal('show');
  
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

    if ( alamatKirim1Modal == "") {
      $("#error_alamat_kirim1_modal").html("Alamat kirim 1 tidak boleh kosong!");
      err += 1;
    }

    if ( alamatKirim2Modal == "") {
      $("#error_alamat_kirim2_modal").html("Alamat kirim 2 tidak boleh kosong!");
      err += 1;
    }

    if ( alamatKirim3Modal == "") {
      $("#error_alamat_kirim3_modal").html("Alamat kirim 3 tidak boleh kosong!");
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