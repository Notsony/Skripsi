  <?php

session_start();
if(isset($_POST['editp'])){
   $id         =$_POST['id'];
   $nik        =$_POST['nik'];
   $judul      =$_POST['judul'];
   $smb_dana   =$_POST['smb_dana'];
   $jml_dana   =$_POST['jml_dana'];
   $proposal   =$_POST['proposal'];
   $akhir      =$_POST['akhir'];
   $tahun      =$_POST['tahun'];

   function redirect($url){
   $string = '<script type="text/javascript">';
   $string .= 'window.location = "' .$url. '"';
   $string .= '</script>';

   echo $string;
  }
  $host = mysql_connect("localhost","root","");
  $db = mysql_select_db("skripsi0005");

  
  //melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
  $editp = mysql_query("UPDATE daftar_pnl SET id='$id', nik='$nik', judul='$judul', smb_dana='$smb_dana', jml_dana='$jml_dana', proposal='$proposal', akhir='$akhir', tahun='$tahun' where id='$id'") or die(mysql_error());
  
  //jika query input sukses
  if($editp){
    
    echo 'Data berhasil di ubah! ';    //Pesan jika proses update sukses
    echo '<a href="index-admin-p.php">Kembali</a>'; //membuat Link untuk kembali ke halaman update
    
  }else{
    
    echo 'Gagal mengubah data! ';    //Pesan jika proses update gagal
    echo '<a href="editpnl.php">Kembali</a>';  //membuat Link untuk kembali ke halaman update
    
  }
 
}else{  //jika tidak terdeteksi tombol edit di klik
 
  //redirect atau dikembalikan ke halaman tambah
  echo '<script>window.history.back()</script>';
 
}
?>

  

     


