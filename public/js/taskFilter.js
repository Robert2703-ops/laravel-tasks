var changetable = document.querySelectorAll('#tasks tbody')
const table = document.querySelectorAll("#tasks tbody")

const buttonTask = document.querySelectorAll('.buttonTask')

for ( let index = 0; index < buttonTask.length; index += 1 )
{
    const element = buttonTask[index]
    if ( element == undefined )
    {
        continue
    }
    else
    {
        element.addEventListener('click', taskFilter(element, table))
    }
}

function taskFilter (element)
{
    let row = document.querySelectorAll('#tasks tbody tr')
    let thead = document.querySelector('#tasks thead tr')

    if ( element == undefined )
    {
        console.log("ok ok")
    }

    else
    {
        element.addEventListener('click', () => 
        {
            if ( element.value == "all" )
            {
                body = nodeList(row, 'tbody')
                document.querySelector("#tasks tbody").replaceWith(body)
                document.querySelector('#taskTable h3').innerText = "All tasks"
            }

            else
            {               
                let text = element.innerText
                let elements = document.createElement('tbody')
                
                for ( let index = 0; index < row.length; index += 1 )
                {
                    if ( element.value == row[index].className )
                    {
                        elements.appendChild(row[index])
                    }
                }
                document.querySelector("#tasks tbody").replaceWith(elements)
                document.querySelector('#tasks thead tr').replaceWith(thead)  
                document.querySelector('#taskTable h3').innerText = text
            }
        })
    }
}

function nodeList(nodeList, tag)
{
    var body = document.createElement(tag)

    for (let index = 0; index < nodeList.length; index += 1)
    {
        body.appendChild(nodeList[index])
    }
    return body
}
