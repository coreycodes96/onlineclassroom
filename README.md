# OnlineClass

Online Classroom is a mini project I created using Laravel and VueJS.

This mini project allows you to view classes that are available and join them. For example you can join an english class or a maths class or even a coding class.

The admin will be able to create classes and even delete them. Also the admin can handle the users by removing an account if necessary.

There is a middleware that was created to make sure the right user is on the right route.

---

Software I Used:
* Laravel
* VueJS
* Vuex

---


## How To Use OnlineClassroom.

1. Open A Command Line And Run

```CMS
php artisan serve

or

php artisan serve --host 127.0.0.1:8000 <<<<the url is just an example
```

---

2. Open A __Second__ Command Line And Run

```
npm run watch

or

npm run dev
```

---

3. Create A MYSQL database called "onlineclassroom"

---

4. Open A __Third__ Command Line and Run

```
php artisan migrate
```

---

5. Finally after the migration run

```
php artisan db:seed
```