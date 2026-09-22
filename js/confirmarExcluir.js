document.getElementsByClassName('excluir').forEach(element => {
    element.addEventListener('click',()=>{
        if (element.innerText == "Confirmar?") {
            window.location.assign('excluir.php')
        }
        element.innerText = "Confirmar?"
        setTimeout(()=>{
           element.innerText = "Excluir" 
        }, 5000)
    })
});