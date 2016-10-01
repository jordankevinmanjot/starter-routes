<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Wise extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Homepage for our app
     */
    public function bingo()
    {
        // this is the view we want shown
        $this->data['pagebody'] = 'justone';

        // get the first author
        $record = $this->quotes->get(6);
        $this->data = array_merge($this->data, $record);

        $this->render();
    }

}
