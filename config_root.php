<?
//echo $_SERVER["SERVER_NAME"]."<hr>";
function cale_server()
{
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	// if ($_SERVER["SERVER_NAME"]!='localhost' )  $pageURL .= "www.";
	 
	 if ($_SERVER["SERVER_PORT"] != "80") 
	      { $pageURL .= $_SERVER["HTTP_HOST"].":".$_SERVER["SERVER_PORT"]/*.$_SERVER["SCRIPT_NAME"]*/;} 
	 else {$pageURL .= $_SERVER["HTTP_HOST"]/*.$_SERVER["SCRIPT_NAME"]*/; }
	 
	 $pageURL=str_replace('www.www.','www.',$pageURL);
	 return $pageURL;
}
function cale($rel)
{
	 $pageURL = cale_server();
	 $nume_fis=substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	 
	 $dir_fis=str_replace($rel.$nume_fis,"",$_SERVER["SCRIPT_NAME"]); //echo  "/".$dir_fis."/";
	 return $pageURL.$dir_fis;
}
$cale_root=cale("formulare/");  // aici trebuie sa se scrie calea catre radacina, unde se afla index.php
$_SESSION['cale2root']=$cale_root;  //de ex:  http://wwww.exemplu.ro/magazin/formulare/  -> http://wwww.exemplu.ro/magazin/
$_SESSION['server2root']=cale_server()."/";  //doar numele serverului http://localhost/ fara magazin/
?>