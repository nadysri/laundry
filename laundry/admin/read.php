<?php
include 'functions.php';
// Connect to MySQL database
$pdo = pdo_connect_mysql();

// Get the page via GET request (URL param: page), if non exists default the page to 1

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

// Number of records to show on each page
$records_per_page = 10;

$stmt = $pdo->prepare('SELECT * FROM receipt ORDER BY receiptID LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();

// Fetch the records 
$receipt = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get the total number of record, we can determine whether there should be a next and previous button
$num_contacts = $pdo->query('SELECT COUNT(*) FROM receipt')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>Receipt Details</h2>
	<a href="rceipt.php" class="create-contact">Create Receipt</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Staff Name</td>
                <td>Customer</td>
                <td>Name</td>
                <td>Contact Phone</td>
                <td>Address</td>
                <td>Service</td>
                <td>Dates</td>
                <td>Weight</td>
                <td>Total</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($receipt as $contact): ?>
            <tr>
                <td><?=$contact['receiptID']?></td>
                <td><?=$contact['staffID']?></td>
                <td><?=$contact['custID']?></td>
                <td><?=$contact['cfullname']?></td>
                <td><?=$contact['cphone']?></td>
                <td><?=$contact['address']?></td>
                <td><?=$contact['services']?></td>
                <td><?=$contact['timedates']?></td>
                <td><?=$contact['weight']?></td>
                <td class="actions">

                    <a href="delete.php?id=<?=$contact['receiptID']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contacts): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>