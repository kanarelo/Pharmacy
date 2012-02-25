{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Wards</h2>
				<div class="widget_inside drugs-search">
					<div id="add" style="width:100%;clear:both"><a href="{#BASE_URL#}/admin/wards/add/" class="button blue" style="float:right">Add Ward</a></div>
					{if $wards}
						<table class='regular'>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>location</th>
								<th>Actions</th>
							</tr>
							{foreach $wards as $ward}
								<tr>	
									<td>{$ward->id}</td>
									<td>{$ward->name}</td>
									<td>{$ward->location}</td>
									<td>
										<a href="{#BASE_URL#}/wards/{$ward->id}/">R</a>
										{if $request->user->belongsToGroups('admin')}
											|
											<a href="{#BASE_URL#}/admin/wards/{$ward->id}/edit/">U</a> |
											<a href="{#BASE_URL#}/admin/wards/{$ward->id}/delete/">D</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Wards Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Wards Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}