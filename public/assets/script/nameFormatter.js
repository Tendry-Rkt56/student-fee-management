const nom = document.getElementById('name')
const prenom = document.getElementById('prenom')

function formateName(value)
{
     return value.toUpperCase()
}

function formatePrenom(value)
{
     return value.split(' ').map(element => element.charAt(0).toUpperCase() + element.slice(1)).join(' ')
}

nom.addEventListener('input', (e) => {
     let value = e.target.value
     if (value.length > 0) {
          e.target.value = formateName(value)
     }
})

prenom.addEventListener('input', (e) => {
     let value = e.target.value
     if (value.length > 0) {
          e.target.value = formatePrenom(value)
     }
})

