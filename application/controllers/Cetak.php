<?php
require FCPATH . 'vendor/autoload.php';
// header("Content-type:application/pdf");

// // It will be called downloaded.pdf
// header("Content-Disposition:attachment;filename='downloaded.pdf'");

// //The PDF source is in original.pdf
// readfile("original.pdf");


class Cetak extends CI_CONTROLLER
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Input_sj_model');
    }

    function index()
    {
       

        $this->load->view('material/Head_view');
        $this->load->view("Input_sj_view");
    }

    function print()
    {

        //$no_sj = $_POST['cetak_no_sj'];
        $no_sj = $this->input->post('no_sj');
        $query_sj = $this->Input_sj_model->get_sj($no_sj);
       // $nama_customer = "";
        foreach($query_sj as $sj){
            $n_sales = $sj->n_sales;
            $tgl_sj = $sj->tgl_sj;
            $no_mobil = $sj->no_mobil;
            $k_sales = $sj->k_sales;
            $no_segel = $sj->no_segel;
            $no_po = $sj->no_po;
            $n_cus = $sj->n_cus;
            $alk_cus1 = $sj->alk_cus1;
            $alk_cus2 = $sj->alk_cus2;
            $alk_cus3 = $sj->alk_cus3;

            $k_barang = $sj->k_barang;
            $qty_kirim = $sj->qty_kirim;
            $kg_kirim = $sj->kg_kirim;
            $awal = $sj->awal;
            $akhir = $sj->akhir;
            $awl_presur = $sj->awl_presur;
            $awl_suhu = $sj->awl_suhu;
            $ket = $sj->ket;


        }
        $query_barang = $this->Input_sj_model->get_barang($k_barang);
     
        foreach($query_barang as $b){
            $n_barang = $b->n_barang;
        }

       // for($i=0; $i<2; $i++){

        
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<p style="margin-left: 510px; padding-top: -30px; line-height: 0.4;font-size: 12px;">31-05-2022</p>');
        $mpdf->WriteHTML('<p style="margin-left: 510px; line-height: 0.4;font-size: 12px;">' . $no_sj . '</p>');
        $mpdf->WriteHTML('<p style="margin-left: 510px; line-height: 0.4;font-size: 12px;">' . substr($no_mobil,0, strlen($str)-4) . '</p>');
        $mpdf->WriteHTML('<p style="margin-left: 510px; line-height: 0.4;font-size: 12px;">' . $k_sales . '</p>');
        $mpdf->WriteHTML('<p style="margin-left: 510px; line-height: 0.4;font-size: 12px;">' . $no_segel . '</p>');
        $mpdf->WriteHTML('<p style="margin-left: 510px; line-height: 0.4;font-size: 12px;">' . $no_po . '</p>');

         $mpdf->WriteHTML('<p style="margin-left: 20px; font-size: 12px;"><b>' . $n_cus . '</b></p>');
         $mpdf->WriteHTML('<p style="margin-left: 20px; font-size: 12px;">' . $alk_cus1 . ' ' . $alk_cus2 . '</p>');
         $mpdf->WriteHTML('<p style="margin-left: 20px; font-size: 12px;">' . $alk_cus3 . '</p>');
         
         $mpdf->WriteHTML('<br><br><br>');
         $mpdf->WriteHTML('<p style="margin-left: -25px; font-size: 12px;">1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         ' . "$n_barang" . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . (int)$qty_kirim . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ' . (int)$kg_kirim . '</p>');

        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">15</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">20</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">5</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">10</p>');
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML('<p style="margin-left: 25px; font-size: 12px;">' . $ket . '</p>');

        $mpdf->WriteHTML('<br><br><br><br><br><br>');
        $mpdf->WriteHTML('<p style="margin-left: 450px; font-size: 12px;">' . $n_sales . '</p>');
         $mpdf->Output();
        
       // $mpdf->Output('filename.pdf', \Mpdf\Output\Destination::FILE);
       // }

         //$mpdf->Output("aa.pdf", 'I');
    }
}
