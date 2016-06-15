<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( ! function_exists('tanggal'))
{
function tanggal($var = '')
{
$tgl = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
$pecah = explode("-", $var);
return $pecah[2]." ".$tgl[$pecah[1] - 1]." ".$pecah[0];
}
}