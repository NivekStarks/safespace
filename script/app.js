let modals = []

const openModal = function (event) {
    event.preventDefault()
    const modalId = event.currentTarget.getAttribute('href')
    const modal = document.querySelector(modalId)
    modal.style.display = "flex"
    modal.removeAttribute('aria-hidden')
    modal.setAttribute('aria-modal', 'true')
    modal.addEventListener('click', closeModal)
    modal.querySelector('.js-close-modal').addEventListener('click', closeModal)
    modal.querySelector('.js-modal-stop').addEventListener('click', stopPropagation)
    modals.push(modal) // Ajouter le modal à la liste des modals ouverts
}

const closeModal = function (event) {
    event.preventDefault()
    const modal = modals.pop() // Récupérer le dernier modal ouvert
    if (modal) {
      if (modal === null) return
      event.preventDefault()
      window.setTimeout(function (){
          modal.style.display = "none"
          modal = null
      }, 500)
        modal.setAttribute('aria-hidden', 'true')
        modal.removeAttribute('aria-modal')
        modal.removeEventListener('click', closeModal)
        modal.querySelector('.js-close-modal').removeEventListener('click', closeModal)
        modal.querySelector('.js-modal-stop').removeEventListener('click', stopPropagation)
    }
}

const stopPropagation = function(event) {
    event.stopPropagation()
}

const focusInModal = function(event) {
    event.preventDefault()
}

document.querySelectorAll('.js-modal').forEach(a => {
    a.addEventListener('click', openModal)
})

window.addEventListener('keydown', function (event) {
    if (event.key === "Escape" || event.key === "Esc") {
        closeModal(event)
    }
    if (event.key === 'Tab' && modals.length > 0) {
        focusInModal(event)
    }
})
