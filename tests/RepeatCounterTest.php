<?php
    // name of class
    require_once "src/RepeatCounter.php";
    // needed to run PHPUNIT tests
    class RepeatCounterTest extends PHPUnit_Framework_TestCase
    {

////////////////////////////////// test one letter = one letter ////////////////
        function test_oneLetter_true()
        {
            //Arrange
            $test_repeatCounter = new RepeatCounter;
            $input_word = "a";
            $input_string = "a";
            //Act
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            //Assert
            $this->assertEquals(1, $result);
        }
        function test_oneLetter_false()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "a";
            $input_string = "b";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(0, $result);
        }
///////////////////////////// test if one word is true or false /////////////////
        function test_oneWord_true()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "hello";
            $input_string = "hello";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(1, $result);
        }
        function test_oneWord_false()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "taco";
            $input_string = "bacon";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(0, $result);
        }

////////////////// test if match match one, none, or multiple /////////////////////
        // should return 0
        function test_zeroMatch_string()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "hello";
            $input_string = "this is the test";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(0, $result);
        }
        // should return 1
        function test_oneMatch_string()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "hello";
            $input_string = "hello my name is ben ";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(1, $result);
        }
        // should return more than one
        function test_multiMatch_string()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "hat";
            $input_string = "my hat looks like your hat";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(2, $result);
        }
/////////////////////// test for matching case ////////////////////////////////
        function test_upperCase_input()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "HAt";
            $input_string = "This is a hAt.";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(2, $result);
        }
        function test_upperCase_string()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "hat";
            $input_string = "The hat is a hAT";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(2, $result);
        }
//////////////////////// test if the user enters numbers ////////////////////////
        function test_numbers()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "5";
            $input_string = "i scored 5 goals at 5 pm";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(3, $result);
        }
//////////////////////////// test for combingin numbers and texs ///////////////
        function test_mixedInput()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "ben123";
            $input_string = "ben 123 is the test sentence";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(3, $result);
        }
////////////////////  can test fon punctuation ? //////////////////////////////
        function test_punctuationString()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "Hello";
            $input_string = "Hello, my name has always been Ben";
            $result = $test_repeatCounter->countRepeats($input_word, $input_string);
            $this->assertEquals(1, $result);
        }
///////////////////// match multi input words if needed ///////////////////////
        function test_multiWordInput()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "portland oregon";
            $input_string = "portland oregon is cool ";
            $result = $test_repeatCounter->checkInputWord($input_word, $input_string);
            $this->assertEquals(true, $result);
        }
////////////////  empty input add required to input twig forms /////////////////
// test not needed?
        function test_emptyInputWord()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "";
            $input_string = "you forgot an input bro ";
            $result = $test_repeatCounter->checkNullInputs($input_word, $input_string);
            $this->assertEquals(true, $result);
        }
///////////////// same as test above but for string /////////////////////////////
        function test_emptyInputString()
        {
            $test_repeatCounter = new RepeatCounter;
            $input_word = "input";
            $input_string = "";
            $result = $test_repeatCounter->checkNullInputs($input_word, $input_string);
            $this->assertEquals(true, $result);
        }
    }
?>
