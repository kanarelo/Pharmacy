{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Doctors</h2>
				<div class="widget_inside drugs-search">
					<div id="add" style="width:100%;clear:both"><a href="{#BASE_URL#}/admin/staff/doctors/add/" class="button blue" style="float:right">Add Doctor</a></div>
					{if $doctors}
						<table class='regular'>
							<tr>
								<th>Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Actions</th>
							</tr>
							{foreach $doctors as $doctor}
								<tr>	
									<td>{$doctor->id}</td>
									<td>{$doctor->first_name}</td>
									<td>{$doctor->last_name}</td>
									<td>
										<a href="{#BASE_URL#}/doctor/{$product->id}/">R</a>
										{if $request->user->belongsToGroup('admin')}
											|
											<a href="{#BASE_URL#}/admin/staff/doctors/{$doctor->id}/edit/">U</a> |
											<a href="{#BASE_URL#}/admin/staff/doctors/{$doctor->id}/delete/">D</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Doctors Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Doctor Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}
