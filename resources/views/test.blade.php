
<style>
    .button{
        color: #2f33ff;
        width: 100px;
        height: 100px;
    }
    .post{
        color:#ffffff;
        width:100px;
        height:25px;
    }
</style>

<html>
<table>
        <td>
            <form method="post" action="/api/login">
                <input type=text" name="email" value="videobitva@mail.ru">
                <input type="text" name="password" value="endurance">
                <input type="submit" value = "Submit login" class = "button">
            </form>
        </td>

        <td>
            <form method="get" action="/api/order/add">
                <input type="hidden" name="token" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU0NDA5Nzg2NSwiZXhwIjoxNTQ0MTAxNDY1LCJuYmYiOjE1NDQwOTc4NjUsImp0aSI6IlhLbVZGVmVRQzloMVE4S0giLCJzdWIiOjEsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.qIz-UOEHTcjZcj4j51Q2Q2MyQsdQa1xbuWYvPbMrUAo" />
                <input type="text" name="id">
                <input type="submit" value = "Submit id">
            </form>
        </td>

</table>


</html>