const limit = document.getElementById('limit')

function checkInput(e)
{
     if (e.target.value <= 0) {
          e.target.value = 1
     }
}

limit.addEventListener('input', checkInput)