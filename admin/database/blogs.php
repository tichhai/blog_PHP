<?php 
class blogs{
	private $table = "blogs";
	private $conn;

	public $title;
	public $content;
	public $status;
	public $image;
	public $id_user;
	public $id_category;
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

	public function readUserID(){
		$sql= "SELECT * FROM $this->table WHERE status=1 AND id_user = :get_user_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_user_id",$this->id_user);
		$stmt->execute();
		return $stmt;
	}
	public function readLatestBlog(){
		$sql= "SELECT * FROM $this->table WHERE status=1 ORDER BY created_at DESC LIMIT 1";
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
			$this->title = $row['title'];
			$this->image = $row['image'];
			$this->content = $row['content'];
			$this->id_user = $row['id_user'];
			$this->id_category = $row['id_category'];
			$this->status = $row['status'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	public function create(){
		$sql = "INSERT INTO $this->table 
		SET title = :get_title,
            content = :get_content,
            image = :get_image,
            id_user = :get_id_user,
            id_category = :get_id_category,
			status = 1,
			created_at = :get_created_date,
			updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_title",$this->title);
		$stmt->bindParam(":get_content",$this->content);
		$stmt->bindParam(":get_image",$this->image);
		$stmt->bindParam(":get_id_user",$this->id_user);
		$stmt->bindParam(":get_id_category",$this->id_category);
		$stmt->bindParam(":get_created_date",$this->created_at);
		$stmt->bindParam(":get_updated_date",$this->updated_at);

		if($stmt->execute()){
			return true;
		}
	}

	public function update(){
		$sql = "UPDATE $this->table 
		SET title = :get_title,
            content = :get_content,
            image = :get_image,
            id_user = :get_id_user,
            id_category = :get_id_category,
			status = :get_status,
			updated_at = :get_updated_date
			WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->bindParam(":get_title",$this->title);
		$stmt->bindParam(":get_status",$this->status);
        $stmt->bindParam(":get_content",$this->content);
		$stmt->bindParam(":get_image",$this->image);
		$stmt->bindParam(":get_id_user",$this->id_user);
		$stmt->bindParam(":get_id_category",$this->id_category);
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