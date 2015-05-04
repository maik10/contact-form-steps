<?php 
require_once('clases/DB.php');
class option{
	public $list;

	public function option(){

	}
	public function getCountrys(){
		$db = new DB();
		$conn= $db->getConnection();
		if($result = $conn->query('SELECT slabel,svalue FROM mastertable_det WHERE mnid=22')){
			while ($row = $result->fetch(PDO::FETCH_ASSOC))
				$this->list .="<option value='".$row['svalue']."'>".$row['slabel']."</option>";
			}
			return $this->list;
	}
}

?>
