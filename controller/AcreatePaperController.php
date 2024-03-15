<?php
require("../entity/paper.php");
require("../entity/user.php");
?>

<?php
class CreatePaperController
{

    function __construct()
    {
    }

    function createPaper($title, $content, $authorID, $coAuthor)
    {
        if ($title == '' || $content == '') return false;
        $authorName = $this->getAuthorName($authorID);
        $paper = new Paper();
        $paper->connectPaperDB();
        if ($paper->createPaper($title, $content, $authorID, $authorName, $coAuthor)) {
            return true;
        } else return false;
    }
    function getAuthorName($authorID){
        $user = new User();
        $user->connectUserDB();
        $result = $user->searchUID($authorID);
        $row = $result->fetch_assoc();
        $authorName = $row['name'];
        return $authorName;
    }
}
?>