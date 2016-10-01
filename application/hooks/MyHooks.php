<?php
class MyHook{
  function filterData(){
    /* References the CI superobject to have access to the webpage. */
            $CI = & get_instance();
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
                    $temp = $element->textContent;
                    $words = explode(' ', $temp);
                    $inc = 0;
                    foreach($words as $word){
                      if(preg_match('/[.,!;?"\-_~]+/i', $word)){
                        $punc = substr($word, 4, (strlen($word) - 4));
                        if(!(preg_match('/^[a-z]/i', $punc))){
                          if(!empty($punc)){
                            $words[$inc] = "****$punc";
                          }
                        }
                      }else if(preg_match('/^[a-z]{4}$/i', $word)){
                        $words[$inc] = "****";
                      }
                      $inc++;
                    }
                    $fin = implode(" ", $words);
                    $element->textContent = $fin;
                }
            }
            echo $dom->saveHTML();
            die();
  }
}
