{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Users</h2>
				<div class="widget_inside drugs-search">
					<div id="add" style="width:100%;clear:both"><a href="{#BASE_URL#}/admin/users/add/" class="button blue" style="float:right">Add User</a></div>
					{if $users}
						<table class='regular'>
							<tr>
								<th>Id</th>
								<th>Username</th>
								<th>Email</th>
								<th>Actions</th>
							</tr>
							{foreach $users as $user}
								<tr>	
									<td>{$user->id}</td>
									<td>{$user->username}</td>
									<td>{$user->email}</td>
									<td>
										<a href="{#BASE_URL#}/admin/users/{$user->id}/">R</a>
										{if $request->user->belongsToGroup('admin')}
											|
											<a href="{#BASE_URL#}/admin/users/{$user->id}/edit/">U</a> |
											<a href="{#BASE_URL#}/admin/users/{$user->id}/delete/">D</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Users Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Users Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}