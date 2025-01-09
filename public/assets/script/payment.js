const student = document.getElementById('student')
const hidden = document.getElementById('hidden')
const liste = document.getElementById('liste')
const port = window.location.port

async function getData(search)
{
     const response = await fetch(`http://localhost:${port}/api/students?search=${search}`)
     if (response.ok) {
          const data = await response.json()
          return data
     }
     else {
          return "Erruer"
     }
}

function appendData(data)
{     
     liste.innerHTML = ''
     data.forEach((element) => {
          liste.setAttribute('class', 'mt-4')
          let li = document.createElement('li')
          li.innerHTML = `${element.nom} ${element.prenom}`
          liste.appendChild(li)
          li.addEventListener('click', () => {
               student.value = li.innerHTML
               hidden.value = element.id
               liste.innerHTML = ''
               liste.setAttribute('class', 'mt-0')
          })
     })
}

student.addEventListener('input', async (e) => {
     if (e.target.value !== "") {
          const data = await getData(e.target.value)
          appendData(data)
     }
})