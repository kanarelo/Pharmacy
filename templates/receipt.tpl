<table border="0" cellspacing="3" cellpadding="4">
	<thead>
	</thead>
	<tr>
		<th colspan="4">Pharmacy Receipt</th>
	</tr>
	<tr>
		<td colspan="4"><center><H1>Clearance Receipt for payment to date</H1></center></td>
	</tr>
	<tr>
		<td colspan="4">Time: {$smarty.now|date_format:'d/m/Y H:i:s'}</td>
	</tr>
	<tr>
		<td colspan="1"><H3>Name:</H3></td>
		<td colspan="3"><H3>{$inpatient->name}</H3></td>
	</tr>
	<tr>
		<td colspan="1"><H3>Age:</H3></td>
		<td colspan="3"><H3>{$inpatient->age}</H3></td>
	</tr>
	<tr>
		<td colspan="4">
			<table>
				<thead>
					<tr>
						<th><u>Name</u></th>
						<th><u>Quantity</u></th>
						<th><u>Unit Price</u></th>
						<th><u>Date Added</u></th>
						<th><u>Subtotal</u></th>
					</tr>
				</thead>
				{foreach $inpatient_products as $inpatient_product}
					<tr>
						<td>{$inpatient_product->product->name}</td>
						<td>{$inpatient_product->quantity}</td>
						<td>{$inpatient_product->product->price}</td>
						<td>{$inpatient_product->time_changed|date_format:"d/m/Y"}</td>
						<td class="subtotal">{$inpatient_product->quantity * $inpatient_product->product->price}</td>
					</tr>
				{/foreach}
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>Total:</td>
					<td class="total">{$total}</td>
				</tr>
			</table>
		</td>
	</tr>
</table>