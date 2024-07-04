<?php 
class settings{
	private $table = "settings";
	private $conn;

	public $site_name;
	public $site_favicon;
	public $site_map;
	public $site_timezone;
	public $site_logo;
	public $site_footer;
	public $contact_email;
	public $contact_phone;
	public $contact_address;
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

	public function read(){
		$sql= "SELECT * FROM $this->table
		WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->execute();
		if($stmt->rowCount()>0){
			$row=$stmt->fetch();
			$this->site_name = $row['site_name'];
			$this->site_favicon = $row['site_favicon'];
			$this->site_logo = $row['site_logo'];
			$this->site_map = $row['site_map'];
			$this->site_timezone = $row['site_timezone'];
			$this->site_footer = $row['site_footer'];
			$this->contact_email = $row['contact_email'];
			$this->contact_phone = $row['contact_phone'];
			$this->contact_address = $row['contact_address'];
			$this->created_at = $row['created_at'];
			$this->updated_at = $row['updated_at'];
		}
	}

	public function create(){
		$sql = "INSERT INTO $this->table 
		SET site_logo = :get_site_logo,
			site_name = :get_site_name,
			site_footer = :get_site_footer,
			site_map = :get_site_map,
			site_timezone = :get_site_timezone,
			site_favicon = :get_site_favicon,
			contact_email = :get_contact_email,
			contact_address = :get_contact_address,
			contact_phone = :get_contact_phone,
			created_at = :get_created_date,
			updated_at = :get_updated_date";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_site_logo",$this->site_logo);
		$stmt->bindParam(":get_site_name",$this->site_name);
		$stmt->bindParam(":get_site_footer",$this->site_footer);
		$stmt->bindParam(":get_site_map",$this->site_map);
		$stmt->bindParam(":get_site_timezone",$this->site_timezone);
		$stmt->bindParam(":get_site_favicon",$this->site_favicon);
		$stmt->bindParam(":get_contact_email",$this->contact_email);
		$stmt->bindParam(":get_contact_address",$this->contact_address);
		$stmt->bindParam(":get_contact_phone",$this->contact_phone);
		$stmt->bindParam(":get_created_date",$this->created_at);
		$stmt->bindParam(":get_updated_date",$this->updated_at);

		if($stmt->execute()){
			return true;
		}
	}

	public function update(){
		$sql = "UPDATE $this->table 
		SET site_logo = :get_site_logo,
			site_name = :get_site_name,
			site_footer = :get_site_footer,
			site_map = :get_site_map,
			site_timezone = :get_site_timezone,
			site_favicon = :get_site_favicon,
			contact_email = :get_contact_email,
			contact_address = :get_contact_address,
			contact_phone = :get_contact_phone,
			updated_at = :get_updated_date
			WHERE id = :get_id";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":get_id",$this->id);
		$stmt->bindParam(":get_site_logo",$this->site_logo);
		$stmt->bindParam(":get_site_name",$this->site_name);
		$stmt->bindParam(":get_site_footer",$this->site_footer);
		$stmt->bindParam(":get_site_map",$this->site_map);
		$stmt->bindParam(":get_site_timezone",$this->site_timezone);
		$stmt->bindParam(":get_site_favicon",$this->site_favicon);
		$stmt->bindParam(":get_contact_email",$this->contact_email);
		$stmt->bindParam(":get_contact_address",$this->contact_address);
		$stmt->bindParam(":get_contact_phone",$this->contact_phone);
		$stmt->bindParam(":get_updated_date",$this->updated_at);

		if($stmt->execute()){
			return true;
		}
	}
}
 ?>