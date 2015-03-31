<?php
session_start();
include("function/start_order.php");
include("../config/conn.php");
if(!isset($_SESSION["uid"])||$_SESSION["uid"]==""){
	exit;
}else{
	$uid=$_SESSION["uid"];
	$user=get_user_by_uid($conn,$uid);
}
if(isset($_POST["order_oid"])&&$_POST["order_oid"]!=""){
	$oid=$_POST["order_oid"];
}else{
	exit;
}
$order=get_order_by_oid($conn,$oid,$uid);
$recom=get_recom_by_rcid($conn,$order["rcid"]);
$get_time=$order["gettime"];
$create_time=$order["create_time"];
$address=get_address_by_aid($conn,$order["aid"]);
// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf_include.php');


// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		//$image_file = K_PATH_IMAGES.'logo_example.jpg';
		//$this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('droidsansfallback','', 20);
		// Title
		$this->Cell(0, 12, '回收电脑订单确认页', 0, false, 'C', 0, '', 1, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('droidsansfallback','', 12);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetFont('droidsansfallback','', 13);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('大连维特罗网络服务有限责任公司');
$pdf->SetTitle('回收电脑订单确认页');
$pdf->SetSubject('回收电脑订单确认页');
$pdf->SetKeywords('回收电脑,维特罗,大连维特罗网络服务有限责任公司,');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------


// add a page
$pdf->AddPage();

// set some text to print
$txt = "
尊敬的用户您好，本页为订单确认页面，请保存或者打印。订单确认页以及快递单将共同作为向维特罗网络服务有限责任公司邮寄电脑的凭证。

";
// print a block of text using Write()
$pdf->Write(2, $txt);
$pdf->Write(2, '用户姓名：'.$user["name"]);
$pdf->Write(2, '
联系方式：'.$user["cell"]."    ".$user["mail"]);
$pdf->Write(2, '

回收的机器参数：'.'
        品牌及型号：'.$recom["brand"].'
        处理器（CPU）：'.$recom["cpu"].'
        内存：'.$recom["ram"].'
        硬盘：'.$recom["disk"].'
        显卡：'.$recom["graphic"].'
        显示器：'.$recom["monitor"].'
        使用年数：'.$order["usedyear"].'
        数量：'.$order["quantity"]);
$pdf->Write(2, '

取件地址：'.'
        '.$address["address"].'
        '.$address["city"].'  '.$address["province"]);
$pdf->Write(2, '

取件时间：'.$get_time);
$pdf->Write(2, '

订单创建时间：'.$create_time);
// ---------------------------------------------------------
$pdf->SetXY(130, 200);
$pdf->Image('images/vetro.jpg', '', '', 60, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);
//Close and output PDF document
$pdf->Output('agreement.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>