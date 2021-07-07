<?php
	// include database connection file

	include 'db/connect.php';

	// fetch data from student table..

	$output = "";
	if (isset($_POST['query'])) {
		$search = $_POST['query'];
		$sql = "SELECT * FROM medicines WHERE name LIKE '%$search%'";
    $medicines = $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
	if ($medicines) {
		$output .= "<table class='table table-hover table-striped'>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Description</th>
				<th>Expired Date</th>
				<th>Amount</th>
				<th>/</th>
			</tr>
		</thead>";
        
		foreach($medicines as $row) {
		$output .= "<tbody>
			<tr>
				<td>{$row['id']}</td>
				<td>{$row['name']}</td>
				<td>{$row['description']}</td>
				<td>{$row['expired_date']}</td>
				<td>{$row['amount']}</td>
				<td>
					<a href='update.php?id={$row['id']}' class='btn btn-primary'>Update</a> / 
					<a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
				</td>
			</tr>
			</tbody>";
		}
	$output .="</table>";
		echo $output;
	}else{
		echo "<h5 class='text-center h3 text-danger my-3'>No record found</h5>";
	}
}
?>