<?php
	/* File : ajax.php
	 * Author : Manish Kumar Jangir
	*/
	class AJAX {
		
		private $database = NULL;
		private $_query = NULL;
		private $_fields = array();
		public  $_index = NULL;
		const DB_HOST = "localhost";
		const DB_USER = "root";
		const DB_PASSWORD = "";
		const DB_NAME = "commers";
		
		
		public function __construct(){
			$this->db_connect();					// Initiate Database connection
			$this->process_data();
		}
		
		/*
		 *  Connect to database
		*/
		private function db_connect(){
			$this->database = mysql_connect(self::DB_HOST,self::DB_USER,self::DB_PASSWORD);
			if($this->database){
				$db =  mysql_select_db(self::DB_NAME,$this->database);
			} else {
				echo mysql_error();die;
			}
		}
		
		private function process_data(){
			$this->_index = ($_REQUEST['index'])?$_REQUEST['index']:NULL;
			$id = ($_REQUEST['id'])?$_REQUEST['id']:NULL;
			switch($this->_index){
				case 'city':
					$this->_query = "SELECT * FROM shipping order by shipping_city asc";
					$this->_fields = array('shipping_id','shipping_city');
					break;
				/*case 'distric':
					$cut = explode("-", $id);
					$this->_query = "SELECT * FROM shipping_record where shipping_city = '$cut[0]'";
					$this->_fields = array('id_shipping_record','shipping_distric');
					break;*/
				case 'method':
					$cut2 = explode("-", $id);
					$this->_query = "SELECT * FROM shipping WHERE shipping_id='$cut2[0]'";
					$this->_fields = array('shipping_id','shipping_city');
					break;
				default:
					break;
			}
			$this->show_result();
		}
		
		public function show_result(){
			echo '<option value="">Select '.$this->_index.'</option>';
			if($this->_index == "method") {
				$query2 = mysql_query($this->_query);
				while($result2 = mysql_fetch_array($query2)) {
				$entity_id2 = $result2[$this->_fields[0]];
				echo "<option value='$entity_id2-Reguler'>JNE Reguler (1-2 Days)</option>
				<option value='$entity_id2-Oke'>JNE Oke (2-3 Days)</option>
				<option value='$entity_id2-Yes'>JNE Yes (1 Day)</option>";
				}
			} else {
				$query = mysql_query($this->_query);
				while($result = mysql_fetch_array($query)){
					$entity_id = $result[$this->_fields[0]];
					$enity_name = $result[$this->_fields[1]];
					echo "<option value='$entity_id-$enity_name'>$enity_name</option>";
				}
			}
		}
	}
	
	$obj = new AJAX;
	
?>