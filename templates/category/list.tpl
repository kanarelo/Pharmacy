{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Categories</h2>
				<div class="widget_inside drugs-search">
					{if $categories}
						<table>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Actions</th>
							</tr>
							{foreach $categories as $category}
								<tr>	
									<td>{$category->id}</td>
									<td>{$category->name}</td>
									<td>
										<a href="{#BASE_URL#}/product-categories/{$category->id}/">R</a>
										{if $request->user->belongsToGroups('admin')}
											|
											<a href="{#BASE_URL#}/product-categories/{$category->id}/edit/">U</a> |
											<a href="{#BASE_URL#}/admin/product-categories/{$category->id}/delete/">D</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Categories Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Categories Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}