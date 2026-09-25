const nome = document.getElementById('nome')
const turma = document.getElementById('turma')
const tipo = document.getElementById('tipo')
const telefone = document.getElementById('telefone')
const presenca = document.getElementsByName('presenca')
const pagamento = document.getElementsByName('pagamento')
const btn = document.getElementById('btn')
const elementos = [nome, turma, telefone, tipo, acompanhamento]

function verificaCampos(elementos, presenca, pagamento, btn) {

    for (const element of elementos) {

        if (element.value == "") {
            btn.disabled = 1
            return
        }
    }

    if (![...presenca].some(radio => radio.checked)) {
        btn.disabled = 1
        return
    }

    if (![...pagamento].some(radio => radio.checked)) {
        btn.disabled = 1
        return
    }

    btn.disabled = 0
}

verificaCampos(elementos, presenca, pagamento, btn)

elementos.forEach(element => {
    element.addEventListener('input', function () {
        verificaCampos(elementos, presenca, pagamento, btn)
    })
})

presenca.forEach(radio => {
    radio.addEventListener('change', function () {
        verificaCampos(elementos, presenca, pagamento, btn)
    })
})

pagamento.forEach(radio => {
    radio.addEventListener('change', function () {
        verificaCampos(elementos, presenca, pagamento, btn)
    })
})