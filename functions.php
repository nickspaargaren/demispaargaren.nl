<?php

// wachtwoordincorrect melding
function wachtwoordincorrect()
{
	// echo "<span class=\"melding\">Gebruikersnaam en wachtwoord komen niet overeen, doei.</span>";
	echo "<style>.cms_container.loginscherm input {*border-bottom: 1px solid #F04042 !important; color: #F04042;} .cms_container.loginscherm input:focus {color: #666;}</style>";
}

// bestandsgrootte leesbaar
function bestandsgrootteLeesbaar($bytes)
{
	if ($bytes >= 1073741824) {
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	} elseif ($bytes >= 1048576) {
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	} elseif ($bytes >= 1024) {
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	} elseif ($bytes > 1) {
		$bytes = $bytes . ' bytes';
	} elseif ($bytes == 1) {
		$bytes = $bytes . ' byte';
	} else {
		$bytes = '';
	}

	return $bytes;
}


class ftp
{

	public function __construct($server, $username, $password)
	{
		$conn = ftp_connect($server);
		$login_result = ftp_login($conn, $username, $password);
		$this->connection = $conn;

		ftp_chdir($this->getConnection(), 'public_html/uploads');
	}

	public function getConnection()
	{
		return $this->connection;
	}

	public function isConnected()
	{
		return (is_resource($this->getConnection())) ? true : false;
	}

	public function delete($file)
	{
		return ($this->isConnected() === true) ? ftp_delete($this->getConnection(), $file) : false;
	}

	public function rename($old, $new)
	{
		return ($this->isConnected() === true) ? ftp_rename($this->getConnection(), $old, $new) : false;
	}

	public function disconnect()
	{
		if ($this->isConnected()) {
			ftp_close($this->connection);
		}
	}
}

class file
{

	public function isProduction(): bool
	{
		return isset(
			$_SERVER['FTP_SERVER'],
			$_SERVER['FTP_USERNAME'],
			$_SERVER['FTP_USERPASS'],
			$_SERVER['FTP_UPLOAD_FOLDER']
		);
	}

	public function upload($tmp_file, $target_file): string
	{

		move_uploaded_file($tmp_file, $target_file);

		return $target_file . ' is toegevoegd.';
	}


	public function delete($file): string
	{

		if ($this->isProduction()) {
			$ftp = new ftp($_SERVER['FTP_SERVER'], $_SERVER['FTP_USERNAME'], $_SERVER['FTP_USERPASS']);
			$ftp->delete($file);
			$ftp->disconnect();
		} else {
			unlink("../uploads/" . $file);
		}

		return $file . ' is verwijderd.';
	}
}


function checked(bool $checked): string
{
	if ($checked) {
		return 'checked="checked"';
	} else {
		return '';
	}
}
