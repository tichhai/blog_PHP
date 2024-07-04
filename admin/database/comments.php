<?php 
class comments{
	private $table = "comments";
	private $conn;

	public $id_parent_comment;
	public $id_blog;
	public $name;
	public $email;
	public $comment;
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
	public function readAllWithIDBlog(){
		$sql= "SELECT * FROM $this->table WHERE id_blog = :get_id_blog";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id_blog",$this->id_blog);
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
			$this->id_parent_comment = $row['id_parent_comment'];
			$this->id_blog = $row['id_blog'];
			$this->comment = $row['comment'];
			$this->name = $row['name'];
			$this->email = $row['email'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	public function create(){
		$sql = "INSERT INTO $this->table 
		SET id_parent_comment = :get_id_parent_comment,
			id_blog = :get_id_blog,
			name = :get_name,
			email = :get_email,
			comment = :get_comment,
			created_at = :get_created_date,
			updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id_parent_comment",$this->id_parent_comment);
		$stmt->bindParam(":get_id_blog",$this->id_blog);
		$stmt->bindParam(":get_name",$this->name);
		$stmt->bindParam(":get_email",$this->email);
		$stmt->bindParam(":get_comment",$this->comment);
		$stmt->bindParam(":get_created_date",$this->created_at);
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