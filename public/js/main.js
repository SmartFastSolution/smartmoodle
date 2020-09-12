const dragables = document.querySelectorAll('.drag')


dragables.forEach(dragable =>{
	dragable.addEventListener('dragstart', dragStart);

function dragStart(){
	console.log('Iniciado');
	event.dataTransfer.setData('text/plain', 'V');
	this.classList.add('dragabling');

}

})