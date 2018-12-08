<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Bonch.Dev Project by group 4

API Routes are set in the /routes/api.php

. Registration
* URL: /api/register
* Data: {name:"Name", email:"example@email.com", password:"password"}
* Type: Post

Note: After doing this user gets Email for account verification. Until it's not done he wouldn't be able to log in.


. Logging in
* URL: /api/login
* Data: {login:"example@email.com",password:"password"}
* Type: Post

Note: This will return you JSON response with info about success/fail, and in case of success token for passing through the JWT Authentication.

