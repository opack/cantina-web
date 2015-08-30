
// Indique s'il est possible d'utiliser le localStorage sur ce navigateur
var localStorageAvailable = typeof(Storage) !== "undefined";

/**
* Retourne la valeur numérique contenue dans le composant indiqué
*/
function parseFromField(id) {
	var component = $("#" + id);
	if (component == null
	|| component.val() === undefined) {
		return 0;
	}
	
	var val = parseFloat(component.val());
	if (isNaN(val)) {
		return 0;
	}
	
	return val;
}

/**
* Retourne la valeur numérique contenue dans le span d'id indiqué
*/
function parseFromSpan(id) {
	var component = $("#" + id);
	if (component == null
	|| component.text() === undefined) {
		return 0;
	}
	
	var val = parseFloat(component.text());
	if (isNaN(val)) {
		return 0;
	}
	
	return val;
}

/**
* Retourne la valeur numérique contenue dans le span indiqué
*/
function parseFromSpanElement(component) {
	if (component == null
	|| component.text() === undefined) {
		return 0;
	}
	
	var val = parseFloat(component.text());
	if (isNaN(val)) {
		return 0;
	}
	
	return val;
}

/**
* Calcule le prix du repas et met à jour les composants concernés
*/
function compute() {
	var admission = parseFromField("txt-admission");
	var maxGrant = parseFromField("txt-max-grant");
	var	billMin = parseFromField("txt-bill-min");
	var curBalance = parseFromField("txt-current-balance");
	
	// Calcule le total des plats
	var mealTotal = 0;
	$("[name='spn-meal'").each(function() {
		mealTotal += parseFromSpanElement($(this));
	});
	
	var toPay = 0;
	var lostGrant = 0;
	var newBalance = 0;
	// S'il y a des plats, alors on calcule les résultats
	if (mealTotal > 0) {
		// Calcule le total à payer
		toPay = admission + mealTotal - maxGrant;
		
		// Si le total à payer est inférieur au minimum plateau, on baisse la subvention
		if (toPay < billMin) {
			lostGrant = billMin - toPay;
			toPay = billMin;
		}
		
		// Calcule le nouveau solde
		newBalance = curBalance - toPay;
	}
	
	
	// Affiche les résultats
	$("#spn-total").text(toPay.toFixed(2));
	$("#spn-grant-lost").text(lostGrant.toFixed(2));
	$("#spn-new-balance").text(newBalance.toFixed(2));
	
	// Met en couleur les lignes de résultat
	// Total en rouge si le montant dépasse le solde
	if (toPay > curBalance) {
		$("#tr-total").removeClass("danger success").addClass("danger");
		$("#spn-total-title").removeClass("hidden show").addClass("hidden");
		$("#a-total-popover-danger").removeClass("hidden show").addClass("show");
	}
	// En vert si le montant ne dépasse pas le solde
	else if (toPay > 0) {
		$("#tr-total").removeClass("danger success").addClass("success");
		$("#spn-total-title").removeClass("hidden show").addClass("show");
		$("#a-total-popover-danger").removeClass("hidden show").addClass("hidden");
	}
	// Sans couleur s'il n'y a rien à payer
	else {
		$("#tr-total").removeClass("danger success");
		$("#spn-total-title").removeClass("hidden show").addClass("show");
		$("#a-total-popover-danger").removeClass("hidden show").addClass("hidden");
	}
	
	// Subvention perdue en jaune si son montant est supérieur à 0
	if (lostGrant > 0) {
		$("#tr-lost-grant").removeClass("warning success").addClass("warning");
		$("#spn-lost-grant-title").removeClass("hidden show").addClass("hidden");
		$("#a-lost-grant-popover-warning").removeClass("hidden show").addClass("show");
	}
	// En vert si la subvention est totalement utilisée (donc perte à 0)
	else if (toPay > 0) {
		$("#tr-lost-grant").removeClass("warning success").addClass("success");
		$("#spn-lost-grant-title").removeClass("hidden show").addClass("show");
		$("#a-lost-grant-popover-warning").removeClass("hidden show").addClass("hidden");
	}
	// Sans couleur s'il n'y a rien à payer
	else {
		$("#tr-lost-grant").removeClass("warning success");
		$("#spn-lost-grant-title").removeClass("hidden show").addClass("show");
		$("#a-lost-grant-popover-warning").removeClass("hidden show").addClass("hidden");
	}
	
	// Nouveau solde en rouge s'il est inférieur à un plateau min
	if (toPay > 0) {
		if (newBalance < billMin) {
			$("#tr-new-balance").removeClass("danger warning success").addClass("danger");
			$("#spn-new-balance-title").removeClass("hidden show").addClass("hidden");
			$("#a-new-balance-popover-danger").removeClass("hidden show").addClass("show");
			$("#a-new-balance-popover-warning").removeClass("hidden show").addClass("hidden");
		}
		// En jaune s'il est inférieur au total actuel (indiquant qu'on ne poura pas se
		// payer un repas similaire
		else if (newBalance < toPay) {
			$("#tr-new-balance").removeClass("danger warning success").addClass("warning");
			$("#spn-new-balance-title").removeClass("hidden show").addClass("hidden");
			$("#a-new-balance-popover-danger").removeClass("hidden show").addClass("hidden");
			$("#a-new-balance-popover-warning").removeClass("hidden show").addClass("show");
		}
		// En vert si le nouveau solde est encore correct
		else {
			$("#tr-new-balance").removeClass("danger warning success").addClass("success");
			$("#spn-new-balance-title").removeClass("hidden show").addClass("show");
			$("#a-new-balance-popover-danger").removeClass("hidden show").addClass("hidden");
			$("#a-new-balance-popover-warning").removeClass("hidden show").addClass("hidden");
		}
	}
	// Sans couleur s'il n'y a rien à payer
	else {
		$("#tr-new-balance").removeClass("danger warning success");
		$("#spn-new-balance-title").removeClass("hidden show").addClass("show");
		$("#a-new-balance-popover-danger").removeClass("hidden show").addClass("hidden");
		$("#a-new-balance-popover-warning").removeClass("hidden show").addClass("hidden");
	}
}

function simulate() {
	// Calcule et met à jour l'interface avec les résultats
	compute();
	
	// Modifie la couleur et le titre du panneau de résultats pour
	// indiquer qu'on a fait une simulation et pas un paiement
	$("#pnl-results").removeClass("panel-default panel-info panel-success panel-warning").addClass("panel-info");
	$("#spn-results-title").text("de la simulation");
}

/**
* Calcule le prix à payer puis met à jour le solde actuel
*/
function pay() {
	// Calcule et met à jour l'interface avec les résultats
	compute();
	
	// Modifie la couleur et le titre du panneau de résultats pour
	// indiquer qu'on a fait un paiement et pas une simulation
	$("#pnl-results").removeClass("panel-default panel-info panel-success panel-warning").addClass("panel-success");
	$("#spn-results-title").text("du paiement");
	
	// Stocke le solde
	if (localStorageAvailable) {
		var currentBalance = parseFromSpan("spn-new-balance");
		localStorage.setItem("balance", currentBalance);
		$("#txt-current-balance").val(currentBalance);
	}
}

/**
* Ajoute la valeur indiquée au prix courant. La valeur est
* ajoutée à la fin de la chaine.
*/
function addDigit(value) {	
	var curPrice = $("#txt-price").val();
	
	// Ajoute le chiffre à la fin du prix
	$("#txt-price").val(curPrice + value);
	
	// Le point ne peut pas être utilisé 2 fois de suite.
	// Si le prix est correct, alors on permet l'ajout du plat
	updateDisabledStates();
}

/**
* Réinitialise le champ de saisie de prix et met à jour
* les champs liés
*/
function clearPrice() {	
	$("#txt-price").val("");
	
	// Le bouton point est de nouveau disponible
	// Aucun prix, donc impossible d'ajouter ce prix à la liste
	updateDisabledStates();
}

/**
* Ajoute le prix saisie à la liste des prix
*/
function addPrice() {
	// Récupère le prix saisi et le formate
	var price = $("#txt-price").val();
	price = parseFloat(price).toFixed(2);
	
	// Ajoute le prix à la liste
	var timestamp = $.now();
	$('#tbl-meals > tbody:last-child').append(
		"<tr class='meal-item' id='tr-meal-" + timestamp + "'>"+
			"<td class='text-right'>"+
				"<span class='bill-font' name='spn-meal'>" + price + "</span>&nbsp;€"+
			"</td>"+
			"<td class='text-center'>"+
				"<button class='btn btn-default' type='button' onclick='removePrice(" + timestamp + ")'><i class='fa fa-trash-o'></i></button>"+
			"</td>"+
		"</tr>"
	);
	
	// Active le bouton de paiement
	updateDisabledStates();
	
	// Réinitialise le champ de saisie de prix
	clearPrice();
	
	// Calcule le nouveau prix
	simulate();
}

/**
* Supprime la ligne de prix correspondant au repas d'id indiqué
*/
function removePrice(mealId){
	$("#tr-meal-" + mealId).remove();
	
	// S'il n'y a plus de prix dans la liste, impossible de simuler ou payer
	updateDisabledStates();
	
	// Calcule le nouveau prix
	simulate();
};

function updateDisabledStates() {
	// S'il n'y a pas de prix saisi, impossible de l'ajouter à la liste
	var price = $("#txt-price").val();
	if (price == ""
	|| price == "."
	|| parseFloat(price) == 0) {
		$("#btn-add-price").attr("disabled", "disabled");
	} else {
		$("#btn-add-price").removeAttr("disabled");
	}
	
	// S'il y a un point dans le prix, impossible d'en saisir un autre
	if (price.contains(".")) {
		$("#btn-price-dot").attr("disabled", "disabled");
	} else {
		$("#btn-price-dot").removeAttr("disabled");
	}
	
	// S'il n'y a plus de prix dans la liste, impossible de simuler ou payer
	var nbMeals = $('#tbl-meals').children('tbody').children('tr').length;
	if (nbMeals == 0) {
		$("#btn-pay").attr("disabled", "disabled");
	} else {
		$("#btn-pay").removeAttr("disabled");
	}
}
