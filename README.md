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
