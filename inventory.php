<?php include 'sidebar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Page</title>

  
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  
  <link rel="stylesheet" href="asset/css/inventorystyle.css">
</head>

<body>

<div class="maincontent">
  <div class="table-container">
    
    
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h1 class="mb-0">Inventory Items</h1>
      <button id="addItemBtn" class="btn btn-success">
        <i class="fas fa-plus"></i> Add Items
      </button>


    </div>

    
      <table id="inventoryTable" class="table table-striped table-bordered w-100">
      <thead>
        <tr>
          <th>SKU</th>
          <th>Product Name</th>
          <th>Description</th>
          <th>Category</th>
          <th>Quantity</th>
          <th>Date Purchased</th>
          <th>Warranty Validity</th>
          <th>Supplier</th>
          <th>Department Deployed</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>

  </div>
</div>


<div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="itemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="item-form" method="POST" action="config/save_item.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="itemModalLabel">Add New Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="item-id" name="id" value="">
          <div class="mb-3">
            <label class="form-label">SKU</label>
            <input type="number" name="sku" id="item-sku" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" id="item-name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" name="description" id="item-description" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" id="item-category" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" id="item-quantity" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Date Purchased</label>
            <input type="date" name="date_purchased" id="item-date-purchased" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Warranty Validity</label>
            <input type="date" name="warranty" id="item-warranty" class="form-control">
          </div>
          <div class="mb-3">
            <label class="form-label">Supplier</label>
            <select name="supplier" id="item-supplier" class="form-select" required>
              <option value="">Select Supplier</option>
              
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Department Deployed</label>
            <input type="text" name="department" id="item-department" class="form-control">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="save-btn" class="btn btn-success">Save Item</button>
        </div>
      </div>
    </form>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
<script>
$(document).ready(function() {
  loadSuppliersDropdown();
  var table = $('#inventoryTable').DataTable({
    ajax: 'config/fetch_inventory.php',
    columns: [
      { title: "SKU" },
      { title: "Product Name" },
      { title: "Description" },
      { title: "Category" },
      { title: "Quantity" },
      { title: "Date Purchased" },
      { title: "Warranty Validity" },
      { title: "Supplier" },
      { title: "Department Deployed" },
      { title: "Action", orderable: false, searchable: false }
    ]
  });

  
  $('#addItemBtn').on('click', function() {
    $('#item-form')[0].reset();          
    $('#item-id').val('');               
    $('#itemModalLabel').text('Add New Item');
    $('#save-btn').text('Add Item');
    $('#itemModal').modal('show');
  });

  
  $('#inventoryTable tbody').on('click', '.edit-btn', function() {
    var id = $(this).data('id');

    
    $.ajax({
      url: 'config/get_item.php',
      type: 'GET',
      data: { id: id },
      dataType: 'json',
      success: function(data) {
        
        $('#item-id').val(data.id);
        $('#item-sku').val(data.sku);
        $('#item-name').val(data.product_name);
        $('#item-description').val(data.description);
        $('#item-category').val(data.category);
        $('#item-quantity').val(data.quantity);
        $('#item-date-purchased').val(data.date_purchased);
        $('#item-warranty').val(data.warranty_validity);
        $('#item-supplier').val(data.supplier);
        $('#item-department').val(data.department_deployed);

        $('#itemModalLabel').text('Edit Item');
        $('#save-btn').text('Update Item');
        $('#itemModal').modal('show');
      },
      error: function() {
        alert('Failed to fetch item data.');
      }
    });
  });

  
  $('#item-form').on('submit', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();

    $.post('config/save_item.php', formData, function(response) {
      $('#itemModal').modal('hide');
      table.ajax.reload(null, false);
      alert(response.message || 'Item saved successfully');
    }, 'json').fail(function() {
      alert('Failed to save item.');
    });
  });
});


$('#inventoryTable tbody').on('click', '.delete-btn', function() {
  const id = $(this).data('id');

  if (confirm('Are you sure you want to delete this item?')) {
    $.ajax({
      url: 'config/delete_item.php',
      type: 'POST',
      data: { id: id },
      success: function(response) {
        const res = JSON.parse(response);
        if (res.success) {
          $('#inventoryTable').DataTable().ajax.reload(null, false);
          alert('Item deleted successfully.');
        } else {
          alert('Failed to delete item.');
        }
      },
      error: function() {
        alert('Server error while deleting item.');
      }
    });
  }
});

</script>

<script>
function loadSuppliersDropdown(selected = "") {
  $.getJSON('config/fetch_suppliers_list.php', function(data) {
    let $select = $('#item-supplier');
    $select.empty().append('<option value="">Select Supplier</option>');

    data.forEach(function(supplier) {
      const selectedAttr = (supplier.name === selected) ? 'selected' : '';
      $select.append(`<option value="${supplier.name}" ${selectedAttr}>${supplier.name}</option>`);
    });
  });
}


$('#addItemBtn').on('click', function () {
  $('#item-form')[0].reset();
  $('#item-id').val('');
  $('#itemModalLabel').text('Add New Item');
  $('#save-btn').text('Save Item');
  loadSuppliersDropdown(); 
  $('#itemModal').modal('show');
});


function openEditModal(itemData) {
  $('#item-id').val(itemData.id);
  $('#item-sku').val(itemData.sku);
  $('#item-name').val(itemData.product_name);
  $('#item-description').val(itemData.description);
  $('#item-category').val(itemData.category);
  $('#item-quantity').val(itemData.quantity);
  $('#item-date-purchased').val(itemData.date_purchased);
  $('#item-warranty').val(itemData.warranty_validity);
  $('#item-department').val(itemData.department_deployed);

  loadSuppliersDropdown(itemData.supplier); 
  $('#itemModalLabel').text('Edit Item');
  $('#save-btn').text('Update Item');
  $('#itemModal').modal('show');
}
</script>



</body>
</html>
