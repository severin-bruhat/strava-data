<?php
defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Home class
 */
class Home extends MY_Controller {
	/**
	 * Index Page for this controller.
	*/
	public function index()
	{
		$this->page = "form";

		$this->form_validation->set_rules('app_key', 'Application Key', 'required');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if ($this->form_validation->run() === true)
				{
						//get the activity
						$appKey = trim($this->input->post('app_key', true));
						$activities = stravaGetACivities($appKey);
						if(isset($activities['error'])) {
							 $this->data['errorMsg'] = "L'app key que vous avez saisie n'est pas reconnue, veuillez réessayer.";
						} else {
								//Create the headers
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

								//Create the data array for CSV
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
								//export  CSV
								exportToCsv($tabData);
						}
				}
		}

		$this->layout();
	}
}
