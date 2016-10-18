<?php

/*
 * Validate and save comment
 * 
 * @var string $comment
 */
$db = new Database();
function SaveValidateComment(Comment $comment){
    if(empty($comment->comment)){
        throw new Exception("The comment field is empty!",10);
    } elseif(empty($comment->userId) && !is_int($comment->userId)) {
        throw new Exception("User ID isn't an integer or is missing!",11);
    } elseif(empty($comment->productId) && !is_int($comment->productId)) {
        throw new Exception("Product ID isn't an integer or is missing!",12);
    } elseif(empty($comment->readStatus) && !is_bool($comment->readStatus)) {
        throw new Exception("Read status isn't a boolean or is missing!",13);
    } elseif(empty($comment->commentDate) && !validateDate($comment->commentDate)) {
        throw new Exception("Comment date isn't a right format or is missing!",14);
    } else {
        //Strip all html tags from a string
        $comment->comment = filter_var(trim($comment->comment), FILTER_SANITIZE_STRING);
        $db->save($comment);
        return 'Success';
    }
}

/*
 * @var date $date
 * @var string $format
 *
 * @return bool
 */
function validateDate($date, $format = 'Y-m-d H:i')
{
    $dateObj = DateTime::createFromFormat($format, $date);
    return $dateObj && $dateObj->format($format) == $date;
}


class Comment {
    
    /*
     * @var interger $commentId
     *
     * Comment id
     */
    private $commentId;
    
    /*
     * @var text $comment
     * Actual comment
     */
    private $comment;
    
    /*
     * @var date $comentDate
     * 
     * Comment date
     */
    private $comentDate;
    
    /*
     * @var bool $readStatus
     * 
     * Comment read status
     */
    private $readStatus;
    
    /*
     * @var integer $userId
     * 
     * User id
     */
    private $userId;
    
    /*
     * @var integer $productId
     * 
     * Product id
     */
    private $productId;
    
    /*
     * Set comment properties
     */
    public function __set($name,$value){
        $this->$name = $value;
    }
    
    /*
     * Get comment property by name
     */
    public function __get($name){
        if (isset($this->$name)) {
            return $this->$name;
        }
    }
    
}

$date = new DateTime('NOW');
$comment = new Comment();
$comment->id = 1;
$comment->comment = "Comment 1";
$comment->readStatus = TRUE;
$comment->commentDate = $date->format('Y-m-d H:i');
$comment->userId = 1;
$comment->productId = 1;

print_r($comment);

/*
 * Describe any related unit, integration, and/or functional tests you would write
 *
 * I'm using PHPUnitTest, Jquery for Ajax call and DB class with method save that triggers INSERT query
 * (INSERT INTO Comment (user_id, product_id, comment, comment_date, read_status) VALUES ('".$comment->userId."','".$comment->productId."','".$comment->comment."','".$comment->date."','".$comment->readStatus."'))
 * Ajax POST call is triggered every time when the customer send a comment.The calls send JSON data to the API.
 * PHP renders the JSON call, instantciate Comment class and fills out the object's properties.
 * JSON data fills comment and productId property
 * From user's session we can get userId
 * Comment date and read status by default are now and unread (false)
 * PHP trigger validaton method and if there aren't error send Comment object to DB save method
 */

class CommentTest extends PHPUnit_Framework_TestCase {
    
    public function testComment()
    {
        $dateTime = new DateTime('NOW');
        $commentObj = new Comment();
        
        //Expected values
        $commentId = 1;
        $comment = "Comment 1";
        $read = TRUE;
        $date = $dateTime->format('Y-m-d H:i');
        $userId = 1;
        $productId = 1;
        
        $commentObj->id = $commentId;
        $commentObj->comment = $comment;
        $commentObj->readStatus = $read;
        $commentObj->commentDate = $date;
        $commentObj->userId = $userId;
        $commentObj->productId = $productId;
        
        
        $this->assertEquals($commentId, $commentObj->id);
        $this->assertEquals($comment, $commentObj->comment);
        $this->assertEquals($read, $commentObj->readStatus);
        $this->assertEquals($date, $commentObj->commentDate);
        $this->assertEquals($userId, $commentObj->userId);
        $this->assertEquals($productId, $commentObj->productId);
        
        return $comment;
    }
    
    /**
     * @depends testComment
     */
    public function testSave($comment){
        $this->assertEquals('Success', SaveValidateComment($comment));
    }
    
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage The comment field is empty!
     */
    public function testValidateComment($comment){
        $comment->comment = "";
        SaveValidateComment($comment);
    }
    
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage User ID isn't an integer type or is missing!
     */
    public function testValidateUser($comment){
        $comment->userId = null;
        SaveValidateComment($comment);
    }
    
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Product ID isn't an integer or is missing!
     */
    public function testValidateProduct($comment){
        $comment->productId = null;
        SaveValidateComment($comment);
    }
    
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Read status isn't a boolean or is missing!
     */
    public function testValidateReadStatus($comment){
        $comment->readStatus = null;
        SaveValidateComment($comment);
    }
    
    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Comment date isn't a right format or is missing!
     */
    public function testValidateCommentDate($comment){
        $comment->commentDate = null;
        SaveValidateComment($comment);
    }
}



