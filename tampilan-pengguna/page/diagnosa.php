<?php
  include "../../proses-login/koneksi.php";
  $sql_konsultasi = "select * from temp_konsultasi";
  $hasil_konsultasi = mysqli_query($konek, $sql_konsultasi);
  if(!$hasil_konsultasi){
    die ("Gagal Query..".mysqli_error($konek));
  }
?>

<?php
  while($r = mysqli_fetch_array($hasil_konsultasi)){
    $data[] = array($r['temp_dugaan'], $r['temp_belief']);
  }

  $all=array();
  foreach($data as $d) $all[]=$d[0];
  $unique=array_unique(explode(',',implode(',',$all)));
  $fod=implode(',',$unique);
  echo "<pre>";
  //echo $fod; echo ("<br>"); //uncomment untuk melihat hasil irisan
  $rst=array();

  while(!empty($data)){
    $result=array();
    $symptom[0]=array_shift($data);
    $symptom[1]=array($fod,1-$symptom[0][1]);
      if(empty($rst))
        $result[0]=array_shift($data);
      else
        foreach($rst as $k=>$r)
          if($k!="&theta;")
            $result[]=array($k,$r);
    $theta=1;
    foreach($result as $r) $theta-=$r[1];
    $result[]=array($fod,$theta);
    $m=count($result);
    $rst=array();

    for($x=0;$x<$m;$x++){
      for($y=0;$y<2;$y++){
        if(!($x==$m-1 && $y==1)){
          $v=explode(',',$symptom[$y][0]);
          $w=explode(',',$result[$x][0]);
          sort($v);sort($w);
          $vw=array_intersect($v,$w);
          if(empty($vw)) $v="&theta;";else $v=implode(',',$vw);
          if(!isset($rst[$v])) $rst[$v]=$result[$x][1]*$symptom[$y][1];
          else $rst[$v]+=$result[$x][1]*$symptom[$y][1];
        }
      }
    }
    foreach($rst as $k=>$r) if($k!="&theta;") $rst[$k]=$r/(1-(isset($rst["&theta;"])?$rst["&theta;"]:0));
    //print_r($rst); //uncomment untuk melihat semua hasil iterasi
  }
  unset($rst["&theta;"]);
  arsort($rst);
  //print_r($rst); // untuk melihat hasil iterasi terakhir

  //referensi dari stackoverflow tentang "Fake loop" https://stackoverflow.com/questions/1617157/how-to-get-the-first-item-from-an-associative-php-array/42066999
  $key = $value = NULL;
  foreach ($rst as $key => $value) {
    break;
  }
  //$nama = "$key = $value[0]"; echo $nama; // menampilkan nama penyakit pada array indeks pertama
  //echo $value; //menampilkan isi dari indeks pertama

  $hitung = $value * 100;
  // echo $hitung." %";

  $sql_simpan = "UPDATE temp_hasil SET nilai_tinggi = $hitung WHERE id = 1";
  $hasil_simpan = mysqli_query($konek, $sql_simpan);
  if(!$hasil_simpan){
    die ("Gagal Query..".mysqli_error($konek));
  }else{
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=diagnosa-hasil.php">';
}
?>
