This project presents a variant of the comment system integrated into various models 
of any Laravel framework project.<br/>
The goal is to implement a simple content commenting system.<br/>
Entities: News, Post, User, Comment.<br/>
Comments can be replied to – this is considered a separate comment, as is replying to a 
comment on a comment, etc.<br/>
API: Creating/reading posts and news. <br/>
CRUD comments on behalf of the user to a post/news/comment.<br/>
Requirements: PHP 8.2+, Laravel 11+, MySQL 8+.<br/>

The working project is hosted on [Laravel-Comments](https://laravel-comments.saviv.site) <br/>
You can change all the entities by Postman on [Laravel-Comments](https://laravel-comments.saviv.site/api/)<br/>

Setup:

* ``cp .env.example .env`` 
* ``composer install``
* ``npm install && npm run dev``
* ``php artisan key:generate``
* ``create db``
* ``import dump.sql to your local database.``
* ``php artisan serve``

See frontend at http://127.0.0.1:8000<br/>
API at http://127.0.0.1:8000/api

After login you get the access_token in response. Put it in the Bearer Authorization Token.

| Title                       | Method | Url                    | Params / Body                                           | Comment                          |
|-----------------------------|--------|------------------------|---------------------------------------------------------|----------------------------------|
| Login                       | POST   | /login                 | email<br/>password                                      | admin@gmail.com<br/>11111111     |
| Register                    | POST   | /register              | name<br/>email<br/>password<br/>password_confirmation   |                                  | 
| Get post <br/>with comments | GET    | /posts/{$postId}       |                                                         |                                  |
| Create new post             | POST   | /posts                 | title<br/>content                                       |                                  |
| Update post                 | PUT    | /posts/{$postId}       | title<br/>content                                       |                                  |
| Get news <br/>with comments | GET    | /news/{$newsId}        |                                                         |                                  |
| Create new news             | POST   | /news                  | title<br/>content                                       |                                  |                                  
| Update news                 | PUT    | /news/{$newsId}        | title<br/>content                                       |                                  |
| Get post comments           | GET    | /comments              | commentable_type<br/>commentable_id<br/>order_direction | post/news<br/>{$id}<br/>asc/desc |
| Create new comment          | POST   | /comments              | commentable_type<br/>commentable_id<br/>order_direction | post/news<br/>{$id}<br/>asc/desc | 
| Reply to comment            | POST   | /comments/{$commentId} | text                                                    |                                  |                                  
| Get comment                 | GET    | /comments/{$commentId} |                                                         |                                  |
| Update comment              | PUT    | /comments              | text                                                    |                                  |
| Delete comment              | DELETE | /comments/{$commentId} |                                                         |                                  | 

**Project is ready to upgrade (votes, events, preprocessing, etc.)**



