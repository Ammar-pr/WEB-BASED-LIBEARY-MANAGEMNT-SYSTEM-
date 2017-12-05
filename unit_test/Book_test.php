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

        $this->assertEquals('ISBAN number is empty ! <br>title minimum length is four , less cannot be accepted  <br>', $return_values_scenario_two);


        $return_values_scenario_three = $book_test->validate_data("", "", "", "publisher", 1999);

        $this->assertEquals('ISBAN number is empty ! <br>title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>', $return_values_scenario_three);

        $return_values_scenario_four = $book_test->validate_data("", "", "", "", 1999);

        $this->assertEquals('ISBAN number is empty ! <br>title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>', $return_values_scenario_four);


        $return_values_scenario_four = $book_test->validate_data("", "", "", "", 0);

        $this->assertEquals('ISBAN number is empty ! <br>title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>', $return_values_scenario_four);

        $return_values_scenario_six = $book_test->validate_data("978-3-16-1", "", "", "", 0);

        $this->assertEquals('title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>', $return_values_scenario_six);






        $return_values_scenario_seven = $book_test->validate_data("978-3-16-11llll1", "", "", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>', $return_values_scenario_seven);

        $return_values_scenario_eight = $book_test->validate_data("978-3-16-11llll1", "good time", "", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>', $return_values_scenario_eight);



        $return_values_scenario_ten = $book_test->validate_data("978-3-16-11llll1", "good time", "mark", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>', $return_values_scenario_ten);



        $return_values_scenario_ten = $book_test->validate_data("978-3-16-11llll1", "good time", "mark", "", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>', $return_values_scenario_ten);


        $return_values_scenario_eleven = $book_test->validate_data("978-3-16-11llll1", "good time", "mark", "salm", 0);

        $this->assertEquals('ISBAN number should be 10 digit <br>publication_year is empty !   <br>', $return_values_scenario_eleven);
        $return_values_scenario_twelve = $book_test->validate_data("978-3-16-11llll1", "good time", "mark", "salm", 1419);

        $this->assertEquals('ISBAN number should be 10 digit <br>', $return_values_scenario_twelve);


        $return_values_scenario_Thirteen = $book_test->validate_data("978-3-16-1", "good time", "mark", "salm", 1419);

        $this->assertEquals('', $return_values_scenario_Thirteen);




        $return_values_scenario_Fourteen = $book_test->validate_data("978-3-16-1", "", "mark", "salm", 1419);

        $this->assertEquals('title minimum length is four , less cannot be accepted  <br>', $return_values_scenario_Fourteen);


        $return_values_scenario_Fourteen = $book_test->validate_data("978-3-16-1", "tel", "mark", "salm", 1419);

        $this->assertEquals('title minimum length is four , less cannot be accepted  <br>', $return_values_scenario_Fourteen);

        $return_values_scenario_fifteen = $book_test->validate_data("978-3-16-1", "An title is assigned to each edition and variation (except reprintings) of a book. For example, an e-book, a paperback and a hardcover edition of the same book would each have a different ISBN. The ISBN is 13 digits long if assigned on or after 1 January 2007, and 10 digits long if assigned before 2007. The method of assigning an ISBN is nation-based and varies from country to country, often depending on how large the publishing industry is within a country.", "mark", "salm", 1419);

        $this->assertEquals('title length should be less then 60  <br>', $return_values_scenario_fifteen);





        $return_values_scenario_Seventeen = $book_test->validate_data("978-3-16-1", "tel", "kec", "salm", 1419);

        $this->assertEquals('title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>', $return_values_scenario_Seventeen);


        $return_values_scenario_Eighteen = $book_test->validate_data("978-3-16-1", "tel", "kec", "sal", 1419);

        $this->assertEquals('title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>', $return_values_scenario_Eighteen);


        $return_values_scenario_Nineteen = $book_test->validate_data("978-3-16-1", "tel", "kec", "sal", 0);

        $this->assertEquals('title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>', $return_values_scenario_Nineteen);


        $return_values_scenario_Twenty=$book_test->validate_data("978-3-16-1", "tel", "", "sal", 0);
        
        $this->assertEquals('title minimum length is four , less cannot be accepted  <br>author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>',$return_values_scenario_Twenty);

        $return_values_scenario_Twenty_one=$book_test->validate_data("978-3-16-1", "title is title", "", "", 0);
        
        $this->assertEquals('author minimum length is four , less cannot be accepted  <br>publisher minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>',$return_values_scenario_Twenty_one);

        $return_values_scenario_Twenty_two=$book_test->validate_data("978-3-16-1", "title is title", "", "publisher is publisher", 0);
        
        $this->assertEquals('author minimum length is four , less cannot be accepted  <br>publication_year is empty !   <br>',$return_values_scenario_Twenty_two);





// phpunit Book_test.php
    }

}
