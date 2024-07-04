<?php 
class subscribers{
	private $table = "subscribers";
	private $conn;

	public $verified_token;
	public $status;
	public $email;
	public $created_at;
	public $updated_at;
	public $id;
	public function __construct($db){
		$this->conn =$db;
	}
	public function readAll(){
		$sql= "SELECT * FROM $this->table";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function readSendMail(){
		$sql= "SELECT * FROM $this->table WHERE status = 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function read(){
		$sql= "SELECT * FROM $this->table
		WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$row=$stmt->fetch();
			$this->verified_token = $row['verified_token'];
			$this->status = $row['status'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	public function create(){
		$sql = "INSERT INTO $this->table 
		SET verified_token = :get_verified_token,
			email = :get_email,
			status = 1,
			created_at = :get_created_date,
			updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_verified_token",$this->verified_token);
		$stmt->bindParam(":get_email",$this->email);
		$stmt->bindParam(":get_created_date",$this->created_at);
		$stmt->bindParam(":get_updated_date",$this->updated_at);

		if($stmt->execute()){
			return true;
		}
	}

	public function update(){
		$sql = "UPDATE $this->table 
		SET verified_token = :get_verified_token,
			email = :get_email,
			status = :get_status,
			updated_at = :get_updated_date
			WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->bindParam(":get_verified_token",$this->verified_token);
		$stmt->bindParam(":get_email",$this->email);
		$stmt->bindParam(":get_status",$this->status);
		$stmt->bindParam(":get_updated_date",$this->updated_at);

		if($stmt->execute()){
			return true;
		}
	}

	public function delete(){
		$sql = "DELETE FROM $this->table 
		WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		if($stmt->execute()){
			return true;
		}
	}
}
 ?>