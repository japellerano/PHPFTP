<?php
Class FTPClient
{
	public function __construct()
	{
	}
	
	public function getMessages()
	{
		return $this->messageArray;
	}
	
	public function connect($server, $ftpUser, $ftpPassword, $isPassive = false)
	{
		$this->connectionId = ftp_connect($server);
		
		$loginResult = ftp_login($this->connectionId, $ftpUser, $ftpPassword);
		
		ftp_pasv($this->connectionId, $isPassive);
		
		if ((!$this->connectionId) || (!$loginResult))
		{
			$this->logMessage('FTP connection has failed!');
			$this->logMessage('Attempted to connect to ' . $server . ' for user ' . $ftpUser, true);
			return false;
		}
		else
		{
			$this->logMessage('Connected to ' . $server . ', for user ' . $ftpUser);
			$this->loginOk = true;
			return true;
		}
	}
	
	/* Private Variables & Functions */
	private #connectionId;
	private $loginOk = false;
	private $messageArray = array(); 
	
	private function logMessage($messsage)
	{
		$this->messageArray[] = $message;
	}
}
?>