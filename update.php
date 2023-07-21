<?php
require_once("header.php");

// get id 
$id = $_GET['id'];
$object = new Mindset;

// Überprüfen, ob das Formular gesendet wurde und das 'question'-Feld vorhanden ist
if (isset($_POST['question'])) {
    $question = $_POST['question'];
    $object->updateQuestion($id, $question);
    echo "Fragetitel zu " . $id . " geändert";
}

?>

<div class="container col-sm-12">
    <div class="row">
        <div class="col-sm-12">
            <form id="send" method="POST" action="update.php?id=<?php echo $id; ?>">
                <input type='text' name='question' placeholder='<?php $object->getQuestion($id); ?>' />
                <button type="submit" class="btn btn-success">Speichern</button>
                <button type="button" class="btn btn-danger" onclick="location.href='/';">Go Back</button>
            </form>
        </div>
    </div>
</div>

<?php require_once("footer.php"); ?>
