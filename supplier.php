<?php include 'sidebar.php' ?>

    <!-- CSS style-->
     <style>

     </style>

     <div class="maincontent">
        <div class="table-container">

        <h1>Supplier</h1>
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
        </div>
     </div>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
</body>

</html>