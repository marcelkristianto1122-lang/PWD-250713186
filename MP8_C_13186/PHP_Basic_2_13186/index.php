<?php

    if($_POST){
        $bayaran = $_POST['bayaran'];
        $jenis = $_POST['jenis'];
        $harga = 600000;
        $messaage = array();
        $message2 = "";
        $bayarankembali = 0;

            if(empty($bayaran) || empty($jenis)){
                $message[] = "Harap Lengkapi semua data.";
            } 

            if(!preg_match("/^[a-zA-Z]*$/", $jenis)){
                $message[] = "Jenis pembaaran hanya boleh mengandung Huruf.";
            }

            if(!empty($message)){
                foreach($message as $msg){
                    echo"<p style = 'color:red;'> !! ". htmlspecialchars($msg)."!!</p>";
                }
            }else{
                    function jenisPembayaran($jenis){
                        switch(strtolower($jenis)){
                            case 'a':
                                $potongan = 0.75;
                                break;
                            case 'b':
                                $potongan  = 0.50;
                                break;
                            case 'c':
                                $potongan = 0.25;
                                break;
                            case 'd':
                                $potongan = 0;
                                break;
                            default:
                                $potongan = 0;
                        }
                        return $potongan;
                    }
                    function infoJenisPembayaran($jenis){
                            switch(strtolower($jenis)){
                                case 'a':
                                    $info = "Cicilan 25%";
                                    break;
                                case 'b':
                                    $info = "Cicilan 50%";
                                    break;
                                case 'c':
                                    $info = "Cicilan 75%";
                                    break;
                                case 'd':
                                    $info = "Lunas";
                                    break;
                                default:
                                    $info = "Jenis Pembayaran tidak valid";
                            }
                            return $info;
                        }

                        $potongan  = jenisPembayaran($jenis);
                        $infoJenis = infoJenisPembayaran($jenis);

                        function totalBayar($harga,$potongan){
                            return $harga -($harga * $potongan);
                        }
                        
                        $totalBayar = totalBayar($harga, $potongan);

                        function Pembayaran($bayaran, $totalbayar){
                            if($bayaran < $totalbayar){
                                return null;
                            }else{
                                $bayarankembali  = $bayaran - $totalBayar;
                                return $bayarankembali;
                            }
                        }

                        $bayarankembali = pembayaran($bayaran, $totalBayar);

                        if($bayarankembali == null){
                            $message2  = "Jumlah yang dibayar kurang dari total pembayaran. Silahkan bayar sesuai jumlah yang ditentukan";
                            $bayarankembali  =  0;
                        }
                        
                        if(!empty($messaage)){
                            echo "<p style  = 'color:red;'> !! "  . htmlspecialchars($messaage). " !! </p>";
                        }else{
                            echo"<h2>Informasi Pembayaran</h2>";
                            echo"<p><strong>Jumlah yang dibayar: </strong> Rp " . htmlspecialchars($bayaran)."</p>";
                            echo"<p><strong>Jenis Pembayaran:  </strong> Rp " . htmlspecialchars($infoJenis)."</p>";
                            if($potongan == 0){
                                if(strtolower($jenis) == 'd'){
                                    echo"<p>Pembayaran Lunas.</p>";
                                }else{
                                    echo"<p>Maaf Jenis pembayaran tidak valid. Tidak ada potongan yang diberikan. </p>";
                                }
                            }else{
                                echo"<p>Anda mendapatkan potongan".(htmlspecialchars($potongan * 100)) . "% untuk pembayaran SPP Anda.</p>";
                            }
                            echo'<p style = "font-weight: bold;font-size: 18px;">Total Pembayaran : Rp'. htmlspecialchars($totalBayar).' </p>';
                            echo '<p style = "font-weight: bold;font-size: 18px;">Kembalian : Rp'. htmlspecialchars($bayarankembali).' </p>';

                        }    
                                       
                }




        
    }else{
        echo "Silahkan isi formulir untuk melakukan pembayaran . ";
    }
            
?>
    