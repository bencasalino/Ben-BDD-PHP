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
            $input_word = "c";
            $input_string = "c";
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

    }
?>
