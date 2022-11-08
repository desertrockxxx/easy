<?php
require_once("header.php");

// get id 
$id = $_GET['id'];

$object = new Mindset;
$advantage = "Advantage";
$disadvantage = "Disadvantage";
$argument = "Argument";
$counterargument = "Counter-argument";
$thesis = "Thesis";
$antithesis = "Antithesis";

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
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php $object->getQuestion($id); ?></td>
                </tr>
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
                </tr>
            </thead>
            <tbody>
                
            <?php $object->getID($id, $advantage); ?>
            
            </tbody>
            </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='create.php?id=<?php echo $id;?>&mindset=Advantage';">Create New Advantage</button>

        </div>

        <div class="col-sm-3">
        <!--Disadvantage Section-->
        <h3 class="text-center">Disadvantage</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nachteile</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $object->getID($id, $disadvantage); ?>
            
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='create.php?id=<?php echo $id;?>&mindset=Disadvantage';">Create New Disadvantage</button>
        
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-offset-3 col-sm-3">
        <!--Argument Section-->
        <h3 class="text-center">Argument</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Argument</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
            <?php $object->getID($id, $argument); ?>
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='create.php?id=<?php echo $id;?>&mindset=Argument';">Create New Argument</button>
        
        </div>
        <div class="col-sm-3">
        <!--Counter-argument Section-->
        <h3 class="text-center">Counter-argument</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gegenargument</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $object->getID($id, $counterargument); ?>
            
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='create.php?id=<?php echo $id;?>&mindset=Counter-argument';">Create New Counter-argument</button>
        
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-3">
        <!--Thesis Section-->
        <h3 class="text-center">Thesis</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>These</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
            
            <?php $object->getID($id, $thesis); ?>
            
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='create.php?id=<?php echo $id;?>&mindset=Thesis';">Create New Thesis</button>
        
        </div>
        <div class="col-sm-3">
        <!--Antithesis Section-->
        <h3 class="text-center">Antithesis</h3>
        <table class="table table-bordered table-striped" style="width:500px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Antithese</th>
                    <th>Beweise</th>
                </tr>
            </thead>
            <tbody>
                
            <?php $object->getID($id, $antithesis); ?>
            
            </tbody>
        </table>
        
        <button type="button" class="btn btn-success" onclick="location.href='create.php?id=<?php echo $id;?>&mindset=Antithesis';">Create New Antithesis</button>
        
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
                    
                <?php $object->getAllAnswers($id); ?>
                
                </tbody>
            </table>

            <button type="button" class="btn btn-success" onclick="location.href='create.php?id=<?php echo $id;?>';">Create New Answer</button>
            <button type="button" class="btn btn-primary" onclick="location.href='/';">Create New Question</button>
            <button type="button" class="btn btn-danger" onclick="location.href='/';">Go Back</button>
        </div>
    </div>
</div> 

<?php require_once("footer.php");?>

