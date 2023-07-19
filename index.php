<?php
session_start();
include_once('conn.php');
$database = new Connection();
$db = $database->open();
$str = isset($_GET['search']) ? $_GET['search'] : '';


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TPCRUD</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid col-8 mt-4">
<h1 class="text-center">TP PHP CRUD </h1>
<div class="row">
<div class="col-5">
<form method="get" action="">
<input type="text" name="search" class="form-control"
placeholder="Entrez votre firstname" id="firstname">
</div>
<div class="col-2">
<input type="submit" name="submit" class="btn btn-primary" id="firstname"
value="Search">
</form>
</div>
<div class="col-2">
<button type="button" class="btn btn-primary"
data-bs-toggle="modal" data-bs-target="#addnew">
        Add
</button>
</div>
</div>
<div class="card">
<div class="card-header fs-4 text-center">
Liste membres
</div>
<div class="card-body">
<?php
//session_start();
if (isset($_SESSION['message'])) {
?>
<div class="alert alert-info text-center">
<?php echo $_SESSION['message']; ?>
</div>
<?php
}
?>
<table class="table table-bordered table-striped">
<thead>
<th>ID</th>
<th>Firsname</th>
<th>Lastname</th>
<th>Address</th>
<th class="text-center">Action</th>
</thead>
<tbody>
<?php
try {
    
if (isset($_GET['submit']) && !empty(trim($_GET['search']))) {
$count = $db->query("SELECT COUNT(id) AS cpt FROM members
where firstname LIKE '%$str%'");
$tcount = $count->fetchAll();
// Pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$nbr_elements_par_page = 5;
$nbr_de_pages = ceil($tcount[0]["cpt"] / $nbr_elements_par_page);
$debut = ($page - 1) * $nbr_elements_par_page;
$sel = $db->query("SELECT * FROM members WHERE firstname LIKE '%$str%' ORDER BY id
LIMIT $debut, $nbr_elements_par_page");
}else {
$count = $db->query('SELECT COUNT(id) AS cpt FROM members');
$tcount = $count->fetchAll();
// Pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$nbr_elements_par_page = 5;
$nbr_de_pages = ceil($tcount[0]["cpt"] / $nbr_elements_par_page);
$debut = ($page - 1) * $nbr_elements_par_page;
// Recuperer les enregistrements eux_memes
$sel = $db->query("SELECT * FROM members ORDER BY id LIMIT $debut,
$nbr_elements_par_page");
}
// foreach ($tab as $row) {
while($member = $sel->fetch()){
?>
<tr>
<td>
<?php echo $member['id']; ?>
</td>
<td>
<?php echo $member['firstname']; ?>
</td>
<td>
<?php echo $member['lastname']; ?>
</td>
<td>
<?php echo $member['address']; ?>
</td>
<td class="text-center">
<a href="#edit_<?php echo $member['id']; ?> " class="btn btn-success btn "
data-bs-toggle="modal">Edit</a>
<a href="#delete_<?php echo $member['id']; ?> "
class="btn btn-danger btn-sm" data-bs-toggle="modal">delet</a>
</td>
<?php include 'edit_delete_modal.php'; ?>
</tr>
<?php
}
} catch (PDOException $e) {
echo "probleme de connection" . $e->getMessage();
}
$database->close();
?>
</tbody>
</table>
<nav aria-label="Page navigation example">
<ul class="pagination">
<li class="page-item">
<a class="page-link" href="#" aria-label="Previous">
<span aria-hidden="true">&laquo;</span>
</a>
</li>
<?php
for ($i = 1; $i <= $nbr_de_pages; $i++) {
?>
<li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?> ">
<?php echo $i; ?> </a></li>
<?php
}
?>
<li class="page-item">
<a class="page-link" href="#" aria-label="Next">
<span aria-hidden="true">&raquo;</span>
</a>
</li>
</ul></nav>
</div>
</div>
<br /><br /><br /><br />
<div class="c-header fs-4 text-center ">
<h4>Mohamed El Moctar Mohamed Abdallahi <br />
2TT   <br /> No:012
</h4>

</div>







<?php include 'add_modal.php'; ?>
<script src="js/bootstrap.bundle.js"></script>
</body>
</html>