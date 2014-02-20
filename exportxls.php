<?php
           require_once (dirname(__FILE__) . "common.inc.php");
            $output = fopen('php://output','w') or die("can't open php://output");
                        header('Content-Type: application/csv');
                        header('Content-Disposition: attachment; filename="认证列表.csv"');
                        $arrkeys = array(
                            iconv('utf-8','gb2312','姓名'),
                            iconv('utf-8','gb2312','电话'),
                            iconv('utf-8','gb2312','表格名称'),
                            iconv('utf-8','gb2312','表头名称'),
                            iconv('utf-8','gb2312','表头名称'),
                            iconv('utf-8','gb2312','表头名称'),
                            iconv('utf-8','gb2312','表头名称'),
                            iconv('utf-8','gb2312','表头名称'),
                            iconv('utf-8','gb2312','表头名称'),
                            iconv('utf-8','gb2312','表头名称')
                            );
                        fputcsv($output, $arrkeys);
                        //取得符合条件的数组
                         $sql = "SELECT * FROM dede_renzheng";
                           $dsql->Execute('me',$sql);
                       while($row = $dsql->GetArray('me')){ 
                                $name =$row['name']; 
                                $mobile= $row['mobile']; 
                                $biaoziduan= $row['biaoziduan']; 
                               $biaoziduan= $row['biaoziduan']; 
                                $biaoziduan= $row['biaoziduan']; 
                                $biaoziduan= $row['biaoziduan']; 
                              $biaoziduan= $row['biaoziduan']; 
                              $biaoziduan= $row['biaoziduan']; 
                              $biaoziduan= $row['biaoziduan']; 
                               $biaoziduan= $row['biaoziduan']; 

                                $arrkeys = array(
                                    iconv('utf-8','gb2312',$name),
                                    iconv('utf-8','gb2312',$mobile),
                                    iconv('utf-8','gb2312',$biaoziduan),
                                    iconv('utf-8','gb2312',$biaoziduan),
                                    iconv('utf-8','gb2312',$biaoziduan),
                                    iconv('utf-8','gb2312',$biaoziduan),
                                    iconv('utf-8','gb2312',$biaoziduan),
                                    iconv('utf-8','gb2312',$biaoziduan),
                                    iconv('utf-8','gb2312',$biaoziduan),
                                    iconv('utf-8','gb2312',$sid)
                                    );
                                fputcsv($output, $arrkeys);
                            } 

                    fclose($output) or die("can't close php://output");
                    exit();
?>