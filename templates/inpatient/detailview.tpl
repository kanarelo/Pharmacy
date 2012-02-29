{extends "base.tpl"}

{block "extrajs"}
	<script type="text/javascript">
		$(document).ready(function() {
			var sum = 0;
			$('.subtotal').each(function() {
        		sum += Number($(this).html());
			});
			$('.total').html(sum);
		});
	</script>
{/block}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Inpatient Details: {$inpatient->name}</h2>
				<div class="widget_inside drugs-search">
					<div class="form">
						<div class="clearfix">
							Id: {$inpatient->id}
						</div>
						<div class="clearfix">
							Name: {$inpatient->name}
						</div>
					</div>
					<br />
					<h4>Drug History</h4>
					<table class='regular'>
						<thead>
							<tr>
								<th>Name</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Date Added</th>
								<th>Subtotal</th>
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
							<td class="total"></td>
						</tr>
					</table>
					{if $request->user->belongsToGroups('pharmacists')}
						<br />
						<a style="float: right" class="button blue" href="{#BASE_URL#}/patients/inpatients/{$inpatient->id}/clear-bill/">Clear bill</a>
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}
