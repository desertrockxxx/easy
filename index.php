<?php
require_once("header.php");

$object = new Mindset;

// Neue Frage hinzufügen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question']) && isset($_POST['categorie_id'])) {
    $question = $_POST['question'];
    $categorie_id = $_POST['categorie_id'];
    $object->createQuestion($question, $categorie_id);
}

// Frage löschen
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $deleteID = $_GET['delete'];
    $object->deleteQuestion($deleteID);
}

// Neue Kategorie hinzufügen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categorie'])) {
    $categorie = $_POST['categorie'];
    $object->setCategorie($categorie);
}

?>


<div class="row col-sm-3"></div>
<div class="container col-sm-6 text-center">
    <div class="row"> 
        <div class="col-sm-4 text-center">
            <h1>Questions</h1>
            <!--Formular um neue Fragen hinzuzufügen-->
            <form id="send" method="POST" action="index.php">
                <input id="question" type="text" name="question" placeholder="add new question" required/>
                <select style="width:150px" class="form-control" id="categorie_id" name="categorie_id">
                    <?php
                    // SELECT from categorie die id und categorie name gebe als foreach aus
                    $categories = $object->getAllCategories();
                    foreach ($categories as $row) {
                        echo "<option value='{$row['id']}'>{$row['categorie']}</option>";
                    }
                    ?>
                </select>
                <button type="submit" class="btn btn-primary">Create New Question</button>
            </form>

            <?php
            // INSERT
            // Wenn title und content gesetzt, dann beide in Datenbank einfügen
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['question']) && isset($_POST['categorie_id'])) {
                $question = $_POST['question'];
                $categorie_id = $_POST['categorie_id'];
                $object->createQuestion($question, $categorie_id);
            }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- Tabelle um Datensätze anzuzeigen-->
            <table class="table table-bordered table-striped" style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Categorie</th>
                        <th>Read</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>Wiki</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $questions = $object->getAllQuestions();
                    foreach ($questions as $row) {
                        echo "<tr><td>{$row['id']}</td>";
                        echo "<td>{$row['question']}</td>";
                        echo "<td>{$row['categorie']}</td>";
                        echo "<td><a href='read.php?id={$row['id']}'>read</a></td>";
                        echo "<td><a href='update.php?id={$row['id']}'>o</a></td>";
                        echo "<td><a href='?delete={$row['id']}'>x</a></td>";
                        echo "<td><a href='https://de.wikipedia.org/wiki/{$row['question']}' target='_blank'>wiki</a></td></tr>";
                    }

                    // wenn delete=id gesetzt, dann löschen
                    if (isset($_GET['delete']) && !empty($_GET['delete'])) {
                        // nimm die delete=id
                        $delID = $_GET['delete'];
                        // DELETE
                        $object->deleteQuestion($delID);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <h3>Categories</h3>
            <!--Formular um neue Kategorien hinzuzufügen-->
            <form id="send" method="POST" action="index.php">
                <input id="categorie" type="text" name="categorie" placeholder="add new categorie" required/>
                <button type="submit" class="btn btn-primary">Create New Categorie</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categorie'])) {
                $categorie = $_POST['categorie'];
                $object->setCategorie($categorie);
            }
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- Categorie Tabelle Datensätze anzuzeigen-->
            <table class="table table-bordered table-striped" style="width:800px">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Categories</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $categories = $object->getAllCategories();
                    foreach ($categories as $row) {
                        echo "<tr><td>{$row['id']}</td>";
                        echo "<td>{$row['categorie']}</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <button class="btn btn-info" data-toggle="collapse" data-target="#mindsetinfo">Mindset Info</button>
            <div id="mindsetinfo" class="collapse">
                <?php include 'mindsetinfo.php';?>
            </div>
            <p>Advantage, Disadvantage, Argument, Counter-argument, Thesis, Antithesis, Hypothesis & Fact</p>
            <p>Quellen: <a href="https://de.wiktionary.org/wiki/" target="_blank">Wiktionary</a></p>
        </div>
    </div>
</div>



<?php require_once("footer.php");?>
