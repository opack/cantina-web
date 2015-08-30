
<div class="panel panel-default" id="pnl-results">
	<div class="panel-heading">
		<h3 class="panel-title">Résultats <span id="spn-results-title">de la simulation</span></h3>
	</div>
	<table class="table">
		<tr id="tr-total">
			<td>
				<h3><span id="spn-total-title">Total à payer</span>
					<a tabindex="0" class="hidden" id="a-total-popover-danger"
						data-toggle="popover" data-trigger="focus"
						title="Total supérieur au solde"
						data-content="Le total que vous devez payer est supérieur au solde actuel de votre badge : retirez des articles !">
						Total à payer <span class="glyphicon glyphicon-info-sign"></span>
					</a>
				</h3>
			</td>
			<td class="text-right" style="padding-right: 20px">
				<h3><span class="bill-font" id="spn-total">0.00</span>&nbsp;€</h3>
			</td>
		</tr>
		<tr id="tr-lost-grant">
			<td>
				<span id="spn-lost-grant-title">Subvention perdue</span>
				<a tabindex="0" class="hidden" id="a-lost-grant-popover-warning"
				data-toggle="popover" data-trigger="focus" 
				title="Subvention perdue !"
				data-content="Une partie de la subvention accordée par votre employeur est perdue : ajoutez des articles pour optimiser votre plateau !">
					Subvention perdue <span class="glyphicon glyphicon-info-sign"></span>
				</a>
			</td>
			<td class="text-right" style="padding-right: 20px">
				<span class="bill-font" id="spn-grant-lost">0.00</span>&nbsp;€
			</td>
		</tr>
		<tr id="tr-new-balance">
			<td>
				<span id="spn-new-balance-title">Nouveau solde</span>
				<a tabindex="0" class="hidden" id="a-new-balance-popover-danger"
					data-toggle="popover" data-trigger="focus"
					title="Vous devez recharger !"
					data-content="Votre nouveau solde ne vous permettra pas de vous offrir un repas lors de votre prochain passage : pensez à recharger !">
					Nouveau solde <span class="glyphicon glyphicon-info-sign"></span>
				</a>
				<a tabindex="0" class="hidden" id="a-new-balance-popover-warning"
					data-toggle="popover" data-trigger="focus"
					title="Nouveau solde faible"
					data-content="Votre nouveau solde ne vous permettra pas de vous offrir un repas équivalent lors de votre prochain passage : pensez à recharger !">
					Nouveau solde <span class="glyphicon glyphicon-info-sign"></span>
				</a>
			</td>
			<td class="text-right" style="padding-right: 20px">
				<span class="bill-font" id="spn-new-balance">0.00</span>&nbsp;€
			</td>
		</tr>
	</table>
</div>