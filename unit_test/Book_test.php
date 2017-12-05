<?php

require_once ('vendor/autoload.php');

require_once ('../htdocs/Book.php');

/**
 * @covers Email
 */
final class Book_test extends \PHPUnit_Framework_TestCase
{


 
    public function test_validate_data()
    {
 // phpunit Book_test.php
       $book_test= new Book();
      $return_values_scenario_one= $book_test->validate_data('', "title", "author", "publisher", 1999);
        
      
        $this->assertEquals('ISBAN number is empty ! <br>',$return_values_scenario_one);
        
        
        $return_values_scenario_two=$book_test->validate_data("", "", "author", "publisher", 1999);
        
        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>',$return_values_scenario_two);
        
        
         $return_values_scenario_three=$book_test->validate_data("", "", "", "publisher", 1999);
        
        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>author is empty <br>',$return_values_scenario_three);
       
        $return_values_scenario_four=$book_test->validate_data("", "", "", "", 1999);
        
        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>author is empty <br>publisher is empty <br>',$return_values_scenario_four);
        
 
         $return_values_scenario_four=$book_test->validate_data("", "", "", "", 0);
        
        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>author is empty <br>publisher is empty<br>publication_year is empty !   <br>',$return_values_scenario_four);
        
        
        
        
        
    }
}
