<?php
require FCPATH . 'vendor/autoload.php';
class Cetak extends CI_CONTROLLER
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // var_dump($_SESSION['nama']);
        // die();
        // $bulan = $this->db->query("SELECT DISTINCT blnaktif FROM dbm002");,0
        // $data['bulanAktif']  = $bulan->result_array();
        // var_dump($data[0]['blnaktif']);
        // die();

        //  $data['ini'] = $datai;

        $this->load->view('material/Head_view');
        $this->load->view("Input_sj_view");
    }

    function print()
    {

        $no_sj = $_POST['cetak_no_sj'];
        var_dump($no_sj);
        // die();
        $tes = "tes";
        $this->load->view('Input_sj_view', '', true);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<p style="margin-left: 580px; padding-top: -30px; line-height: 0.4;font-size: 12px;">31-05-2022</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">' . $no_sj . '</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">B4532SMK</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">00032</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">segel12</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">PO2</p>');

        $mpdf->WriteHTML('<p style="margin-left: 20px; font-size: 12px;"><b>PT.BAYER INDONESIA TBK </b></p>');
        $mpdf->WriteHTML('<p style="margin-left: 20px; font-size: 12px;">JL.JEND SUDIRMAN KAV 10-11 JAKARTA GD.MID PLAZA LT.14-16, JAKARTA</p>');
        $mpdf->WriteHTML('<br><br><br>');
        $mpdf->WriteHTML('<p style="margin-left: -25px; font-size: 12px;">1 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        ODOURLESS TR 50 KG &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 100</p>');

        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">15</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">20</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">5</p>');
        $mpdf->WriteHTML('<p style="margin-left: 470px; line-height: 1;font-size: 12px;">10</p>');
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML('<p style="margin-left: 25px; font-size: 12px;">KET2</p>');
        $mpdf->Output();

        // $mpdf->Output("aa.pdf", 'D');
    }
}
