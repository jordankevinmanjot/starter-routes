<?php
class MyHook{
  function filterData(){
    /* References the CI superobject to have access to the webpage. */
          //  $this->CI =& get_instance();
            //$page = $this->CI->output->get_output();
            $CI = & get_instance();
            //var_dump($CI);
            //die();
            $page = $CI->output->get_output();
            /* Creates a new DOMDocument and loads the HTML of the webpage. */
            $dom  = new DOMDocument();
            $dom->loadHTML($page);
            /* Gets a list of all the <p> HTML elements  and loops through them. */
            foreach($dom->getElementsByTagName('p') as $element)
            {
                /* If the class of the element is lead, it is modified. */
                if($element->getAttribute('class') == 'lead')
                {
                    //$element->textContent = "hello";
                    $temp = $element->textContent;
                    $words = explode(' ', $temp);
                    $alter = array();
                    foreach($words as $word){
                      if(preg_match('/^([a-z]{4})$/i', $word)){
                        array_push($alter, $word);
                      }
                    }
                    foreach($alter as $t){
                      $s = str_replace($alter,"****", $element->textContent);
                      $element->textContent = $s;
                    }
                }
            }
            echo $dom->saveHTML();
            die();
  }
}
