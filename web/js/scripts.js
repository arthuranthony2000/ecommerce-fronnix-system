function atualizar() {
	console.log('acionou');
	var qtd = $(this).val();
	var idProduto = $(this).attr('idproduto');
	//console.log(link+'&idProduto='+idProduto+'&qtdProduto='+qtd+' #cart');
	$.get(link+'&idProduto='+idProduto+'&qtdProduto='+qtd,function(data) {
		$('div.container > div.container').load(linkIndex+' #cart',function() {
			install();
		});
	});
	
}

function install() {
	$('.qtdProduto').blur(atualizar);
}

$(function() {
	install();
})