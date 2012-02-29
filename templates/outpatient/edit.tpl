{extends "base.tpl"}

{block "page-title"}Outpatient Management: Admin{/block}

{block "container"}
	<div class="row clearfix">
		<div class="col_12">
			<div class="widget clearfix" style="min-height: 300px;">
				<h2>Add Outpatient</h2>
				<div class="widget_inside drugs-search">
					<form class="form" method="POST" action=".">
						<input type="hidden" name="outpatient[type]" value="outpatient" />
				    	<div class="clearfix">
							<label >Name:</label>
							<div class="input">
								<input type="text class="required" name="outpatient[name]" value="{$outpatient->name}"/>
							</div>
						</div>
						<div class="clearfix">
							<label >Age:</label>
							<div class="input">
								<input type="text class="required" name="outpatient[age]" value="{$outpatient->age}"/>
							</div>
						</div>
						<div class="clearfix">
							<label >Allergies:</label>
							<div class="input">
								<textarea type="text" name="outpatient[allergies]"/>{$outpatient->allergies}</textarea>
							</div>
						</div>
						<div class="clearfix">
							<label >Gender:</label>
							<div class="input">
								<select name="outpatient[gender]">
									<option value="">----</option>
									<option value="M" {if $outpatient->gender=="M"}selected="selected"{/if}>Male</option>
									<option value="F" {if $outpatient->gender=="M"}selected="selected"{/if}>Female</option>
								</select>
							</div>
						</div>
						<div class="clearfix">
							<label >Note:</label>
							<div class="input">
								<textarea type="text" name="outpatient[notes]"/>{$outpatient->notes}</textarea>
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