<?php
class ReportsModel extends Database {
	public function __construct(){
        global $db;
        parent::__construct($db);
	}
	
	// Home
	public function insertReportData( $report_details ){
        $this->insert( 'report' )->values( $report_details );
        return true;
	}

	// Home	
	public function getClientsTags(){
		return $this->select('report')->group('report_customer')->results();
	}

	// Home	
	public function getTagsUP(){
		return $this->select('report')->group('report_productive_unit')->results();
	}

	// Home
	public function getItems(){
		return $this->select('report')->results();
	}
	
	public function getReportdetailsbyId($id){
		return $this->select('report')->where("report_id = $id")->results();

	}
	//Home
	public function updateReport($data, $id){
		$this->update('report')->values($data)->where("report_id = $id");
		return true;
	}

	//Home
	public function deleteReport( $id ){
        return $this->delete('report')->where("report_id = '$id'")->num_rows();
	}
	
	public function filterReport($date_from, $date_to){
		return $this->select('report')->where("report_date between '$date_from' and LAST_DAY('$date_to')")->results();
	}

	public function postStatusUpdate($report_id, $status){
		$this->update('report')->values($status)->where("report_id = $report_id");
		return true;
	}


}
?>