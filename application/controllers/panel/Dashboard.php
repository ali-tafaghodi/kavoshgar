<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
//        $name = !empty($this->email) ? $this->email : null;
//        echo $name;
    }

	public function index()
	{
//		$data = $this->Basic_Model->getStatistics();
		$this->loadPanelView('dashboard/dashboard');
	}
}