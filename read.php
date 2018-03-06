<?php
require_once("header.php");

// get id 
$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<div class="container col-sm-12">
    <div class="row">
        <!-- Anzeige der gewählten Frage -->
        <div class="col-sm-offset-3 col-sm-6">
            <h3 class="text-center">Topic</h3>
            <table class="table table-bordered table-striped" style="width:1000px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic</th>
                </tr>
            </thead>
            <tbody>
             <?php
            // SELECT
            $sql= "SELECT * FROM questions WHERE id = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach($result as $row){
                echo "<tr><td>{$row['id']}</td>";
                echo "<td>{$row['question']}</td>";
                echo "</tr>";
                }
            ?>   
            </tbody>
            </table>
        </div>
    </div>
    <div class="row">  
        <!--Advantage Section-->
        <div class="col-sm-offset-3 col-sm-3">
            <h3 class="text-center">Advantage</h3>
            <!-- Tabelle um Datensätze anzuzeigen-->
            <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vorteile</th>
                    <th>Beweise</th>
                    <th>Read</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // SELECT 
                $sql= "SELECT id, answer, file_upload FROM answers WHERE mindset = 'Advantage' AND question_id = $id";
                
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach($result as $row){
                    echo "<tr><td>{$row['id']}</td>";
                    echo "<td> {$row['answer']}</td>";
                    echo "<td> {$row['file_upload']}</td>";
                    // Lesen von Datensätzen
                    echo "<td><a href='single.php?id={$row['id']}'>read</a></td>";
                    // Link der zu update.php führt und id von Beitrag dranhängt
                    echo "<td><a href='update.php?id={$row['id']}'>o</a></td>";
                    // führt zu index.php und hängt id an delete an
                    echo "<td><a href='?delete={$row['id']}'>x</a></td>";
                    echo "</tr>";
                }
            
                // wenn delete=id gesetzt, dann löschen
                if(isset($_GET['delete']) &&
                    !empty($_GET['delete'])){
                    // nimm die delete=id
                    $delID = $_GET['delete'];
                    // DELETE
                    $sql = "DELETE FROM answers WHERE id = $delID";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id', $_GET['delete'], PDO::PARAM_INT);   
                    $stmt->execute();
                }
                ?>
            </tbody>
            </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='/create.php?id=<?php echo $id;?>&mindset=Advantage';">Create New Advantage</button>

        </div>

        <div class="col-sm-3">
        <!--Disadvantage Section-->
        <h3 class="text-center">Disadvantage</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>Nachteile</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // SELECT
        $sql= "SELECT answer, file_upload FROM answers 
        WHERE mindset = 'Disadvantage' AND question_id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row){
            echo "<tr><td>{$row['answer']}</td>";
            echo "<td>{$row['file_upload']}</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='/create.php?id=<?php echo $id;?>&mindset=Disadvantage';">Create New Disadvantage</button>
        
        </div>
    </div>
    <!-- TEST TEST TEST -->
    <div class="row">
        <div class="col-sm-offset-3 col-sm-3">
        <!--Argument Section-->
        <h3 class="text-center">Argument</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>Argument</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // SELECT
        $sql= "SELECT answer, file_upload FROM answers 
        WHERE mindset = 'Argument' AND question_id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row){
            echo "<tr><td>{$row['answer']}</td>";
            echo "<td>{$row['file_upload']}</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='/create.php?id=<?php echo $id;?>&mindset=Argument';">Create New Argument</button>
        
        </div>
        <div class="col-sm-3">
        <!--Counter-argument Section-->
        <h3 class="text-center">Counter-argument</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>Gegenargument</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // SELECT
        $sql= "SELECT answer, file_upload FROM answers 
        WHERE mindset = 'Counter-argument' AND question_id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row){
            echo "<tr><td>{$row['answer']}</td>";
            echo "<td>{$row['file_upload']}</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='/create.php?id=<?php echo $id;?>&mindset=Counter-argument';">Create New Counter-argument</button>
        
        </div>
    </div>
    
    <!-- TEST TEST TEST -->
    <div class="row">
        <div class="col-sm-offset-3 col-sm-3">
        <!--Thesis Section-->
        <h3 class="text-center">Thesis</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>These</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // SELECT
        $sql= "SELECT answer, file_upload FROM answers 
        WHERE mindset = 'Thesis' AND question_id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row){
            echo "<tr><td>{$row['answer']}</td>";
            echo "<td>{$row['file_upload']}</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='/create.php?id=<?php echo $id;?>&mindset=Thesis';">Create New Thesis</button>
        
        </div>
        <div class="col-sm-3">
        <!--Antithesis Section-->
        <h3 class="text-center">Antithesis</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>Antithese</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
        <?php
        // SELECT
        $sql= "SELECT answer, file_upload FROM answers 
        WHERE mindset = 'Antithesis' AND question_id = $id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach($result as $row){
            echo "<tr><td>{$row['answer']}</td>";
            echo "<td>{$row['file_upload']}</td>";
            echo "</tr>";
        }
        ?>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='/create.php?id=<?php echo $id;?>&mindset=Antithesis';">Create New Antithesis</button>
        
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <!--INNER JOIN Alle Antworten zu der Frage-->
            <h3>All Answers to <?php echo $id;?></h3> 
            <table class="table table-bordered table-striped" style="width:1000px">
                <thead>
                    <tr>
                        <th>Antworten</th>
                        <th>Beweise</th>
                        <th>Mindset</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            // SELECT
            $sql= "SELECT questions.question, answer, answers.file_upload, answers.mindset 
            FROM questions INNER JOIN answers ON questions.id = answers.question_id 
            WHERE questions.id = $id ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach($result as $row){
                echo "<tr><td>{$row['answer']}</td>";
                echo "<td>{$row['file_upload']}</td>";
                echo "<td>{$row['mindset']}</td>";
                echo "</tr>";
            }
            ?>
                </tbody>
            </table>

            <button type="button" class="btn btn-success" onclick="location.href='/create.php?id=<?php echo $id;?>';">Create New Answer</button>
            <button type="button" class="btn btn-primary" onclick="location.href='/';">Create New Question</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/';">Go Back</button>
        </div>
    </div>
</div> 

<?php //require_once("footer.php");?>

