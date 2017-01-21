<?php
// class paging untuk halaman administrator
class Paging{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET[halaman])){
	$posisi=0;
	$_GET[halaman]=1;
}
else{
	$posisi = ($_GET[halaman]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 (untuk admin)
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=$_SERVER[PHP_SELF]?module=$_GET[module]&halaman=$i>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


// class paging untuk halaman produk (menampilkan semua produk) 
class Paging2{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET[halproduk])){
	$posisi=0;
	$_GET[halproduk]=1;
}
else{
	$posisi = ($_GET[halproduk]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= " <li class='active'><a href='#'><b>$i</b></a></li>";
  }
else{
  $link_halaman .= "<li><a href=halproduk-$i.html>$i</a></li>";
}
$link_halaman .= "";
}
return $link_halaman;
}
}


//Custom Page Navigation untuk semua berita
	class pageNavi_All{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['halproduk'])) {
				$posisi = 0;
				$_GET['halproduk'] = 1;
			} else {
				$posisi = ($_GET['halproduk'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<li><a class=\"first\" href=\"halproduk-1.html\"><<</a></li>";
				}			
				$link_halaman .= "<li><a  class=\"previouspostslink\"href=\"halproduk-".$prev.".html\"><</a></li>";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<li><span>...</span></li>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<li><a href=\"halproduk-".$i.".html\">".$i."</a></li>";
			}
			$angka .= "<li class='active'><a>".$halaman_aktif."</a></li>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<li><a href=\"halproduk-".$i.".html\">".$i."</a></li>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<li><span>...</span></li><li><a href=\"halproduk-".$jmlhalaman.".html\">".$jmlhalaman."</a></li>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "<li><a class=\"nextpostslink\" href=\"halproduk-".$next.".html\">></a></li>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "<li><a class=\"last\" href=\"halproduk-".$jmlhalaman.".html\">>></a></li>";
				}
			}
			
			return $link_halaman;
		}
	}

// class paging untuk halaman kategori (menampilkan semua kategori)
class Paging3{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET['halkategori'])){
	$posisi=0;
	$_GET['halkategori']=1;
}
else{
	$posisi = ($_GET['halkategori']-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";
// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=halkategori-$_GET[id]-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


// class paging untuk halaman agenda (menampilkan semua agenda) 
class Paging4{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET[halagenda])){
	$posisi=0;
	$_GET[halagenda]=1;
}
else{
	$posisi = ($_GET[halagenda]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=halagenda-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}


// class paging untuk halaman download (menampilkan semua download) 
class Paging5{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas){
if(empty($_GET[haldownload])){
	$posisi=0;
	$_GET[haldownload]=1;
}
else{
	$posisi = ($_GET[haldownload]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas){
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 
function navHalaman($halaman_aktif, $jmlhalaman){
$link_halaman = "";

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++){
  if ($i == $halaman_aktif){
    $link_halaman .= "<b>$i</b> | ";
  }
else{
  $link_halaman .= "<a href=haldownload-$i.html>$i</a> | ";
}
$link_halaman .= " ";
}
return $link_halaman;
}
}

?>
