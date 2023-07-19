


<!-- Edit -->
<div class="modal fade" id="edit_<?php echo $member['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Edit Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="edit.php?id=<?php echo $member['id']; ?>">
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Firstname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="firstname" value="<?php echo $member['firstname']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Lastname</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="lastname" value="<?php echo $member['lastname']; ?>">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="address" value="<?php echo $member['address']; ?>">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="edit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $member['id']; ?>" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Delete Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center">Are you sure you want to delete?</p>
        <h2 class="text-center"><?php echo $member['firstname'].' '.$member['lastname']; ?></h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form method="POST" action="delete.php?id=<?php echo $member['id']; ?>">
          <button type="submit" name="delete" class="btn btn-danger">Yes</button>
        </form>
      </div>
    </div>
  </div>
</div>

