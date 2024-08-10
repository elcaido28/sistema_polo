window.onload = function(){
	document.querySelector('.boton').addEventListener('click', function(){
		document.querySelector('.container').classList.toggle('invisible');
		this.classList.toggle('mif-chevron-right');
	});
	document.querySelector('.boton').addEventListener('click', function(){
		//document.getElementsByClassName('.conetn_todo').addClass('.contenTodo_menu');
		document.querySelector('.content_todo').classList.toggle('contenTodo_menu');
	});

	document.querySelector('.boton').addEventListener('click', function(){
		//document.getElementsByClassName('.conetn_todo').addClass('.contenTodo_menu');
		document.querySelector('.content_todoF').classList.toggle('contenTodo_menuF');
	});
}
