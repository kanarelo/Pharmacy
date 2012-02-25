{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Product Detail</h2>
				<div class="widget_inside drugs-search">
					<div class="form">
						<div class="clearfix">
							Id: {$product->id}
						</div>
						<div class="clearfix">
							Name: {$product->name}
						</div>
						{if $request->user->belongsToGroups('doctors')}
							<div class="clearfix">
								<button class="button blue"><a href="{#BASE_URL#}/products/{$product->id}/approve/">Approve</a></button>
								<button class="button"><a href="{#BASE_URL#}/products/{$product->id}/disapprove/">Disapprove</a></button>
							</div>
						{/if}
						{if $request->user->belongsToGroup('doctors')}
						{/if}
					</div>
				</div>
			</div>
		</div>
	</div>
{/block}
