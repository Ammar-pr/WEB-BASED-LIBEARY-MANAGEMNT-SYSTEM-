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
        

        //$ISBN
        //    if(count (R::getAll( "SELECT * FROM users where phonenumber_number='$phonenumber_number'"  ))==1 )
    
        $ISBN=trim(htmlspecialchars($ISBN));
        $title=trim(htmlspecialchars($title));
        $publisher=trim(htmlspecialchars($publisher));
        $author=trim(htmlspecialchars($author));
        
        
         echo strlen($publisher);
        
        $massage="";
        
        if(strlen($ISBN)<=0)
        {
            $massage.="ISBAN number is empty ! <br>";
        }   
        
        if(strlen($ISBN)>=11) 
        {
          
            $massage.="ISBAN number should be 10 digit <br>";
        }
        
        if(count (R::getAll( "SELECT * FROM books where ISBN='$ISBN'"  ))==1 ){
            $massage.="ISBN is exist in the database..!  <br>";
        }
        
        
            if(strlen($title)<=0)
            {
                $massage.="title is empty <br>";
            }
                
        if(strlen($title)>60) {
            $massage.="title length should be less then 60  <br>";
        
        }
        
            if(count (R::getAll( "SELECT * FROM books where title='$title'"  ))==1 ){
                echo "111";
                $massage.="title is exist in the database..!  <br>";
            }
            
            if(strlen($author)<=0)
            {
                $massage.="author is empty <br>";
            }
            
            if(strlen($author)>60) {
                $massage.="author name  should be less then 60  <br>";
            }
                
            
            
            
            if(strlen($publisher)<=0){
                $massage.="publisher is empty <br>";}
            if(strlen($publisher)>=60) {
            $massage.="publisher length should be less then 60  <br>";}
        if($publication_year<=0) 
        {
            $massage.="publication_year is empty !   <br>";}
        
            
            if(strlen($massage)>0){
                
                echo $massage;
            } 
                return $massage;
        
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

//$test_var=$b->save('1-33-44-55a1111111111', '', 'J. K. Rowling', 'pseudonym Robert Galbraith', 1997);

//$b->validate_data('1-33-44-55','Freedom of the City of London', '', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', 0);


?>