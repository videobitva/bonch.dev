

$('.login').on('click', function(event) {
    event.preventDefault();
    var id = 1;
    $.ajax({
        url: '/api/login',
        data: {login:"videobitva@mail.ru", password:"endurance"},
        type: 'POST',
        success: function(){
            alert('Login Successful')
        },
        error: function() {
            alert('Error while POST method to the route /api/login')
        }
    });
});

$('.add_to_cart').on('click',  function (event) {
   event.preventDefault();
   var id = 1;
    $.ajax({
        url: '/api/order/add',
        data: {id:id},
        type:'GET',
        success: function(){
            alert('Success')
        },
        error: function() {
            alert('Error while GET method to the route /api/order/add')
        }
    });
});