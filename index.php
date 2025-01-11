<?php 

$rows=[
    [
 
    ]
];



 if(isset($_POST['btnOk'])){
     $nama=$_POST['nama'];
     $kelas=$_POST['kls'];
     $kehadiran=$_POST['kehadiran'];

     $data=$nama.'_'.$kelas.'_'.$kehadiran.'|';

     $file=
     fopen('n.txt', 'a');
     fwrite($file, $data);
     fclose($file);
 }
    
 $file=fopen('n.txt', 'r');
 $text= fread($file, filesize('n.txt'));
 $text=explode('|', $text);
for($i=0; $i<count($text)-1; $i++){
 $text[$i]=explode('_', $text[$i]);
 }
unset($text[count($text)-1]);
fclose($file);

$r=$text;

function ascending($r){
  $tmp=0;
 for($i=1; $i < count($r); $i++){
   for($j = count($r)-1; $j>= $i; $j--){
     if($r[$j][0] < $r[$j-1][0]){
       $tmp = $r[$j];
       $r[$j]=$r[$j-1];
       $r[$j-1]=$tmp;
     }
   }
 }
return $r;
}
function descending($r){
  $tmp=0;
 for($i=1; $i < count($r); $i++){
   for($j = count($r)-1; $j>= $i; $j--){
     if($r[$j][0] > $r[$j-1][0]){
       $tmp = $r[$j];
       $r[$j]=$r[$j-1];
       $r[$j-1]=$tmp;
     }
   }
 }
return $r;
}

if(isset($_POST['asc'])){
  $r=ascending($r);
}
if(isset($_POST['dsc'])){
  $r=descending($r);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Kehadiran Siswa</title>

    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style type="text/css">
     

       .btn {
  display: inline-block;
  line-height: 50px;
  padding: 0 30px;
  -webkit-transition: all 0.4s ease;
  -o-transition: all 0.4s ease;
  -moz-transition: all 0.4s ease;
  transition: all 0.4s ease;
  cursor: pointer;
  font-size: 15px;
  text-transform: capitalize;
  font-weight: 700;
  color: #fff;
  font-family: inherit;
}

.btn--radius {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

.btn--radius-2 {
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  border-radius: 5px;
}

.btn--pill {
  -webkit-border-radius: 20px;
  -moz-border-radius: 20px;
  border-radius: 20px;
}

.btn--green {
  background: #57b846;
}

.btn--green:hover {
  background: #4dae3c;
}

.btn--blue {
  background: #4272d7;
}

.btn--blue:hover {
  background: #3868cd;
}

.btn--blue-2 {
  background: #2c6ed5;
}

.btn--blue-2:hover {
  background: #185ac1;
}

.btn--red {
  background: #ff4b5a;
}

.btn--red:hover {
  background: #eb3746;
}

  



   </style>

</head>

<body>

    <div class="page-wrapper bg-dark p-t-100 p-b-50">
      <br>
      <center>
      <h2><font color="ffffff">SISTEM KEHADIRAN SISWA KELAS XII KIMIA</font></h2>
</center>
</br>
        <div class="wrapper wrapper--w900">
            <div class="card card-6">
                <div class="card-heading">
                </div>
                <div class="card-body">
                  <div class="card-footer">
                    <form method="POST">
                        <div class="form-row">
                            <div class="name">Nama</div>
                            <div class="value">
                                <input class="input--style-6" type="text" name="nama"  autocomplete="off" />
                                <p>*menggunakan huruf kapital</p>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Kelas/Jurusan</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-6" type="text" name="kls" placeholder=""  autocomplete="off">
                                    <p>*menggunakan huruf kapital
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Kehadiran</div>
                            <div class="value">
                                <div class="input-group">
                                <select name="kehadiran" >
                                <option value="hadir" >------------------------------------</option> 
                                <option value="hadir" >Hadir</option>
                                <option value="izin">Izin</option>
                                <option value="sakit">Sakit</option>
                                <option value="alpa">Alpa</option>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="button">
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name = "btnOk">SIMPAN</button>
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name = "asc">ASCENDING</button>
                    <button class="btn btn--radius-2 btn--blue-2" type="submit" name = "dsc">DESCENDING</button>
                </div>
      
                    </form>
                </div>
               
                <div class="container w-100">
                <table class="table table-striped">
               
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Kelas/Jurusan</th>
      <th>Kehadiran</th>
		</tr>
	</thead>
	<tbody>
            <?php $i=1; ?>
            <?php foreach($r as $row): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row[0] ?></td>
                <td><?= $row[1] ?></td>
                <td><?= $row[2] ?></td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
  </table>
            </div>
            
        </div>
    </div>
    

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
  
    <!-- Main JS-->
    <script src="js/global.js"></script>
   

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->