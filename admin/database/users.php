<?php 
class users{
	private $table = "users";
	private $conn;

	public $name;
	public $status;
	public $username;
	public $password;
	public $role;
	public $phone;
	public $image;
	public $email;
	public $email_verified;
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
	public function readAllUsersWithName(){
		$sql= "SELECT * FROM $this->table WHERE name=:get_name";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_name",$this->name);
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
			$this->email = $row['email'];
			$this->email_verified = $row['email_verified'];
			$this->phone = $row['phone'];
			$this->role = $row['role'];
			$this->username = $row['username'];
			$this->password = $row['password'];
			$this->image = $row['image'];
			$this->name = $row['name'];
			$this->status = $row['status'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	public function roleAdmin(){
		$sql= "SELECT * FROM $this->table WHERE role=2";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	public function userLogin(){
		$sql= "SELECT * FROM $this->table WHERE username=:get_username AND password=:get_password";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_username",$this->username);
		$stmt->bindParam(":get_password",$this->password);
		$stmt->execute();
		return $stmt;
	}

	public function create(){
		$sql = "INSERT INTO $this->table 
		SET username = :get_username,
			name = :get_name,
			password = :get_password,
			phone = :get_phone,
			role = :get_role,
			image = :get_image,
			email = :get_email,
			email_verified = :get_email_verified,
			status = :get_status,
			created_at = :get_created_date,
			updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_username",$this->username);
		$stmt->bindParam(":get_name",$this->name);
		$stmt->bindParam(":get_password",$this->password);
		$stmt->bindParam(":get_phone",$this->phone);
		$stmt->bindParam(":get_role",$this->role);
		$stmt->bindParam(":get_image",$this->image);
		$stmt->bindParam(":get_email",$this->email);
		$stmt->bindParam(":get_email_verified",$this->email_verified);
		$stmt->bindParam(":get_status",$this->status);
		$stmt->bindParam(":get_created_date",$this->created_at);
		$stmt->bindParam(":get_updated_date",$this->updated_at);

		if($stmt->execute()){
			return true;
		}
	}

	public function update(){
		$sql = "UPDATE $this->table 
		SET username = :get_username,
			name = :get_name,
			password = :get_password,
			phone = :get_phone,
			role = :get_role,
			image = :get_image,
			email = :get_email,
			email_verified = :get_email_verified,
			status = :get_status,
			updated_at = :get_updated_date
			WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->bindParam(":get_username",$this->username);
		$stmt->bindParam(":get_name",$this->name);
		$stmt->bindParam(":get_password",$this->password);
		$stmt->bindParam(":get_phone",$this->phone);
		$stmt->bindParam(":get_role",$this->role);
		$stmt->bindParam(":get_image",$this->image);
		$stmt->bindParam(":get_email",$this->email);
		$stmt->bindParam(":get_email_verified",$this->email_verified);
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