{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>{if $stock_personel->id}Edit{else}Add{/if} Stock Personel</h2>
				<div class="widget_inside drugs-search">
					<form class="form" method="POST" action=".">
						<input type="hidden" name="staff[id]" value="{$stock_personel->id}" />
						<input type="hidden" name="staff[type]" value="stock_personel" />
						<div class="clearfix">
							<label for="id_first_name">First Name:</label>
							<div class="input"><input type="text" class="required" name="staff[first_name]" value="{$stock_personel->first_name}" style="float: left"/></div>
						</div>
						<div class="clearfix">
							<label for="id_last_name">Last Name:</label>
							<div class="input"><input type="text" class="required" name="staff[last_name]" value="{$stock_personel->last_name}" style="float: left"/></div>
						</div>
						<div class="clearfix">
							<label for="id_speciality">Speciality:</label>
							<div class="input"><input type="text" class="required" name="staff[speciality]" value="{$stock_personel->speciality}" style="float: left"/></div>
						</div>
						<div class="clearfix">
							<label for="id_speciality">Notes:</label>
							<div class="input">
								<textarea name="staff[notes]">{$stock_personel->notes}</textarea>
							</div>
						</div>
						<div class="clearfix">
							<label for="id_speciality">User:</label>
							<div class="input">
								<select name="user" style="float: left">
									<option value='null'>----</option>
									{html_options options=$users selected=$stock_personel->ownUser[0]->id}
								</select>
							</div>
						</div>
						<div class="clearfix">
							<div class="input grey-highlight">
								<input type="submit" class="button blue" value="Save">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
{/block}