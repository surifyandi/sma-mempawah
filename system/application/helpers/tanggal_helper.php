<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//helper konversi tanggal

if ( ! function_exists('convert_tanggal')){
	function convert_tanggal($tgl){
		$tanggal = substr($tgl,8,2);
		$bulan = get_bulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		$indo_time = $tanggal." ".$bulan." ".$tahun;
			return $indo_time;	
	}
}

if ( ! function_exists('get_bulan')){
	function get_bulan($bln){
		switch ($bln){
			case 1: 
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Ags";
				break;
			case 9:
				return "Sept";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}
}