<?php
           require_once (dirname(__FILE__) . "/common.inc.php");
           include_once("excel/reader.php");
                 $tmp = $_FILES['file']['tmp_name'];
                 if (empty ($tmp)) {
                       ShowMsg("请选择要导入的Excel文件！","renzheng.php");
                         exit;
                 }

                 $save_path = "xls/";
                 $file_name = $save_path.date('Ymdhis') . ".xls";
                 if (copy($tmp, $file_name)) {
                         $xls = new Spreadsheet_Excel_Reader();
                         $xls->setOutputEncoding('utf-8');
                         $xls->read($file_name);
                         for ($i=2; $i<=$xls->sheets[0]['numRows']; $i++) {
                                 $name = $xls->sheets[0]['cells'][$i][1];
                                 $mobile = $xls->sheets[0]['cells'][$i][2];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][3];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][4];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][5];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][6];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][7];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][8];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][9];
                                 $biaoziduan = $xls->sheets[0]['cells'][$i][10];
                                 $data_values .= "('$name','$mobile','$biaoziduan','$biaoziduan','$biaoziduan','$biaoziduan','$biaoziduan','$biaoziduan','$biaoziduan','$biaoziduan'),";
                         }
                         $data_values = substr($data_values,0,-1); 
                         $sql= "INSERT INTO dede_renzheng (name,mobile,biaoziduan,biaoziduan,biaoziduan,biaoziduan,biaoziduan,biaoziduan,biaoziduan,biaoziduan) VALUES $data_values";
                        $dsql->ExecuteNoneQuery($sql);
                         $lastInsertID = $dsql->GetLastID();
                     if($dsql){
                            ShowMsg("成功导入！","renzheng.php");
                     }else{
                            ShowMsg("导入失败！","renzheng.php");
                     }
                 }
               exit();
?>