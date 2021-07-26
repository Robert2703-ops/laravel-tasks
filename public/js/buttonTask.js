const buttons = document.querySelectorAll("button.buttonTask")

for ( let index = 0; index < buttons.length; index += 1 )
{
    buttons[index].addEventListener('mouseenter', () => 
    {
        if (buttons[index].id == "alltask")
        {
            buttons[index].style.background = "rgb(39, 37, 37)"
            buttons[index].style.border = "1px solid white"
            buttons[index].style.color = "white"

            buttons[index].addEventListener('mouseout', () => {
                buttons[index].style.background = "white"
                buttons[index].style.border = "1px solid black"
                buttons[index].style.color = "black"
            })
        }

        else 
        {
            const backgroundColor = window.getComputedStyle(buttons[index]).backgroundColor

            buttons[index].style.border = `1px solid ${backgroundColor}`
            buttons[index].style.background = "white"

            buttons[index].addEventListener('mouseout', () => {
                buttons[index].style.background = backgroundColor
                buttons[index].style.border = "2px solid black"
            })   
        }
    })

    buttons[index].addEventListener('click', () => {

    })
}
