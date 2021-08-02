function openModal (idModal) {
    const modal = document.getElementById(idModal)
    modal.classList.add('show')

    modal.addEventListener('click', (event) => {
        if ( event.target.id == idModal || event.target.className == "close" )
        {
            modal.classList.remove('show')
        }
    })
}

const buttonOpenModal = document.querySelector('div.create-task button')
buttonOpenModal.addEventListener('click', () => openModal('modal-create-task'))