<?php 
include_once('DB.php');
class option{
	public $list;

	public function option(){

	}
	public function getCountrys(){
		$db = new DB();
		$conn= $gdb->getConnection();
		if($result = $conn->query('SELECT slabel,svalue FROM mastertable_det WHERE mnid=22')){
			while ($row = $result->fetch(PDO::FETCH_ASSOC))
				$this->list .="<option value='".$row['slabel']."'>".$row['svalue']."</option>";
			}
			return $this->list;
	}
}

?>