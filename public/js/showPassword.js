const buttonList = document.querySelectorAll('div.elementVerification button')
const inputList = document.querySelectorAll('div.elementVerification input')

for ( let index = 0; index < buttonList.length; index += 1 )
{
    const button = buttonList[index]
    const input = inputList[index]

    button.addEventListener('click', () => {
        let div = document.querySelector('div.elementVerification')
        div.classList.remove('class', 'elementVerification')

        showPassword ( button, `div.${div.className}`,  input)
    })
}


function showPassword (element, elementPath, input)
{
    const imagePath = '/images/open_eye.png'
    let newDiv = change(imagePath)
    let newButton = createElement('button')
    newButton.type = 'button'
    newButton.appendChild(newDiv)

    document.querySelector(`${elementPath} button`).replaceWith(newButton)
    input.type = 'text'

    newButton.addEventListener('click', () => {
        document.querySelector(`${elementPath} button`).replaceWith(element)
        document.querySelector(`${elementPath}`).classList.add('class', 'elementVerification')

        input.type = 'password'
    })
}


function change (pathEye)
{
    let div = createElement('div')
    let image = changeImage(pathEye)

    div.appendChild(image)

    return div
}

function createElement (element)
{
    return document.createElement(element)
}

function changeImage (path)
{
    const image = createElement('img')
    image.src = path

    return image
}