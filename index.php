<?php 
	require_once 'Classes/PHPExcel/IOFactory.php';
	require_once 'Classes/PHPExcel.php';
   //require_once '/class/Database.class.php';
/*echo __FILE__;
die();*/

$mang_du_lieu = array(
   0 => array('name' => 'Nguyen Van A', 'phone' => '0123456789', 'email' => 'anv@yahoo.com'),
   1 => array('name' => 'Nguyen Van B', 'phone' => '9876543210', 'email' => 'bnv@yahoo.com'),
   2 => array('name' => 'Nguyen Van C', 'phone' => '0123498765', 'email' => 'cnv@yahoo.com')
);

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()
   ->setCreator("Tên người tạo")
   ->setLastModifiedBy("Tên người chỉnh sửa cuối cùng")
   ->setTitle("example excel");

$index_worksheet = 0;
$objPHPExcel->setActiveSheetIndex($index_worksheet)
   ->setCellValue('A1', 'Tên khách hàng')
   ->setCellValue('B1', 'Điện thoại!')
   ->setCellValue('C1', 'Email');

 $hang = 2;

foreach ($mang_du_lieu as $row) {
   $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue('A' . $hang, $row['name'])
      ->setCellValue('B' . $hang, $row['phone'])
      ->setCellValue('C' . $hang, $row['email']);
   $hang++;
}

$objPHPExcel->getActiveSheet()->setTitle('worksheet_0');



$objPHPExcel->setActiveSheetIndex(0);
/*$export_filename = "{$file_view}";
   header("Content-Type:  application/x-msexcel");
   header("Expires: 0");
   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
   header('Content-Disposition: attachment; filename='. $export_filename .'.xls');

   header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="01simple.xlsx"');
header('Cache-Control: max-age=0');*/

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
// $objWriter->save(str_replace('.php', '.xlsx', __FILE__));
  $objWriter->save("file/04featuredemo.xlsx", __FILE__);
// Echo done
echo date('H:i:s') , " Done writing files". "</br>";
echo 'Files have been created in ' , getcwd().'/file';

?>