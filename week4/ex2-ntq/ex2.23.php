<?php
	// require_once 'Database/MySQL.php';

	class Articles {
		var $db;
		var $result;

		function Articles(&$db){
			$this->db = &$db;
			$this->readArticles();
		}

		function readArticles(){
			$sql = "SELECT * FROM tblstudent LIMIT 0,5";
			$this->result = $this->db->query($sql);
		}

		function fetchResult(){
			return $this->result->fetch_assoc();
		}
	}

	// $db = new MySQL('localhost', 'root', '', 'student');
	// $db = mysqli_connect('localhost', 'root', '', 'student');
	$db = new mysqli('localhost', 'root', '', 'student');

	$articles = new Articles($db);

	while ($row = $articles->fetchResult()){
		echo '<pre>'; 
		print_r($row);
		echo '</pre>';
	}

	$db->close();

	class Auth{


		/**
		 * Instance of Session class
		 * @var Session
		 */
		var $session;


		function Auth(&$dbConn, $redirect, $md5 = true){
			$this->dbConn = &$dbConn;
			$this->redirect = $redirect;
			$this->md5 = $md5;
			$this->session = new Session();
			$this->checkAddress();
			$this->login();
		}
	}

?>