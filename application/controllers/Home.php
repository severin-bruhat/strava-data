<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	/**
	 * Index Page for this controller.
	*/
	public function index()
	{
		$this->page = "form";
		$this->layout();

		$this->form_validation->set_rules('app_key', 'Application Key', 'required');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($this->form_validation->run() === FALSE)
				{
						//echo "Renseignez vos AppKey et recommencez";
						 $this->load->view('erros/form/emptyField');
				}
				else
				{
						//get the activity
						$appKey = trim($this->input->post('app_key', true));
						$activities = stravaGetACivities($appKey);

						/******************Create the headers*******************/
						$headerToIgnore = [
								'id',
								'resource_state',
								'external_id',
								'upload_id',
								'athlete',
								'start_latlng',
								'end_latlng',
								'map',
						];
						$headerTab = createHeaders($headerToIgnore, $activities);
						/*******************************************************/

						/*************Create the data array for CSV*************/
						$tabData = [];
						foreach($activities as $cpt=>$act) {
							 $tabData[$cpt] = [];
							 $tabItems = initBlankLine($headerTab);
							 foreach($act as $key => $item) { //for each activity field
										if (in_array($key, $headerTab)) {//if the field exists in the array of headers
												$tabItems[$key] = $item; // insert the value at the right index
									 }
							 }
							 $tabData[$cpt] = $tabItems;
						}
						/*******************************************************/

						/******************create the CSV***********************/
						exportToCsv($tabData);
						/*******************************************************/
				}
		}
	}
}
