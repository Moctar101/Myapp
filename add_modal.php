<!-- Modal -->
<div class="modal fade" id="addnew" data-bs-backdrop="static"
data-bs-keyboard="false" tabindex="-1" aria-labelledby="addnew"
aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h1 class="modal-title fs-5" id="staticBackdropLabel">Add New</h1>
</div>
<div class="modal-body">
<form action="add.php" method="post">
<div class="form-group">
<label>Firstname</label>
<input type="text" name="firstname" class="form-control"
placeholder="Enter yourfirstname" id="firstname">
</div>
<div class="form-group">
<label>Lastname</label>
<input type="text" name="lastname" class="form-control"
placeholder="Enter your lastname" id="lastname">
</div>
<div class="form-group">
<label>Address</label>
<input type="text" name="address" class="form-control"
placeholder="Enter your Address" id="address">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary"
data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary"
name="add">save</button>
</form>
</div>
</div>
</div>
</div>