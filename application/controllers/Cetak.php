<?php
require FCPATH . 'vendor/autoload.php';
class Cetak extends CI_CONTROLLER
{
    function __consttruct()
    {
        parent::__consttruct();
    }

    function print()
    {
        $tes = "tes";
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML('<p style="margin-left: 580px; padding-top: -30px; line-height: 0.4;font-size: 12px;">31-05-2022</p>');
        $mpdf->WriteHTML('<p style="margin-left: 580px; line-height: 0.4;font-size: 12px;">SUB2208001</p>');
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
    }
}
