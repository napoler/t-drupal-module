<?php
//include_once ("../drupal.php");

//$_GET['id']="com.android.chrome";
$id=$_GET['id'];
$lang=$_GET['lang'];
//./gplay-cli.py  -d com.android.chrome -f apk -y -p -c credentials_us.conf
//python gplay-cli.py  -d com.superevilmegacorp.game -f /home/wwwroot/www.voteapps.com/apkfiles -y -p -c credentials_us.conf
//python gplay-cli.py  -d com.android.chrome -f /home/wwwroot/www.voteapps.com/apkfiles -y -p -c credentials_ko_mgscl29873.conf
//
//$dl_cmd="python gplay-cli.py  -d $id -f apk -y -p -c credentials_us.conf";
 //$dl_480="youtube-dl -f $f -o $path_480 https://www.youtube.com/watch?v=$dl_url";
 //	$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f /home/wwwroot/www.voteapps.com/apkfiles -y -p -c credentials_us.conf";
  //执行下载
 //exec($dl_cmd, $output, $return_var);

//print_r($output);

	//$config=array("a"=>"credentials_us.conf","b"=>"credentials_us_f1.conf");
//$cfg=array_rand($config,1);
	
	//echo $config[$cfg];
	
		
	$config=array(
	"a"=>"credentials_us.conf",
	"b"=>"credentials_us_f1.conf",
	"3"=>"credentials_us_f2.conf",
	"4"=>"credentials_us_f3.conf",
//	"5"=>"credentials_us_f4.conf",
	"6"=>"credentials_us_f5.conf",
 //	"fr"=>"credentials_fr.conf",
//  "it"=>"credentials_it.conf",
	// "it"=>"credentials_it.conf",
	  //hanguo 
   "ko"=>"credentials_ko_mgscl29873.conf",
	
	
	);
$cfg=array_rand($config,1);
	
	if($lang){
		
		
	 $cfg=$lang;	
		
		
	}
	
	
	
	
	
	
	
	//$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f apkfiles -y -p -c credentials_us.conf";
	$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f /home/wwwroot/www.voteapps.com/apkfiles -y -p -c $config[$cfg]";
	
 //echo $config[$cfg];
	// echo $dl_cmd;
	
	
	
	//$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f apkfiles -y -p -c credentials_us.conf";
	//	$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f /home/wwwroot/www.voteapps.com/apkfiles -y -p -c $config[$cfg]";
// echo $dl_cmd;
//print_r($return_var);
$json = json_encode(dl_apk($id));
 print($json );

  //json_encode(dl_apk($id));

//print_r($return_var);


function dl_apk($id){
	
	$config=array(
	"a"=>"credentials_us.conf",
	"b"=>"credentials_us_f1.conf",
	"3"=>"credentials_us_f2.conf",
	"4"=>"credentials_us_f3.conf",
	"5"=>"credentials_us_f4.conf",
	"6"=>"credentials_us_f5.conf",
	
	
	);
$cfg=array_rand($config,1);
	
	
	
	
	
	
	
	
	
	//$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f apkfiles -y -p -c credentials_us.conf";
	$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f /home/wwwroot/www.voteapps.com/apkfiles -y -p -c $config[$cfg]";
	
	//echo 	$dl_cmd;
 //$dl_480="youtube-dl -f $f -o $path_480 https://www.youtube.com/watch?v=$dl_url";
  //执行下载
exec($dl_cmd, $output, $return_var);

//print_r($output);

//print_r($return_var);

  //返回状态码 0 成功 1失败
	$array[code]=$return_var;
if($return_var=='0'){
	$time=time();
	$name=$id.$time."[www.apkdigg.co]";
	if(!file_exists("/home/wwwroot/www.voteapps.com/apkfiles/$id.apk")){
		$array[code]='1';
	}else{
		rename("/home/wwwroot/www.voteapps.com/apkfiles/$id.apk", "/home/wwwroot/www.voteapps.com/apkfiles/$name.apk");
       $array[file]="apkfiles/$name.apk";
	  $array[sha] = sha1_file("/home/wwwroot/www.voteapps.com/apkfiles/$name.apk");
	  $pack_url="/home/wwwroot/www.voteapps.com/apkfiles/$name.apk";
	//$array[pack_info]= drupal_http_request($pack_url)->data;
	//$array[pack_info]= curldom($pack_url);
	 $array['filemd5']= md5_file($pack_url);
	
         $array[pack_info]=apkinfo($pack_url);
	  
	//  $array[pack_info]=get_permissions($pack_url);
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	   
	}
	
	
	
}else{
	
	
}
	
	return $array;	
	
	
}

//获取权限信息
function get_permissions($id){
	
	
	
	
		$cmd="python /home/wwwroot/www.voteapps.com/terry/googleplay-api-master/permissions.py $id";
 
//	echo 	$cmd;
 //$dl_480="youtube-dl -f $f -o $path_480 https://www.youtube.com/watch?v=$dl_url";
  //执行下载
exec($cmd, $output, $return_var);

//print_r($output);

foreach($output as $ps){
	$permissions.=$ps.'</br>';
	
	
	
	
}

//print_r($permissions);
//print_r($return_var);
	
	return $permissions;
	
	
	
}


function apkinfo($path){
	
	
	
	include '/home/wwwroot/www.voteapps.com/terry/libs/apk-parser/examples/autoload.php';

//print_r($_GET[path]);


$apk = new \ApkParser\Parser($path);

$manifest = $apk->getManifest();
$permissions = $manifest->getPermissions();

//$info.='<pre>';
//$info="Package Name      : " . $manifest->getPackageName() . "" . PHP_EOL;
//$info.="Version           : " . $manifest->getVersionName() . " (" . $manifest->getVersionCode() . ")" . PHP_EOL;

$info[PackageName]= $manifest->getPackageName();
$info[version]= $manifest->getVersionName();
$info[MinSdkLevel]= $manifest->getMinSdkLevel();
$info[platform]= $manifest->getMinSdk()->platform;
//$info.="Min Sdk Level     : " . $manifest->getMinSdkLevel() . "" . PHP_EOL;
//$info.="Min Sdk Platform  : " . $manifest->getMinSdk()->platform . "" . PHP_EOL;
//$info.=PHP_EOL;
//$info.="------------- Permssions List -------------" . PHP_EOL;
$info[permissions]= $permissions;
// find max length to print more pretty.
$perm_keys = array_keys($permissions);
$perm_key_lengths = array_map(function ($perm) {
   return strlen($perm);
}, $perm_keys);
$max_length = max($perm_key_lengths);
/*************
foreach ($permissions as $perm => $detail) {
    $info.=str_pad($perm, $max_length + 4, ' ') . "=> " . $detail['description'] . " " . PHP_EOL;
    $info.=str_pad('', $max_length - 5, ' ') . ' cost    =>  ' . ($detail['flags']['cost'] ? 'true' : 'false') . " " . PHP_EOL;
    $info.=str_pad('', $max_length - 5, ' ') . ' warning =>  ' . ($detail['flags']['warning'] ? 'true' : 'false') . " " . PHP_EOL;
    $info.=str_pad('', $max_length - 5, ' ') . ' danger  =>  ' . ($detail['flags']['danger'] ? 'true' : 'false') . " " . PHP_EOL;

}


//$info.=PHP_EOL;
//$info.="------------- Activities  -------------" . PHP_EOL;


foreach ($apk->getManifest()->getApplication()->activities as $activity) {
    $info.=$activity->name . ($activity->isLauncher ? ' (Launcher)' : null) . PHP_EOL;
}

$info.=PHP_EOL;
$info.="------------- All Classes List -------------" . PHP_EOL;


foreach ($apk->getClasses() as $className) {
    $info.=$className . PHP_EOL;
}
*********/	
	
	return $info;
	
	
	
	
	
	
}






//获取供给simple_html_dom.php使用的数据获另 
function curldom($url){
    $headers = array( "User-Agent:Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.2 Safari/537.36", "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8", "Accept-Language: zh-cn,zh;q=0.5", "Accept-Charset: GB2312,utf-8;q=0.7,*;q=0.7", "Keep-Alive:300", "Connection:keep-alive", "Cookie: PREF=ID=4e6b51a77e350a54:U=7ebe22efb1649b6e:FF=1:LD=zh-CN:NW=1:TM=1283615001:LM=1286508781:S=E7ZONfJAlPMXLNg5; NID=40=QjA5nNXzJ0faTieT2C_aQLh_Nxg33xRsfjSsGyJXbGiT5osTiXYAtI0wYUFXHj9pqkXKb8RpHJIgl8t6mYwQp_BYRjCOfjP4P5d9fReMktJfd7_nAnzICsnbB7mj7_sW" );
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url );
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
     $text=curl_exec($ch);
return str_get_html($text); 
  return true;
}
