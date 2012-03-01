{extends "base.tpl"}

{block "page-title"}Inpatient Management: Admin{/block}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Add Inpatient</h2>
				<div class="widget_inside drugs-search">
					<form class="form" method="POST" action=".">
						<input type="hidden" name="inpatient[type]" value="inpatient" />
				    	<div class="clearfix">
							<label >Name:</label>
							<div class="input">
								<input type="text" class="validate[required]" class="required" name="inpatient[name]" value="{$inpatient->name}"/>
							</div>
						</div>
						<div class="clearfix">
							<label >Age:</label>
							<div class="input">
								<input type="text" class="validate[required]" class="required" name="inpatient[age]" value="{$inpatient->age}"/>
							</div>
						</div>
						<div class="clearfix">
							<label >Allergies:</label>
							<div class="input">
								<textarea class="validate[required]" name="inpatient[allergies]"/>{$inpatient->allergies}</textarea>
							</div>
						</div>
						<div class="clearfix">
							<label >Gender:</label>
							<div class="input">
								<select name="inpatient[gender]">
									<option value="">----</option>
									<option value="M" {if $inpatient->gender=="M"}selected="selected"{/if}>Male</option>
									<option value="F" {if $inpatient->gender=="M"}selected="selected"{/if}>Female</option>
								</select>
							</div>
						</div>
						<div class="clearfix">
							<label >Note:</label>
							<div class="input">
								<textarea type="text" name="inpatient[notes]"/>{$inpatient->notes}</textarea>
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