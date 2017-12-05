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

       $book_test= new Book();
      $return_values_scenario_one= $book_test->validate_data('', "title", "author", "publisher", 1999);
        
      
        $this->assertEquals('ISBAN number is empty ! <br>',$return_values_scenario_one);
       
    }
}
