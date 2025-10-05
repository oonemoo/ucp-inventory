<?php include 'sidebar.php' ?>

<input type="number" class="form-control" id="serial">

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
                        <th>Location</th>
                        <th>Action</th>
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
                        <td>ABC Supplier</td>
                        <td>Warehouse</td>
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
                        <input type="number" class="form-control" id="serial"name="product_sku">
                    </div>
                        <label for="item-name" class="col-form-label">Product Name:</label>
                        <input type="text" class="form-control" id="name" name="product_name">
                    </div>
                    </div>
                        <label for="item-name" class="col-form-label">Description:</label>
                        <input type="text" class="form-control" id="description" name="product_description">
                    </div>
                    </div>
                        <label for="item-name" class="col-form-label">Category:</label>
                        <input type="text" class="form-control" id="category" name="product_category">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="col-form-label">QTY:</label>
                        <input type="number" class="form-control" id="quantity" name="product_qty">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="col-form-label">Date Received:</label>
                        <input type="date" class="form-control" id="date" name="date_received">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="col-form-label">Supplier:</label>
                        <input type="text" class="form-control" id="supplier" name="product_supplier">
                    </div>
                    <div class="mb-3">
                        <label for="location" class="col-form-label">Location:</label>
                        <input type="text" class="form-control" id="location" name="product_location">
                    </div>
                </form>
            </div>
            
            <form id="add-items">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    <form action="submit.php" method="POST">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </form>

        </div>
    </div>

    
</div>

     <!-- JQuery CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Add, Edit and Delete button action -->
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

    <!-- AJAX script-->
    <script>
       $(document).ready(function () {
        $('#add-items').on('submit', function (e) {
            e.preventDefault();

            $.ajax ({
                url:'submit.php',
                type: 'POST',
                data: $(this).serialize(),
                success: function (res) {
                        // optional: check if response is successful
                        if (res === 'success') {
                            // Extract values from the formData
                            const rowData = {};
                            formData.forEach(field => {
                                rowData[field.name] = field.value;
                            });

                            // Build the new row HTML
                            const newRow = `
                            <tr>
                                <td>${rowData.product_sku}</td>
                                <td>${rowData.product_name}</td>
                                <td>${rowData.product_description}</td>
                                <td>${rowData.product_category}</td>
                                <td>${rowData.product_qty}</td>
                                <td>${rowData.date_received}</td>
                                <td>${rowData.product_supplier}</td>
                                <td>${rowData.product_location}</td>
                                <td>
                                    <button class="edit-btn">Edit</button>
                                    <button class="delete-btn">Delete</button>
                                </td>
                            </tr>
                        `;

                        // Add to the DataTable
                        $('#example').DataTable().row.add($(newRow)).draw();

                        // Reset form and close modal
                        $('#add-items')[0].reset();
                        $('#exampleModal').modal('hide');
                    } else {
                        alert('Failed to add item: ' + res);
                    }
                },
                error: function () {
                    alert('An error occurred while adding the item.');
                }
            });
        });
       });

    </script>

</body>
</html>