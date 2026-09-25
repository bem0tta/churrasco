document.querySelectorAll('.excluir').forEach(element => {
    element.addEventListener('click',()=>{
        if (element.innerText == "Confirmar?") {
            window.location.assign('excluir.php?id='+element.dataset.id)
        }
        element.innerText = "Confirmar?"
        setTimeout(()=>{
           element.innerText = "Excluir" 
        }, 5000)
    })
});