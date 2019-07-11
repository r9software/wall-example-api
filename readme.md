# Wall-API

This is the **API** of the wall example 
Wall App is a website that allows users to register, login, and write on a wall.
Below are the minimum requirements.
-   Registration and Login: Anonymous users can create a new user and this new user receives a welcome email. New users can then log in.
-   Wall (authed): After logging in, a user can post messages on the site-wide wall, similar to a facebook wall except there is only 1 wall for the entire site.
-   Wall (guest): Guests as well as authed users can see all of the messages on the wall. 

## Laravel structure

The laravel structure, this API uses Passport to communicate with the clients
[https://laravel.com/docs/5.8/passport](https://laravel.com/docs/5.8/passport)

- /app/http/controllers. This folder contains the whole logic of the controllers in the app, 
- /app. Models are located in the root of app folder
- /config. All configurations can be located here
- /routes/api.php routes for this API


### Example of login response
````
{"success":{"token":"","name":"Francisco"}}
````
### Example of login response

````
{
    "success": {
        "token": "thetoken"
    }
}
````
### Example for wall list response

````
{
    "success": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "user_id": 3,
                "wall_content": "1212asadsasd",
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 2,
                "user_id": 5,
                "wall_content": "asadasdasdas",
                "created_at": null,
                "updated_at": null
            },
            {
                "id": 3,
                "user_id": 1,
                "wall_content": "12345wallcontent",
                "created_at": "2019-07-11 03:23:44",
                "updated_at": "2019-07-11 03:23:44"
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/wall?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/wall?page=1",
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/wall",
        "per_page": 25,
        "prev_page_url": null,
        "to": 3,
        "total": 3
    }
}
````


Once the user has succesfully logged in the token should be included in the call as Authorization with value of "Bearer the-token" where **the-token** is the actual token