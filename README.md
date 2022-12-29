Инстукция по установке.

1. Скопировать данный репозиторий
2. Нужен установленный докер
3. Выполнить комнаду "./vendor/bin/sail up -d" в папке с проектом 
4.  Выполнить комнаду "./vendor/bin/sail artisan migrate --seed"
5. http://localhost/login - Регистрация пользователя
6. Залогиниться по раннему пользователю отправив на http://localhost/api/login post запрос с "email" и "password"
получить токен
7. Bearer Token вставляем в постман, и отправляем запросы подобны http://localhost/api/category 

GET запрос получить все категории - http://localhost/api/category

GET запрос получить определенную категорюи ID 1 -  http://localhost/api/category/1 

POST запрос добавить Категорию  http://localhost/api/category

PUT запрос изменить Категорию с ID 1  http://localhost/api/category/1

DELETE запрос удалить Категорию с ID 1  http://localhost/api/category/1


Точно так же и с продуктам, просто вместо category - product


GET запрос получить все продукты - http://localhost/api/product





Route::get('category', 'App\Http\Controllers\Api\v1\CategoryController@category');

  
