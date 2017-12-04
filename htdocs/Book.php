<?php 

require_once ('../lib/RedBeanPHP/rb.php');



class Book {
   
 
    

    
    public function __construct()
    {
        if( !R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=dsr_amnatto',
                'dsr_amnatto', 'mVNeKCEG]b@W');
            
            
        }
    }
    
    
    
    public function save ($ISBN,$title,$author,$publisher,$publication_year){
               
        return   R::exec("INSERT INTO `books`( `ISBN`, `title`, `author`, `publisher`, `publication_year`) VALUES ('1-39-44-55', ' Freedom of the City of London', 'J. K. Rowling', 'pseudonym Robert Galbraith', 1997)");
        
        
    }
    
    public function validate_data($ISBN,$title,$author,$publisher,$publication_year){
        
        
    }
    
    public function update (){
        
    }
    
    public function fetchAll(){
        
    }
    
    public function delete($id)
    {
        
    }
    
    public function deleteAll()
    {
        
    }
    public function fetchWithPK($id)
    {
        
        
    }
    
 
    public function print_data ($book_refrence) {
        
    }
    
    
    
    
    
    
    

}



$b= new Book();

$test_var=$b->save('1-33-44-55', ' Freedom of the City of London', 'J. K. Rowling', 'pseudonym Robert Galbraith', 1997);

echo count($test_var);

?>