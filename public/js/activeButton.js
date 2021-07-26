const activeButton = document.querySelectorAll("button.active")
const allButtons = document.querySelectorAll("button.buttonTask")

for ( let index = 0; index < allButtons.length; index += 1 )
{


}

function active (button)
{

    const backgroudColor = window.getComputedStyle(button).backgroundColor

    button.style.backgroud = "white"
    button.style.border = `1px solid ${backgroudColor}`
}