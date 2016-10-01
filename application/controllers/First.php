<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class First extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';

		// get the first author
		$record = $this->quotes->get(1);
		$this->data = array_merge($this->data, $record);

		$this->render();
	}

    public function zzz(){
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';

		// get the first author
		$record = $this->quotes->get(1);
		$this->data = array_merge($this->data, $record);

		$this->render();
    }

	public function gimme($id) {
		$this->data['pagebody'] = 'justone';

		// get the author passed into the url parameter
		$record = $this->quotes->get($id);
		$this->data = array_merge($this->data, $record);
	
		$this->render();
    }

}
