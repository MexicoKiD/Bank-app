<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Transactions</h3>
	</div>
	<div class="card-body">
        <div class="container-fluid">
			<table class="table table-bordered table-stripped" id="indi-list">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Date Created</th>
						<th>Transaction</th>
						<th>Amount</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT t.*,concat(a.lastname,', ',a.firstname, a.middlename) as `name`,a.account_number from `transactions` t inner join `accounts` a on a.id = t.account_id where t.account_id = '".$_settings->userdata('id')."' order by unix_timestamp(t.date_created) desc ");
						while($row = $qry->fetch_assoc()):
					?>
					
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['date_created'] ?></td>
							<td><?php echo $row['remarks'] ?></td>
							<td class='text-right'><?php echo number_format($row['amount'],2) ?></td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	var indiList;
	$(document).ready(function(){
	})
	$(function(){
		$('#indi-list').dataTable()
	})
</script>