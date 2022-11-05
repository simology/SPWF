

<?php

class ExportsModel extends Database{
	public function __construct(){
        global $db;
        parent::__construct($db);
	}
	
	public function getReportDetails2Export($report_id){
		return $this->select('report')->left('material On report_id = material_id_report')->where("report_id = $report_id")->results();
	}

}	