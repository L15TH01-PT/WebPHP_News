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

?>