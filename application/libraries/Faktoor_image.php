<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Tehran');

class faktoor_image
{
	public $path_save = "faktoors";
	public $font = "Yekan.ttf";
	public $template = "resid.png";
	public $expr_time = 60;


	public function create_factoor_image($name, $amount, $type_name, $date, $sabtid = "")
	{

		//remove catch
		$this->del_exp_faktoors($this->get_faktors(), $this->expr_time);

		//create image
		$image = imagecreatefrompng($this->template);
		$font = $this->font;

		//color
		$white = imagecolorallocate($image, 255, 255, 255);
		$black = imagecolorallocate($image, 0, 0, 0);

		//write
		$this->write_persian_text_center($image, $name, $font, $white, 600);
		$this->write_persian_text_center($image, " رسید پرداخت جهت $type_name", $font, $white, 60);
		$this->write_persian_text_center($image, number_format($amount), $font, $white, 760, false);
		$this->write_persian_text_center($image, $sabtid, $font, $white, 910, false);
		$this->write_persian_text($image, $date, $font, $black, 83, 170, false);

		//path
		$path = $this->create_path_img($type_name, $sabtid);

		//save
		if (imagepng($image, $path)) {
			imagedestroy($image);
			return $path;
		} else {
			imagedestroy($image);
			return false;
		}
	}

	public function create_path_img($type, $sabtid, $date = null)
	{

		// this is a bug
		if (is_null($date)) {
			$date = date("Y-m-d_H-i-s");
		}

		$filename = $this->path_save . "/$sabtid-$date-$type.png";
		return $filename;
	}

	public function write_persian_text($image, $text, $font, $color, $x, $y, $cp = true, $size = 40)
	{
		// cp : convert to persian
		if ($cp) {
			include_once("FarsiGD.php");
			$p = new FarsiGD();
			$text = $p->persianText($text, 'fa', 'regular');
		}

		imagettftext($image, $size, 0, $x, $y, $color, $font, $text);
	}

	public function write_persian_text_center($image, $text, $font, $color, $y, $cp = true, $size = 40)
	{
		$tb = imagettfbbox($size, 0, $font, $text);
		$x = ceil((900 - $tb[2]) / 2);
		$this->write_persian_text($image, $text, $font, $color, $x, $y, $cp);
	}

	public function show_factoor_img_tag($filename, $class = '', $width = '100%')
	{
		$link = base_url($filename);
		echo "<a href=" . $link . "><img src='" . $link . "' class='$class' width='$width' ></a>";
		return $link;
	}

	public function download($path)
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="' . basename($path) . '"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($path));
		readfile($path);
	}

	public function createAndDownload($data)
	{
		$path = $this->create_factoor_image(
			$data['name'],
			$data['amount'],
			$data['type_name'],
			$data['date'],
			$data['sabtid']
		);

		$this->download($path);
	}

	function convert_datetype($data)
	{
		$sudstr = substr($data, 23, 19);
		$arrstr = explode('_', $sudstr);
		return str_replace('-', '/', $arrstr[0]) . ' ' . str_replace('-', ':', $arrstr[1]);
	}
	//in libs
	function get_faktors()
	{
		$directory = $this->path_save;
		$images = array_diff(glob($directory . "/*.png"), array('..', '.'));
		return $images;
	}

	function del_exp_faktoors($iamges, $exprtime)
	{
		if (count($iamges) > 5) {
			$time1 = date("Y/m/d H:i:s"); // now time
			foreach ($iamges as $iamge) {
				$time2 = $this->convert_datetype($iamge);
				$diff = strtotime($time1) - strtotime($time2);
				if ($diff > $exprtime) {
					unlink($iamge);
				}
			}
		}
	}
}
