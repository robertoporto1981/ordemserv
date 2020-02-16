//Pego as teclas e executo uma função.

//Botao incluir item
 addEventListener("keydown", function(event) {

    if (event.keyCode == 113)

    	window.location.href="grava_nota.php";
         
  });
  
//Botao fechamento
addEventListener("keydown", function(event) {

    if (event.keyCode == 115)
     window.location.href="pedido_fechamento.php";

  });

//Botao cancela nota
addEventListener("keydown", function(event){

	if(event.keyCode == 117)

		window.location.href="cancela_nota.php";
});

//Botao encerra nota
addEventListener("keydown", function(event){

	if(event.keyCode == 119)

		window.location.href="encerra_nota.php";
});

//Botao continuar nota
addEventListener("keydown", function(event){

	if(event.keyCode == 120)

		window.location.href="pdv.php";
});

//Pesquisa produto
addEventListener("keydown", function(event){

	if(event.keyCode == 121)

		window.location.href="lista_produtos_pdv.php";
});

