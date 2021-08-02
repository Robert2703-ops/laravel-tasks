const eyeButtons = document.querySelectorAll("div.icon button")

for ( let index = 0; index  < eyeButtons.length; index += 1 )
{
    eyeButtons[index].addEventListener('click', () => {
        //changing the input´s type
        eyeButtons[index].parentElement.firstElementChild.type = "text"

        const newButton = document.createElement('button')
        newButton.setAttribute('type', "button")

        const newEye = document.createElement('i')
        newEye.setAttribute('class', 'far fa-eye')

        newButton.appendChild(newEye)

        eyeButtons[index].replaceWith(newButton)

        newButton.addEventListener('click', () => {
            newButton.parentElement.firstElementChild.type = "password"

            newButton.replaceWith(eyeButtons[index])
        })
    })
}