<?php include 'sidebar.php' ?>

<!-- Main content-->
<div class="maincontent">
    <div class="table-container">
          <!-- Button --> 
                <div class="clickable-button">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Items</button>
                </div>
            <table id="example" class="table">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Date Received</th>
                    <th>Supplier</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td data-search="">#245</td>
                    <td>PC</td>
                    <td>lorem</td>
                    <td>Hardware</td>
                    <td data-order="1323129600">5</td>
                    <td data-order="145600">June 16, 1991</td>
                    <td>
                        <button class="edit-btn">Edit</button>
                        <button class="delete-btn">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Content of the Add Button-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Items</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-items">
                <div class="mb-3">
                <div class="mb-3">
                    <label for="serial" class="col-form-label">SKU:</label>
                    <input type="number" class="form-control" id="serial">
                </div>
                    <label for="item-name" class="col-form-label">Item Name:</label>
                    <input type="text" class="form-control" id="item-name">
                </div>
                <div class="mb-3">
                    <label for="quantity" class="col-form-label">QTY:</label>
                    <input type="number" class="form-control" id="quantity">
                </div>
                <div class="mb-3">
                    <label for="date" class="col-form-label">Date Received:</label>
                    <input type="date" class="form-control" id="date">
                </div>
                <div class="mb-3">
                    <label for="location" class="col-form-label">Location:</label>
                    <input type="text" class="form-control" id="location">
                </div>
                </form>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>

    
</div>

    <!-- DataTables CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function () {
    var table = $('#example').DataTable();

    // Delete row
    $('#example tbody').on('click', '.delete-btn', function () {
        if (confirm("Are you sure you want to delete this row?")) {
            table.row($(this).parents('tr')).remove().draw();
        }
    });

    // Edit row
    $('#example tbody').on('click', '.edit-btn', function () {
        let $row = $(this).closest('tr');
        let $tds = $row.find('td').not(':last');

        if ($(this).text() === 'Edit') {
            $tds.each(function () {
                let txt = $(this).text();
                $(this).html('<input type="text" value="' + txt + '">');
            });
            $(this).text('Save');
        } else {
            $tds.each(function () {
                let inputVal = $(this).find('input').val();
                $(this).html(inputVal);
            });
            $(this).text('Edit');
        }
    });
});
</script>

<script>
    $(document).ready(function(){
        new DataTable('#example');
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#add-items').on('submit', function (e) {
    e.preventDefault();

    $.ajax({
      url: 'submit.php', // Backend PHP file
      type: 'POST',
      data: $(this).serialize(),
      success: function (res) {
        $('#response').html(res);
        $('#add-items')[0].reset(); // clear form
      },
      error: function () {
        $('#response').html('<p style="color:red;">An error occurred.</p>');
      }
    });
  });
</script>

</body>
</html>