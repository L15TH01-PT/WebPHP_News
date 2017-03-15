<?php  
define('DBHOST','localhost');
define('DBNAME','tintuc');
define('DBUSER','root');
define('DBPASS','');
define('BASE_PATH',str_replace('\\','/',__DIR__).'/');
define("BASE_URL",
    sprintf(
    '%s://%s%s/',
    isset($_SERVER['HTTPS']) ? 'https' : 'http',
    $_SERVER['HTTP_HOST'],
    str_replace($_SERVER["DOCUMENT_ROOT"],'', str_replace('\\','/',__DIR__ ))
    //$_SERVER['PHP_SELF']
));
//define("BASE_URL_AJAX", "http://localhost:55472/ajax/");
define('NUM_IN_PAGE',2);

// Dùng cho hàm đổi thời gian. Cập nhật chính xác múi giờ
// Nếu đúng rồi thì thôi.
//date_default_timezone_set("Asia/Ho_Chi_Minh");

/*Những file hình dc phép upload*/
$fileExt = ["jpg","png","bitmap"];
?>
