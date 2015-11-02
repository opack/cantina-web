<div class="panel panel-default">
	<form class="form-horizontal" style="padding-top: 1em">
		<div class="form-group">
			<label for="txt-current-balance" class="col-xs-6 control-label">Solde actuel</label>
			<div class="col-xs-6">
				<div class="input-group">
					<input type="text" class="form-control bill-font text-right parameter-input" id="txt-current-balance" placeholder="0.00" value="">
					<span class="input-group-addon" >€</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="txt-admission" class="col-xs-6 control-label">Admission</label>
			<div class="col-xs-6">
				<div class="input-group">
					<input type="text" class="form-control bill-font text-right parameter-input" id="txt-admission" placeholder="0.00" value="3.91">
					<span class="input-group-addon" >€</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="txt-max-grant" class="col-xs-6 control-label">Subvention max</label>
			<div class="col-xs-6">
				<div class="input-group">
					<input type="text" class="form-control bill-font text-right parameter-input" id="txt-max-grant" placeholder="0.00" value="5.29">
					<span class="input-group-addon" >€</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="txt-bill-min" class="col-xs-6 control-label">Minimum plateau</label>
			<div class="col-xs-6">
				<div class="input-group">
					<input type="text" class="form-control bill-font text-right parameter-input" id="txt-bill-min" placeholder="0.00" value="2.30">
					<span class="input-group-addon" >€</span>
				</div>
			</div>
		</div>
	</form>
	<div class="row">
		<div class="col-xs-6 col-xs-offset-3 col-md-4 col-md-offset-4">
			<button class="btn-block btn btn-success" id="btn-save-parameters" disabled="disabled">
				<i class="glyphicon glyphicon-floppy-save"></i>
				<span class="hidden-xs"><br>Enregistrer</span>
			</button>
		</div>
	</div>
</div>
