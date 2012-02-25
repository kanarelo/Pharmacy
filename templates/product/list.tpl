{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Products</h2>
				<div class="widget_inside drugs-search">
					<div id="add" style="width:100%;clear:both"><a href="{#BASE_URL#}/admin/products/add/" class="button blue" style="float:right">Add Product</a></div>
					{if $products}
						<table class='regular'>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Price</th>
								<th>Category</th>
								<th>Actions</th>
							</tr>
							{foreach $products as $product}
								<tr>	
									<td>{$product->id}</td>
									<td>{$product->name}</td>
									<td>{$product->price}</td>
									<td>{if $product->category}{$product->category->name}{/if}</td>
									<td>
										<a href="{#BASE_URL#}/products/{$product->id}/">R</a>
										{if $request->user->belongsToGroup('admin')}
											|
											<a href="{#BASE_URL#}/admin/products/{$product->id}/edit/">U</a> |
											<a href="{#BASE_URL#}/admin/products/{$product->id}/delete/">D</a>
										{/if}
									</td>
								</tr>
							{foreachelse}
								<tr><td colspan="2">No Products Found</td></tr>
							{/foreach}
						</table>
					{else}
						No Products Found
					{/if}
				</div>
			</div>
		</div>
	</div>
{/block}