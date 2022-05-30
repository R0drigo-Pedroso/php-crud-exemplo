//  Código para executar a exluir linha dos link
const link = document.querySelectorAll('.excluir');
    for(let i = 0; i < link.length; i++) {
        link[i].addEventListener('click', function(event) {
            event.preventDefault();
    
            if(confirm('Deseja excluir?')) {
                location.href = this.href;
            }
        });
    }

