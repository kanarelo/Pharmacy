{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Nurses</h2>
				<div class="widget_inside drugs-search">
					<div id="add" style="width:100%;clear:both"><a href="{#BASE_URL#}/admin/staff/nurses/add/" class="button blue" style="float:right">Add Nurse</a></div>
					{if $nurses}
						<table class='regular'>
							<tr>
								<th>Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Actions</th>
							</tr>
							{foreach $nurses as $nurse}
								<tr>	
									<td>{$nurse->id}</td>
									<td>{$nurse->first_name}</td>
									<td>{$nurse->last_name}</td>
									<td>
										<a href="{#BASE_URL#}/nurse/{$product->id}/">R</a>
										{if $request->user->belongsToGroup('admin')}
											|
											<a href="{#BASE_URL#}/admin/staff/nurses/{$nurse->id}/edit/">U</a> |
											<a href="{#BASE_URL#}/admin/staff/nurses/{$nurse->id}/delete/">D</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Nurses Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Nurse Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}
