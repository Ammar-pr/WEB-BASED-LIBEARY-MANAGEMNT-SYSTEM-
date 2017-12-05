<?php 

require_once ('../lib/RedBeanPHP/rb.php');



class Book {
 // class data mempter  
 protected $ISBN;
 protected $title;
 protected $author;
 protected $publisher;
 protected $publication_year;
    

    
    public function __construct()
    {
        if( !R::testConnection()) {
            R::setup('mysql:host=localhost;dbname=dsr_amnatto',
                'dsr_amnatto', 'mVNeKCEG]b@W');
            
            
        }
    }
    
    
    
    public function save ($ISBN,$title,$author,$publisher,$publication_year){
               
        return   R::exec("INSERT INTO `books`( `ISBN`, `title`, `author`, `publisher`, `publication_year`) VALUES ('$ISBN', '$title', '$author', '$publisher', $publication_year)");
        
        
    }
    
    public function validate_data($ISBN,$title,$author,$publisher,$publication_year){
        

        //$ISBN
        //    if(count (R::getAll( "SELECT * FROM users where phonenumber_number='$phonenumber_number'"  ))==1 )
    
        $ISBN=trim(htmlspecialchars($ISBN));
        $title=trim(htmlspecialchars($title));
        $publisher=trim(htmlspecialchars($publisher));
        $author=trim(htmlspecialchars($author));
        
        
       
        
        $massage="";
        
        if(strlen($ISBN)<=0)
        {
            $massage.="ISBAN number is empty ! <br>";
        }   
        
        if(strlen($ISBN)>=11) 
        {
          echo "lenght".strlen($ISBN);
            $massage.="ISBAN number should be 10 digit <br>";
        }
        
        if(count (R::getAll( "SELECT * FROM books where ISBN='$ISBN'"  ))==1 ){
            $massage.="ISBN is exist in the database..!  <br>";
        }
        
        
            if( strlen($title)<=3)
            {
                $massage.="title minimum length is four , less cannot be accepted  <br>";
            }
              
        if(strlen($title)>60) {
            $massage.="title length should be less then 60  <br>";
        
        }
        
            if(count (R::getAll( "SELECT * FROM books where title='$title'"  ))==1 ){
                echo "111";
                $massage.="title is exist in the database..!  <br>";
            }
            
            if(strlen($author)<=3)
            {
                $massage.="author minimum length is four , less cannot be accepted  <br>";
            }
      
            if(strlen($author)>60) {
                $massage.="author name  should be less then 60  <br>";
            }
                
            
            
            
            if(strlen($publisher)<=3){
                $massage.="publisher minimum length is four , less cannot be accepted  <br>";}
                
  
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
    
    public function update ($ISBN,$title,$author,$publisher,$publication_year,$id){
       /* the data  checking by functin called validate_data in the production */
        return R::exec(" UPDATE `Books` SET `ISBN` ='$ISBN', `title` = '$title' ,`author`='$author', `publisher`='$publisher', `publication_year` =$publication_year  WHERE `Books`.`id` =" .$id);

    }
    
    public function fetchAll(){
        
    }
    
    public function delete_by_isbn($ISBN)
    {
     return R::exec("DELETE FROM `books` WHERE ISBN =".$ISBN );

    }

    
    
    public function fetch_data_testing($ISBN,$title,$author,$publisher,$publication_year){
       
    $saved = R::getAll("SELECT * FROM books where `isban`='$ISBN'  and title=$title and author='$author' and publication_year="."$publication_year" );
        
        
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
//$var =$b->fetchWith_title("Freedom of the City of London");
//echo $var ;

//$b->fetch_with_isbn();
?>