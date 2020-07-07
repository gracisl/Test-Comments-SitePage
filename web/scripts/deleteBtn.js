
function funcSuccessDelete(response)
    {
        console.log(response);
        var divDeleteID = '#'+ response;
        $(divDeleteID).hide();
    }

document.addEventListener('click',function(event)
{
    let id = event.target.dataset.buttonId;
    if(!id) return;
    alert("Функция запущена");
    console.log("Кнопка работает");
        $.ajax({
        url: '/deleteData.php',
        type: 'POST',
        data: ({ number: id}),
        dataType: "html",
        success: funcSuccessDelete,
        error: function()
            {
            alert('Error!');
            }
        })
    console.log("Что-нибудь");
    return false;
});