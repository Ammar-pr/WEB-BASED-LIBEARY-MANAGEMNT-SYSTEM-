<?php

require_once ('vendor/autoload.php');

require_once ('../htdocs/Book.php');

/**
 * @covers Email
 */
final class Book_test extends \PHPUnit_Framework_TestCase {

    public function test_validate_data() {
        // phpunit Book_test.php
        $book_test = new Book();
        $return_values_scenario_one = $book_test->validate_data('', "title", "author", "publisher", 1999);


        $this->assertEquals('ISBAN number is empty ! <br>', $return_values_scenario_one);


        $return_values_scenario_two = $book_test->validate_data("", "", "author", "publisher", 1999);

        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>', $return_values_scenario_two);


        $return_values_scenario_three = $book_test->validate_data("", "", "", "publisher", 1999);

        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>author is empty <br>', $return_values_scenario_three);

        $return_values_scenario_four = $book_test->validate_data("", "", "", "", 1999);

        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>author is empty <br>publisher is empty <br>', $return_values_scenario_four);


        $return_values_scenario_four = $book_test->validate_data("", "", "", "", 0);

        $this->assertEquals('ISBAN number is empty ! <br>title is empty <br>author is empty <br>publisher is empty <br>publication_year is empty !   <br>', $return_values_scenario_four);

        $return_values_scenario_six = $book_test->validate_data("978-3-16-1", "", "", "", 0);

        $this->assertEquals('title is empty <br>author is empty <br>publisher is empty <br>publication_year is empty !   <br>', $return_values_scenario_six);






        $return_values_scenario_seven = $book_test->validate_data("978-3-16-11llll1", "", "", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>title is empty <br>author is empty <br>publisher is empty <br>publication_year is empty !   <br>', $return_values_scenario_seven);

        $return_values_scenario_eight = $book_test->validate_data("978-3-16-11llll1", "good time", "", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>author is empty <br>publisher is empty <br>publication_year is empty !   <br>', $return_values_scenario_eight);



        $return_values_scenario_ten = $book_test->validate_data("978-3-16-11llll1", "good time", "mark", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>publisher is empty <br>publication_year is empty !   <br>', $return_values_scenario_ten);



        $return_values_scenario_ten = $book_test->validate_data("978-3-16-11llll1", "good time", "mark", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>publisher is empty <br>publication_year is empty !   <br>', $return_values_scenario_ten);


        $return_values_scenario_eleven = $book_test->validate_data("978-3-16-11llll1", "good time", "mark", "salm", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>publication_year is empty !   <br>', $return_values_scenario_eleven);
        $return_values_scenario_twelve=$book_test->validate_data("978-3-16-11llll1", "good time", "mark", "salm", 1419);
        
        $this->assertEquals('ISBAN number should be 10 digit <br>',$return_values_scenario_twelve);
        
        
        $return_values_scenario_Thirteen=$book_test->validate_data("978-3-16-1", "good time", "mark", "salm", 1419);
        
        $this->assertEquals('',$return_values_scenario_Thirteen);
        
        
        
        
          $return_values_scenario_Fourteen=$book_test->validate_data("978-3-16-1", "", "mark", "salm", 1419);
        
        $this->assertEquals('title is empty <br>',$return_values_scenario_Fourteen);
        
        
    }

}
