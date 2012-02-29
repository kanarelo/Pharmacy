{extends "base.tpl"}	

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Outpatients</h2>
				<div class="widget_inside drugs-search">
					{if $request->user->belongsToGroups('admin')}
						<div id="add" style="width:100%;clear:both"><a href="{#BASE_URL#}/patients/outpatients/add/" class="button blue" style="float:right">Add Outpatient</a></div>
					{/if}
					{if $outpatients}
						<table class='regular'>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Actions</th>
							</tr>
							{foreach $outpatients as $outpatient}
								<tr>	
									<td>{$outpatient->id}</td>
									<td>{$outpatient->name}</td>
									<td>{$outpatient->age}</td>
									<td>{$outpatient->gender}</td>
									<td>
										{if $request->user->belongsToGroups('admin')}
											<a href="{#BASE_URL#}/patients/outpatients/{$outpatient->id}/edit/">Edit</a> |
											<a href="{#BASE_URL#}/patients/outpatients/{$outpatient->id}/delete/">Delete</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Outpatients Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Outpatients Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}