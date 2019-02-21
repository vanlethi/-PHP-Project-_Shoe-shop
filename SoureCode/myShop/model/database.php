<?php 
class database
{
	public $link;
	public function __construct()
	{
		$this->link = mysqli_connect("localhost","root","","db2") or die();
		mysqli_set_charset($this->link,"utf8");
	}

	public function insert ($table, array $data ){
		$sql = "INSERT into {$table}";
		$columns = implode(',',array_keys($data));
		$values = "";
		$sql .= '(' . $columns .')';

		foreach ($date as $field => $value) {
			if (is_string($value)) {
				$values .= "'". mysql_real_escape_string($this->link,$value)."',";
			}else{
				$values .= mysql_real_escape_string($this->link,$value).',';
			}
		}

		$values = substr($values, 0, -1);
		$sql .= "VALUES (". $values . ')';

		mysqli_query($this->link,$sql) or die("Lỗi QUERY INSERT" .mysql_error($this->link));
		return mysqli_insert_id($this->link);

	}

	public function update ($table, array $data, array $conditions ){
		$sql = "UPDATE {$table}";
		$set = "SET";
		$where = "WHERE";

		foreach ($data as $field => $value) {
			if (is_string($value)) {
				$set .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\',';
			}else{
				$set .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) .',';
			}
		}

		$set = substr($set, 0, -1);

		foreach ($conditions as $field => $value) {
			if (is_string($value)) {
				$where .= $field .'='.'\''. mysqli_real_escape_string($this->link, xss_clean($value)) .'\'AND';
			}else{
				$where .= $field .'='. mysqli_real_escape_string($this->link, xss_clean($value)) .'AND ';
			}
		}

		$where = substr($where, 0, -5);
		$sql .= $set . $where;

		mysqli_query($this->link,$sql) or die("Lỗi QUERY UPDATE" .mysql_error());
		return mysqli_affected_rows($this->link);
	}


	public function delete($table,$id){
		$sql = "DELETE FROM {table} WHERE id = $id";
		mysqli_query($this->link,$sql)or die("Lỗi truy vấn DELETE".mysqli_error($this->link));
		return mysqli_affected_rows($this->link);
	}

	/*Delete Array*/

	public function deletewhere($table,$data = array()){
		foreach ($data as $id) {
			$id = intval($id);
			$sql = "DELETE FROM {table} WHERE id = $id";
			mysqli_query($this->link,$sql)or die("Lỗi truy vấn DELETE".mysqli_error($this->link));
		}
		return true;
	}

	public function fetchSql($sql){
		$result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn SQL". mysqli_error($this->link));
		$data = [];
		if ($result) {
		 	while ($row = mysqli_fetch_assoc($result)) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function insertSql($sql){
		$result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn SQL". mysqli_error($this->link));
		return $result;
	}

	public function fetchAll($table){
		$sql = "SELECT * FROM {$table} WHERE 1";
		$result = mysqli_query($table,$sql) or die("Lỗi truy vấn fetchAll" . mysqli_error($this->link));
		$data = [];
		if ($result) {
			while ($num = mysqli_fetch_assoc($result)) {
				$data[] = $num;
			}
		}
		return $data;
	}

	public function fetchAlllimit($table,$column,$status,$limit){
		$sql = "SELECT * FROM {$table} WHERE $column = '$status' LIMIT $limit";
		$result = mysqli_query($table,$sql) or die("Lỗi truy vấn fetchAll" . mysqli_error($this->link));
		$data = [];
		if ($result) {
			while ($num = mysqli_fetch_assoc($result)) {
				$data[] = $num;
			}
		}
		return $data;
	}

	public function fetchOne($table,$query){
		$sql = "SELECT * FROM {$table} WHERE";
		$sql .= $query;
		$sql .= "LIMIT 1";
		$result = mysqli_query($table,$sql) or die("Lỗi truy vấn fetchOne" . mysqli_error($this->link));
		return mysqli_fetch_assoc($result);
	}

	public function countTable($table){
		$sql = "SELECT id FROM {$table}";
		$result = mysqli_query($this->link,$sql)or die("Lỗi truy vấn Countable".mysqli_error($this->link));
		$num = mysqli_num_rows($result);

		return $num;
	}

	public function fetchJones($table, $sql,$total=1,$page,$row,$pagi = true){
		$data = [];
		if ($pagi == true) {
			$sotrang = ceil($total/$row);
			$start = ($page - 1) * $row;
			$sql .= "LIMIT $start, $row";
			$data = ["Page" => $sotrang];

			$result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn fetchJones " . mysql_error($this->link));
		}else{
			$result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn fetchJones " . mysql_error($this->link));
		}

		if ($result) {
			while ($num = mysqli_fetch_assoc($result)) {
				$data[] = $num;
			}
		}

		return $data;
	}

	public function fetchJone($table, $sql,$page=0,$row,$pagi = false){
		$data = [];
		if ($pagi == true) {
			$total = $this->countTable($table);
			$sotrang = ceil($total/$row);
			$start = ($page - 1) * $row;
			$sql .= "LIMIT $start, $row";
			$data = ["Page" => $sotrang];

			$result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn fetchJone " . mysql_error($this->link));
		}else{
			$result = mysqli_query($this->link,$sql) or die("Lỗi truy vấn fetchJone " . mysql_error($this->link));
		}

		if ($result) {
			while ($num = mysqli_fetch_assoc($result)) {
				$data[] = $num;
			}
		}

		return $result;
	}

}