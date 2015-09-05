<?php
    class RepeatCounter
    {
        function countRepeats($input_word, $input_string)
        {
            //variable for string to lower case
            $input_word = strtolower($input_word);
            //This will remove all characters in the string that aren't letters or numbers.
            $input_string = preg_replace("/[^a-zA-Z 0-9]+/", "", $input_string);
            $input_array = explode(" ", $input_string);
            $count = 0;
            foreach($input_array as $word)
            {
                //This converts each word in the string to lowercase for comparisons
                $word = strtolower($word);
                if($input_word == $word) {
                    ++$count;
                }
            }
            return $count;
        }
        //This function will check to make sure the inputted word is only one word from user
        function checkInputWord($input_word)
        {
            $input_check = explode(" ", $input_word);
            if(sizeof($input_check) > 1) {
                return true;
            }
        }
        //This function will check to make sure both input forms are filled in after submit is clicked
        function checkNullInputs($input_word, $input_string)
        {
            if((empty($input_word)) || (empty($input_string))) {
                return true;
            }
        }
    }
?>
