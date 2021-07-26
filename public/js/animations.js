// FORM ANIMATION
const form = document.querySelector('div.createTask')

const openWindow = document.querySelector('.openWindow button')
openWindow.addEventListener('click', () => {
    form.style.opacity = 1
    form.style.transform = 'translate(-7px, 0px)'
})

const closeWindow = document.querySelector('.closeWindow button')
closeWindow.addEventListener ('click', () => {
    form.style.transform = 'translate(248px, 0px)'
    form.style.opacity = 0
})