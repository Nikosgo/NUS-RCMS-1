<?php
require("../Model/paper.php");
?>

<?php
class AeditPaperController
{
    function __construct()
    {
    }
    function checkPaperStatus($pid)
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->checkPaperStatus($pid);
        $row = $result->fetch_assoc();
        if ($row['status'] == 'pending') {
            return true;
        } else return false;
    }
    function editPaper($title, $content, $pid, $coAuthor)
    {
        if($title == "") return false;
        if($content == "") return false;
        if($this->checkPaperStatus($pid)){
			$paper1 = new Paper();
			$paper1->connectPaperDB();
			if ($paper1->editPaper($title, $content, $pid, $coAuthor)) {
				return true;
			} else return false;
		}
		else return false;
    }

    public function searchPID($query)
    {
        $paper1 = new Paper();
        $paper1->connectPaperDB();
        $result = $paper1->searchPID($query);
        if($result->num_rows > 0) return $result;
        else return false;
    }
}
?>