
<?php

class MaterialsModel extends Database{
	public function __construct(){
        global $db;
        parent::__construct($db);
    }

	// Home
	public function insertMaterialDetails($material_details){
		$this->insert('material')->values( $material_details );
		return true;
        
	}
	
	// Home
	public function getMaterialItemsbyReportId($id){
		return $this->select('material')->where("material_id_report = $id")->results();
	}

	//Delete
	public function deleteMaterialsByID($material_id){
		if( $this->delete('material')->where("material_id = '$material_id'")->num_rows() ){
            return true;
		}
		else{
            return false;
        }
	}
	
	public function findAll($id){
        return $this->select('material')->where("material_id_report = '$id'")->left('report On material_id_report = report_id')->results();   
	}

	public function updateMaterialDetails($material_details, $material_id){
		$this->update('material')->values($material_details)->where("material_id = $material_id");
		return true;
	}
	

 
}

?>
