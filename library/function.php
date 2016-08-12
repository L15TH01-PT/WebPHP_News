<?php  
function error_msg ($error) {
	if ($error != null) {
		echo '<div class="error_msg">'.$error.'</div>';
	}
}
function redirect ($url) {
	header("location:$url");
	exit();
}
function isset_value_input_text($variable,$data = null){
	if (isset($_POST[$variable])) {
		echo 'value ="'.$_POST[$variable].'"';
	}else{
    echo 'value ="'.$data.'"';
  }
}

// Giữ lại giá trị của ***textarea*** khi refresh page(Vd: trong trường hợp thiếu Dl thêm ko thành công)
function isset_value_input_text_area($variable,$data = null){
	if (isset($_POST[$variable])) {
		echo $_POST[$variable];
	}else{
    echo $data;
  }
}

// Hàm đổi thời gian. Từ (1 dãy số giây từ năm 1970 đến thời điểm hiện tại) ra định dạng ngày giờ

// Nhớ cấu hình thời gian trong config.php
function convert_time($time){
	$datetime = gmdate("H:i:s | d-m-y", $time + 3600 * (7 * date("I")));
	return $datetime;
}

function time_elapsed_string($ptime)
{	
    $etime = time() - $ptime;
    if ($etime < 1)
    {
        return '0 seconds';
    }
    $a = array( 365 * 24 * 60 * 60  =>  'năm',
                 30 * 24 * 60 * 60  =>  'tháng',
                      24 * 60 * 60  =>  'ngày',
                           60 * 60  =>  'giờ',
                                60  =>  'phút',
                                 1  =>  'giây'
                );
    $a_plural = array( 'năm'   => 'năm',
                       'tháng'  => 'tháng',
                       'ngày'    => 'ngày',
                       'giờ'   => 'giờ',
                       'phút' => 'phút',
                       'giây' => 'giây'
                );
    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str).' trước';
        }
    }
}

function get_extension($img){
  $pos = strrpos($img, ".");
  $ext = substr($img, $pos+1);
  $ext = strtolower($ext);
  return $ext;
}

function change_image_name($img){
  $name = str_replace(" ", "_", $img);
  $name = strtolower($name);
  $name = time()."_".$name;
  return $name;
}

?>