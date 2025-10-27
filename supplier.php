<?php include 'sidebar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Supplier Page</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="asset/css/supplierstyle.css">
</head>
<body>

<div class="maincontent">
  <div class="table-container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1>Supplier</h1>
      <button id="addSupplierBtn" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Supplier
      </button>
    </div>

    <table id="example" class="table table-striped table-bordered w-100">
      <thead>
        <tr>
          <th>Supplier Name</th>
          <th>Category</th>
          <th>Location</th>
          <th>Phone Number</th>
          <th>Tel Num</th>
          <th>Email</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>
</div>


<div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="supplier-form" method="POST" action="config/save_supplier.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="supplierModalLabel">Add Supplier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="supplier-id" name="id" value="">
          <div class="mb-3">
            <label class="form-label">Supplier Name</label>
            <input type="text" name="name" id="supplier-name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" id="supplier-category" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" id="supplier-location" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="phone" id="supplier-phone" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Tel Num</label>
            <input type="text" name="telnum" id="supplier-telnum" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" id="supplier-email" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" id="supplier-status" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="save-supplier-btn" class="btn btn-success">Save Supplier</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>

<script>
$(document).ready(function () {
  var table = $('#example').DataTable({
    ajax: 'config/fetch_suppliers.php',
    columns: [
      { title: "Supplier Name" },
      { title: "Category" },
      { title: "Location" },
      { title: "Phone Number" },
      { title: "Tel Num" },
      { title: "Email" },
      { title: "Status" },
      { title: "Action", orderable: false, searchable: false }
    ]
  });

  
  $('#addSupplierBtn').on('click', function() {
    $('#supplier-form')[0].reset();
    $('#supplier-id').val('');
    $('#supplierModalLabel').text('Add Supplier');
    $('#save-supplier-btn').text('Add Supplier');
    $('#supplierModal').modal('show');
  });

  
  $('#example tbody').on('click', '.edit-btn', function() {
    var id = $(this).data('id');
    $.getJSON('config/get_supplier.php', { id: id }, function(data) {
      $('#supplier-id').val(data.id);
      $('#supplier-name').val(data.name);
      $('#supplier-category').val(data.category);
      $('#supplier-location').val(data.location);
      $('#supplier-phone').val(data.phone);
      $('#supplier-telnum').val(data.telnum);
      $('#supplier-email').val(data.email);
      $('#supplier-status').val(data.status);

      $('#supplierModalLabel').text('Edit Supplier');
      $('#save-supplier-btn').text('Update Supplier');
      $('#supplierModal').modal('show');
    });
  });

  
  $('#supplier-form').on('submit', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();

    $.post('config/save_supplier.php', formData, function(resp) {
      if (resp.success) {
        $('#supplierModal').modal('hide');
        table.ajax.reload(null, false);
        alert(resp.message);
      } else {
        alert(resp.message || 'Operation failed');
      }
    }, 'json').fail(function() {
      alert('Server error');
    });
  });

  
  $('#example tbody').on('click', '.delete-btn', function() {
    var id = $(this).data('id');
    if (confirm('Are you sure you want to delete this supplier?')) {
      $.post('config/delete_supplier.php', { id: id }, function(resp) {
        if (resp.success) {
          table.ajax.reload(null, false);
        } else {
          alert(resp.message || 'Delete failed');
        }
      }, 'json').fail(function() {
        alert('Server error on delete');
      });
    }
  });
});
</script>

</body>
</html>
