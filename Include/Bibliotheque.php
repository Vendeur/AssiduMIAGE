<?php 

function formSelectDepuisRecordset($unLabel,$unName,$id,$jeuEnregistrement,$unTabindex,$selected)
{
    
    $codeHTML = '<label for="' . $id . '">' . $unLabel . '</label>'
            . '<select name="'.$unName.'" id="' . $id . '" tabindex="' . $unTabindex . '">';
    $codeHTML.='<option>'
            . '</option>'."/n";
    
	
    $jeuEnregistrement->setFetchMode(PDO::FETCH_NUM);
    $ligne = $jeuEnregistrement->fetch();
          while ($ligne == true) 
          {
              if($selected==$ligne[0])
            {
                  $codeHTML.= '<option selected="selected" ';
            }
              else
            {
             
              $codeHTML .='<option ';
            }

            $codeHTML .=' value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
            $ligne = $jeuEnregistrement->fetch();
        }
    $codeHTML .='</select>';
    
    return $codeHTML;
	
}