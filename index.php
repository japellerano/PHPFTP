<?php

define('FTP_HOST', '66.84.0.145');
define('FTP_USER', 'p10r8267');
define('FTP_PASS', 'gold8kiko13248');

include('ftp_class.php');

$ftpObj = new FTPClient();

if ($ftpObj -> connect(FTP_HOST, FTP_USER, FTP_PASS))
{
	echo 'connected';
 
}
else
{
	echo 'Failed to connect';
	print_r($ftpObj -> getMessages());
}


?>