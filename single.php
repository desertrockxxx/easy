<?php require_once("header.php");

// get id 
$id = $_GET['id'];
?>

<div class="container col-sm-12">
    <div class="row">
        <!-- Einzelne Anzeigen des gewählten Beitrags -->
        <div class="col-sm-offset-3 col-sm-6">
            <h3 class="text-center">Topic</h3>
            <table class="table table-bordered table-striped" style="width:1000px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Topic</th>
                    <th>Content</th>
                    <th>Beweis</th>
                </tr>
            </thead>
            <tbody>
             <?php
            // SELECT
            $sql= "SELECT * FROM answers WHERE id = $id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach($result as $row){
                echo "<tr><td>{$row['id']}</td>";
                echo "<td>{$row['answer']}</td>";
                echo "<td>{$row['content']}</td>";
                echo "<td>{$row['file_upload']}</td>";
                
                echo "</tr></tbody></table>";
                echo "<a href='read.php?id={$row['question_id']}'>Zurück</a>";
                }
            ?> 
        </div>
    </div>
</div>




<?php require_once("footer.php");?>
