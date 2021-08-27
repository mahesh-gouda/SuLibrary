<?php
include_once __DIR__.'/connect.php';
class dbhelper extends connect
{
    public function __createUser($fname,$lname,$course,$rollno,$email,$phone,$passwd,$role){
        $sql = "SELECT * FROM sulibrary.users where email='$email' or regno='$rollno'";
        $stmt = $this->__connect()->query($sql);
        if($stmt->rowCount())
        {
            return 0;
        }
        else{

            $sql="INSERT INTO sulibrary.users(`first_name`, `last_name`, `phone`, `email`, `course`, `regno`, `password`, `role`) VALUES (?,?,?,?,?,?,?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$fname,$lname,$phone,$email,$course,$rollno,$passwd,$role]);

            $userId=dbhelper::__getUserID($email);
            $date=date('Y-m-d');
            $sql="INSERT INTO sulibrary.pending_aproval(`user_id`, `registration_date`) VALUES (?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$userId,$date]);

            return 1;


        }
    }

    public function __getUserID($email){
        $sql = "SELECT * FROM sulibrary.users where email='$email'  ";
        $stmt = $this->__connect()->query($sql);
        $rows= $stmt->fetchAll();
        foreach ($rows as $row){
            return $row['user_id'];
        }
    }

    public function __fetchUser($username, $password)
    {
        $sql = "SELECT * FROM sulibrary.users where email='$username' and password ='$password' ";
        $stmt = $this->__connect()->query($sql);
        return $stmt;

    }

    public function __getUserRecords()
    {
        try {
            if(isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $sql = "SELECT * FROM sulibrary.users where user_id='$userId' ;";
                $stmt = $this->__connect()->query($sql);
                if ($stmt->rowCount()) {
                    $rows = $stmt->fetchAll();
                    return $rows;
                } else
                    return 0;
            } else return 0;
        }catch (PDOException $ex){
            return 0;
        }
    }

    public function __isUserAprovalPending()
    {
        try {
            if(isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $sql = "SELECT * FROM sulibrary.pending_aproval where user_id='$userId' ;";
                $stmt = $this->__connect()->query($sql);
                if ($stmt->rowCount()) {
                  return 1;
                } else
                    return 0;
            } else return -1;
        }catch (PDOException $ex){
            return -1;
        }

    }


    public function __getPendingAprovalUsers(){
        try{
            $sql = "SELECT * FROM sulibrary.pending_aproval inner join sulibrary.users on users.user_id= pending_aproval.user_id";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }else
                return 0;
        }catch (ErrorException $e){
           die($e);
        }
    }

    public function __getPendingAprovalUserInfo($id)
    {
        try{
            $sql = "SELECT * FROM sulibrary.users  inner join sulibrary.pending_aproval on users.user_id=  pending_aproval.user_id where users.user_id='$id'";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount() > 0){
                $rows= $stmt->fetchAll();

                $userId = array_map(function($a) { return $a["user_id"]; }, $rows);
                $firstname = array_map(function($a) { return $a["first_name"]; }, $rows);
                $lastname = array_map(function($a) { return $a["last_name"]; }, $rows);
                $course = array_map(function($a) { return $a["course"]; }, $rows);
                $regno = array_map(function($a) { return $a["regno"]; }, $rows);
                echo json_encode(array(
                    array('userid' => $userId,'firstname' => $firstname, 'lastname'=> $lastname,'course'=>$course,'regno'=>$regno)

                ));




            }else
                return 0;
        }catch (ErrorException $e){
            die($e);
        }
    }

    public function __storeCards($userid, $card)
    {
        try{
            $sql="INSERT INTO sulibrary.cards(`user_id`, `card_number`) VALUES(?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$userid,$card]);

//            $userId=dbhelper::__getUserID($email);
//            $date=date('Y-m-d');
//            $sql="INSERT INTO sulibrary.pending_aproval(`user_id`, `registration_date`) VALUES (?,?);";
//            $stmt=$this->__connect()->prepare($sql);
//            $stmt->execute([$userId,$date]);

        }catch (ErrorException $e){
            die($e);
        }

    }

    public function __deleteFromPending($userid)
    {
    try {
        $sql = "DELETE FROM sulibrary.pending_aproval WHERE user_id='$userid'";
        $this->__connect()->query($sql);
    }catch (ErrorException $e){
        die($e);
    }
    }

    public function __saveBookDetails($title, $author, $edition, $department, $description, $stock,$booktype)
    {
        try{
            $sql="INSERT INTO sulibrary.books(`title`, `edition`, `author`, `total_stock`, `book_department`, `description`, `book_type`) VALUES(?,?,?,?,?,?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$title, $edition, $author, $stock, $department, $description,$booktype]);

            $sql = "SELECT book_id FROM sulibrary.books order by book_id DESC LIMIT 1;";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount() > 0) {

                $rows = $stmt->fetchAll();
                foreach ($rows as $row){
                  return $row['book_id'];
                }

            }

        }catch (ErrorException $e){
            die($e);
        }

    }

    public function __saveImgToDatabase($file_name_new,$book_id)
    {
        try{
            $sql="UPDATE  sulibrary.books SET `cover_photo` =? where book_id =?;";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$file_name_new,$book_id]);


        }catch (ErrorException $e){
            die($e);

        }
    }

    public function __saveAccessionNumbers($book_id, $accession)
    {
        try{
            $sql="INSERT INTO sulibrary.accession_details(`book_id`, `accession_number`) VALUES (?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$book_id, $accession]);


        }catch (ErrorException $e){
            die($e);
        }
    }

    public function __getBooks()
    {
        try {
            $sql = "SELECT * FROM sulibrary.books ;";
            $stmt = $this->__connect()->query($sql);
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll();
                return $rows;
            }else return 0;
        } catch (ErrorException $e) {
            die($e);
        }

    }

    public function __getBookDetails($book_id)
    {
        try {
            $sql = "SELECT * FROM sulibrary.books where book_id='$book_id';";
            $stmt = $this->__connect()->query($sql);
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll();
                return $rows;
            }else return 0;
        } catch (ErrorException $e) {
            die($e);
        }
    }

    public function __getStocks($bookId)
    {
        try {
            $sql = "SELECT * FROM sulibrary.accession_details WHERE book_id='$bookId' and status = 0;";
            $stmt = $this->__connect()->query($sql);
          return  $stmt->rowCount();
        } catch (ErrorException $e) {
            die($e);
        }
    }

    public function __getAccession($bookId)
    {
        try {
            $sql = "SELECT accession_number FROM sulibrary.accession_details WHERE book_id='$bookId' and status = 0 LIMIT 1;";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount()){
                $rows = $stmt->fetchAll();
                foreach ($rows as $row)
                    return $row['accession_number'];
            }
            return 0;
        } catch (ErrorException $e) {
            die($e);
        }
    }

    public function __getDepartmentBooks($dept,$bid)
    {
        try {
            $sql = "SELECT * FROM sulibrary.books where book_department='$dept' and book_id != '$bid';";
            $stmt = $this->__connect()->query($sql);
            if ($stmt->rowCount() > 0) {
                $rows = $stmt->fetchAll();
                return $rows;
            }else return 0;
        } catch (ErrorException $e) {
            die($e);
        }
    }

    public function __getUserCardCount()
    {
        try {
            $userId = $_SESSION['user_id'];
            $sql = "SELECT card_number FROM sulibrary.cards WHERE user_id='$userId' and status = 0 LIMIT 1;";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount()){
                $rows = $stmt->fetchAll();
                foreach ($rows as $row)
                    return $row['card_number'];
            }
            return 0;
        } catch (ErrorException $e) {
            die($e);
        }
    }

    public function __storeOrder($orderid,$userid,$date,$returnDate,$cardnumber)
    {
        try {
            $sql = "INSERT INTO sulibrary.orders(order_id,`accession_number`, `user_id`, `order_date`, `return_date`) VALUES (?,?,?,?,?);";
            $stmt=$this->__connect()->prepare($sql);
            $stmt->execute([$orderid,$cardnumber,$userid,$date,$returnDate]);
            return 1;
        } catch (ErrorException $e) {
            die($e);

        }
    }

    public function __getOrderId()
    {
        try {
            $sql = "select order_id from sulibrary.orders order by order_id desc limit 1;";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount()){
                $rows = $stmt->fetchAll();
                foreach ($rows as $row)
                    return $row['order_id'];
            }else return 111;
        } catch (ErrorException $e) {
            die($e);

        }

    }

    public function __getOrderDetails($orderid)
    {
        try {
            $sql =  "SELECT * FROM sulibrary.orders INNER JOIN sulibrary.accession_details on orders.accession_number = accession_details.accession_number INNER JOIN sulibrary.books on accession_details.book_id = books.book_id and orders.order_id ='$orderid';";
            $stmt = $this->__connect()->query($sql);
            if($stmt->rowCount()){
                $rows = $stmt->fetchAll();
              return $rows;
            }else return 0;
        } catch (ErrorException $e) {
            die($e);

        }

    }


}