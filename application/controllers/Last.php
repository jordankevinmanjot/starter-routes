<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Last extends Application
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

        // build the list of authors, to pass on to our view
        $sizeOfQuotes = count($this->quotes->all());
        $record = $this->quotes->get( $sizeOfQuotes );

        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}
