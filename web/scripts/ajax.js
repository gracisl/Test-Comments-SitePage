

//Success функция успешного запроса на добавление записи

function funcSuccess(response)
{
   var divID = response.split('+')[0];
   var divData = response.split('+')[1];
   var newDiv = document.createElement('div');
   newDiv.id = divID;
   newDiv.innerHTML = divData;
   $("#NewComment").load(document.URL + " #NewComment > *");   
   alert("Запись добавлена");
   console.log(divID);
}

//Основной AJAX запрос

$(document).ready(function()
{
$('#comment-form').on('beforeSubmit', function(e){
    e.preventDefault();
    var data = $(this).serializeArray();
        $.ajax({
        url: '/sendData.php',
        type: 'POST',
        data: data,
        success: funcSuccess,
        error: function(){
            alert('Error!');
            }
        })
    return false;
    });
});