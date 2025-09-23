<?php include 'inventory.php' ?>

<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Simulate saving to database or doing validation
    $sku = $_POST['product_sku'];
    $name = $_POST['product_name'];
    $description = $_POST['product_description'];
    $category = $_POST['product_category'];
    $qty = $_POST['product_qty'];
    $date = $_POST['product_received'];
    $supplier = $_POST['product_supplier'];
    $location = $_POST['product_location'];

    // Return JSON response
    header('Content-type:application/json');
    echo json_encode ([
        'status' => 'success',
        'data' => [
            'produc_sku' => $sku,
            'product_name' => $name,
            'product_description' => $description,
            'product_category' => $category,
            'product_qty' => $qty,
            'date_received' => $date,
            'product_supplier' => $supplier,
            'product_location' => $location     
        ]
    ]);
}
?>

<script>
    success: function (res) {
    const item = res.data;

    const newRow = `
        <tr>
        <td>#${item.product_sku}</td>
        <td>${item.product_name}</td>
        <td>${item.product_description}</td>
        <td>${item.product_category}</td>
        <td>${item.product_qty}</td>
        <td>${item.date_received}</td>
        <td>${item.product_supplier}</td>
        <td>${item.product_location}</td>
        <td>
            <button class="edit-btn">Edit</button>
            <button class="delete-btn">Delete</button>
        </td>
        </tr>
    `;

    $('#example').DataTable().row.add($(newRow)).draw();
    $('#add-items')[0].reset();
    $('#exampleModal').modal('hide');
    }
</script>

</body>
</html>