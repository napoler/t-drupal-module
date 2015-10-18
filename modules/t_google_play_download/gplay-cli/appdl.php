<?php
include_once ("../drupal.php");
//include_once ("simple_html_dom.php");
//include_once ("libs/tags.php");
//include_once ("libs/postapp.php");
?>
<?php


$id="com.enlightouch.lungteng.sh";


//$_GET['id']="com.android.chrome";
$id=$_GET['id'];
//./gplay-cli.py  -d com.android.chrome -f apk -y -p -c credentials_us.conf

//$dl_cmd="python gplay-cli.py  -d $id -f apk -y -p -c credentials_us.conf";
 //$dl_480="youtube-dl -f $f -o $path_480 https://www.youtube.com/watch?v=$dl_url";
  //执行下载
//exec($dl_cmd, $output, $return_var);

//print_r($output);

//print_r($return_var);


$fileUrl=dl_apk($id);
 
print_r($fileUrl);
//$apk=file_upload($fileUrl,$file_path="files");
print_r($apk);

//echo "</br>开始上传视频...";


function file_upload($fileUrl,$file_path="files"){
	
	//echo $file_path;
	
	
//	echo 's3://'.$fileUrl;

$file_temp = file_get_contents('http://www.voteapps.com/'.$fileUrl);
//print_r();
//Saves a file to the specified destination and creates a database entry.
  if(!file_exists($public_path.'/apkfiles'))  drupal_mkdir($public_path.'/apkfiles');
$file_arry = file_save_data($file_temp, 's3://'.$fileUrl, FILE_EXISTS_REPLACE);
 //print_r($file_arry);
//转存视频和图片
if($file_arry){
// echo "</br>上传成功...";
	  return $file_arry;
}else{
 //echo "</br>再次尝试上传...";
$file_arry = file_save_data($file_temp, 's3://'.$fileUrl, FILE_EXISTS_REPLACE);
	if($file_arry){
		//清空视频
  //unlink($$fileUrl);
	//	echo "</br>上传成功...";
		  return $file_arry;
		
		
}else{
	//清空视频
 // unlink($$fileUrl);
	//	echo "</br>上传失败...";
 
   return $file_arry;
 
 //header('HTTP/1.1 500 Internal Server Error');
 
	//exit;
}
}

  
  


}







function dl_apk($id){
	
	
	//$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f apkfiles -y -p -c credentials_us.conf";
		$dl_cmd="python /home/wwwroot/www.voteapps.com/terry/gplay-cli/gplay-cli.py  -d $id -f /home/wwwroot/files -y -p -c credentials_us.conf";
 //$dl_480="youtube-dl -f $f -o $path_480 https://www.youtube.com/watch?v=$dl_url";
  //执行下载
exec($dl_cmd, $output, $return_var);

//print_r($output);

//print_r($return_var);

  //返回状态码 0 成功 1失败
	$array[code]=$return_var;
if($return_var=='0'){
	$time=time();
	$name=$id.$time;
	rename("/home/wwwroot/files/$id.apk", "/home/wwwroot/files/$name.apk");
 $array[file]="apkfiles/$name.apk";
	
}else{
	
	
}
	
	return $array;	
	
	
}

/************
echo "\nsystem";
$last_line = system('ls', $return_var);
echo "\nreturn_var:";
print_r($return_var);
echo "\nlast_line:";
print_r($last_line);

echo "\n\nexec";
exec('ls', $output, $return_var);
echo "\nreturn_var:";
print_r($return_var);
echo "\noutput:";
print_r($output);

echo "\n\nshell_exec";
$output = shell_exec('ls');
echo "\noutput:";
print_r($output);

*******/



?>