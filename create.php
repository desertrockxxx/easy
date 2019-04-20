<?php
require_once("header.php");

// get id 
$id = $_GET['id'];
// get mindset
$mindset = $_GET['mindset'];


$object = new Mindset;
$advantage = "Advantage";
$disadvantage = "Disadvantage";
$argument = "Argument";
$counterargument = "Counter-argument";
$thesis = "Thesis";
$antithesis = "Antithesis";

?>

<div class="container col-sm-12">
    <div class="row">
        <div class="col-sm-12">
        <h1><?php $object->getQuestion($id); ?></h1>   
        
        <!--Frage neue Antworten hinzuzufügen-->
        <form id="send" method="POST" action="create.php?id=<?php echo $id;?>">
        <div>
            <input id="answer" type="text" name="answer" placeholder="new answer"/>
        </div>
        <div>
            <input id="file_upload" type="text" name="file_upload" placeholder="new file_upload"/>
        </div>
        <div>
            <select class="form-control" id="sel1" name="mindset" style="width:175px">
                <option value='<?php echo $mindset;?>' selected><?php echo $mindset;?></option>
                <option>Advantage</option>
                <option>Disadvantage</option>
                <option>Argument</option>
                <option>Counter-argument</option>
                <option>Thesis</option>
                <option>Antithesis</option>
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Create New Answer</button>
            <button type="button" onclick="location.href='/read.php?id=<?php echo $id;?>';" 
                class="btn btn-danger">Go Back to Question 10</button>
        </div>
        </form>
        
        <?php
        $answer = $_POST['answer'];
        $fileupload = $_POST['file_upload'];
        
        if(isset($answer) && !empty($answer) &&
            isset($fileupload) && !empty($fileupload) &&
            isset($mindset) && !empty($mindset))
        {
            $object->createAnswer();
            echo "Antwort erstellt zu " . $id . "!";
        }
        ?>
        </div>
    </div> 
</div>

<?php require_once("footer.php");?>
