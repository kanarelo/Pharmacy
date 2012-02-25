{extends "base.tpl"}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>{if $user->id}Edit{else}Add{/if} User</h2>
				<div class="widget_inside drugs-search">
					<form class="form" method="POST" action=".">
						<input type="hidden" name="user[type]" value="user" />
						<div class="clearfix">
							<label for="id_username">Username:</label>
							<div class="input">
								<input type="text" name="user[username]" value="{$user->username}" />
							</div>
						</div>
						<div class="clearfix">
							<label for="id_email">Email:</label>
							<div class="input">
								<input id="id_email" type="text" name="user[email]" value="{$user->email}" />
							</div>
						</div>
						<div class="clearfix">
							<label for="id_is_active">Is Active:</label>
							<div class="input">
								<input id="id_is_active" type="checkbox" name="user[is_active]" value="{$user->is_active}"/>
							</div>
						</div>
						<div class="clearfix">
							<label for="id_groups">Groups:</label>
							<div class="input">
								<select multiple name="groups[]" size="{$groups|@count}">
									{foreach $groups as $group}
										<option value="{$group->id}"
											{if isset($related_groups[$group->id])}
												selected="selected"
											{/if}
										>{$group->name}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="clearfix grey-highlight">
							<div class="input no-label">
					        	<input type="submit" class="button blue" value="Save">
					        </div>
					    </div>
					</form>
				</div>
			</div>
		</div>
	</div>
{/block}