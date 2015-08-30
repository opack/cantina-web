
<div class="row">
	<div class="col-xs-12 btn-group btn-group-justified" role="group">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-7">7</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-8">8</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-9">9</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 btn-group btn-group-justified" role="group">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-4">4</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-5">5</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-6">6</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 btn-group btn-group-justified" role="group">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-1">1</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-2">2</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-3">3</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 btn-group btn-group-justified" role="group">
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-0">0</button>
		</div>
		<div class="btn-group" role="group">
			<button type="button" class="btn btn-default bill-font" id="btn-price-dot">,</button>
		</div>
		<div class="btn-group" role="group">
		</div>
	</div>
</div>
<div class="row">
	<form class="col-xs-12">
		<div class="form-group">
			<label for="price" >Prix : </label>
			<div class="input-group">
				<span class="input-group-btn">
					<button class="btn bg-warning text-warning" type="button" id="btn-clear-price"><i class="fa fa-eraser"></i></button>
				</span>
				<input type="text" class="form-control bill-font text-right" id="txt-price" placeholder="0.00" readonly>
				<span class="input-group-addon" id="sizing-addon1">€</span>
				<span class="input-group-btn">
					<button class="btn btn-primary" type="button" id="btn-add-price" disabled="disabled">
						<!--DBG<span class="glyphicon glyphicon-plus"></span>--><i class="fa fa-cart-plus"></i>
						<span class="hidden-xs"> Ajouter</span>
					</button>
				</span>
			</div>
		</div>
	</form>
</div>