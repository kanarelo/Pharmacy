{extends "base.tpl"}

{block "page-title"}{/block}

{block "container"}
	{if $request->user->belongsToGroups('nurses')}
		<h2>Nurse Dashboard</h2>
		<div class="nurse-dashboard">
		</div>
	{else if $request->user->belongsToGroups('pharmacists')}
		<h2>Pharmacist Dashboard</h2>
		<div class="pharmacists-dashboard">
		</div>
	{else if $request->user->belongsToGroups('doctors')}
		<div class="row clearfix">
			<div class="col_12">
				<div class="widget clearfix" style="height: 300px;">
					<h2>Drug Search</h2>
					<div class="widget_inside drugs-search" style="padding: 100px 400px;">
						<!--SIMPLE SEARCH for drug; by name -->
						<form class="" action="{#BASE_URL#}/search/products/" method="GET">
							<input name="q" class="text required" placeholder="Enter a name of a drug" type="text" style="width: 350px; color: rgb(169, 169, 169); "/>
							<input type="submit" class="submit" value="Search" style="float: right;margin-right: -8px;"/>
						</form>
					</div>
				</div>
			</div>
		</div>
	{else if $request->user->belongsToGroups('inventory-personel')}
		<div class="inventory-personel-dashboard">
		</div>
	{else if $request->user->belongsToGroups('admin')}
		
	{/if}
{/block}