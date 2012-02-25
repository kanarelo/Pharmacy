{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Stock Personel</h2>
				<div class="widget_inside drugs-search">
					{if $pharmacists}
						<table class='regular'>
							<tr>
								<th>Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Actions</th>
							</tr>
							{foreach $pharmacists as $pharmacist}
								<tr>	
									<td>{$pharmacist->id}</td>
									<td>{$pharmacist->first_name}</td>
									<td>{$pharmacist->last_name}</td>
									<td>
										<a href="{#BASE_URL#}/pharmacist/{$product->id}/">R</a>
										{if $request->user->belongsToGroup('admin')}
											|
											<a href="{#BASE_URL#}/admin/staff/pharmacists/{$pharmacist->id}/edit/">U</a> |
											<a href="{#BASE_URL#}/admin/staff/pharmacists/{$pharmacist->id}/delete/">D</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Pharmacist Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Pharmacist Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}
