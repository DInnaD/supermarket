<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## is it like marketplace?

Ціль: створення додатку з метою зібрати всі відгуки по всім продуктам харчування. 
Parser? analitic data


Ролі: користувач, який може створювати продукти (додавати опис, писати опис та ціну), залишати відгуки по товару. 
admin
**
Реєстрація 
Реєстрацію проходять всі користувачі через соціальну мережу Facebook

func1Якщо на телефоні вже залогінений користувач, то людині пропонують
func2Якщо користувач не залогінений
**
mainPage: 
searchByName::front(Якщо клікнути на іконку пошуку, “виїжджає” інпут.
на блокі про продукт ми бачимо:)
filter::front(пошук, або відібрати по категоріям продукти)
collectionProduct
getAttribute minPrice
getAttributwe maxPrice
stars
comments_id
creator_id
countStarMakersId
------

name::назву продукту;
(float)virtual::середню оцінку в вигляді числа 
rate(float%Math+if(>=5stars), )::
int stars та кількості зафарбованих зірочок;
description::короткий опис (якщо при заповнені продукту він був введений);
image::фото продукту;
(float)vartual::та орієнтовну вартість від_____до______ (це необхідно вказувати, так як цінова політика в різних регіонах та магазинах може відрізнятися).
addProduct()RFOM Models/Product На цій сторінці також є плюсик, через який користувач може додати товар, якого немає в базі. 
-------
**
category->underCat
 Якщо в списку немає необхідної категорії чи підкатегорії її може додати сам користувач.
Категорії ми вибирати не можемо - можемо вибирати тільки підкатегорії. 

getCategory->load('underCategory')Після вибору підкатегорії  ми бачимо відповідні breadcrumbs.

**
Comments
Додавання продукту
Додавати продукту ми можемо здійснити через плюсик на головній сторінці, та також після сканування продукту, якщо він не був знайдений в базі. 
Для додавання продукту першим кроком є його сканування (задля того, щоб в системі не було дублів одного й того самого продукту).
Після успішного сканування автоматично переходимо на другий крок створення продукту (якщо продукт вже є в системі можна показувати поп ап з текстом “Даний продукт вже є в системі” й кнопка Переглянути).





Коментарі користувач може редагувати, але не видаляти.
**
Редагування вже існуючого продукту
Кожен користувач може вносити зміни у вже існуючий продукт, редагувати його:
змінити фото;
Назву продукту 
опис продукту
також користувач може змінити категорію продукту.


Вартість можна додати свою в коментарях та оцінці продукту 

**//
Користувач має додати 2 фото продукту - основний вигляд та склад 
Завантажте 2 фото продукту (основний вигляд та склад)
Деталі продукту 
На сторінці окремого продукту ми бачимо:
фото продукту;
назву;
опис продукту;
є можливість оцінити продукт (по кліку на зірочки, або на надпис “Напишіть відгук про продукт” переходимо на окрему сторінку);
відгуки (аватар того, хто залишив відгук, зірочки, дата (дата/ місяць / рік), сам коментар);
також у кожного користувача є можливість редагувати продукт.



Коментарі користувач може редагувати, але не видаляти.
Редагування вже існуючого продукту
Кожен користувач може вносити зміни у вже існуючий продукт, редагувати його:
змінити фото;
Назву продукту 
опис продукту
також користувач може змінити категорію продукту.

Вартість можна додати свою в коментарях та оцінці продукту 
Штрих-код
В магазині також можливо знайти товар по штрих коду просто відсканувавши продукт

Якщо при скануванні продукту, продукт не знайшовся, користувачеві буде запропоновано додати продукт до бази самостійно.
Налаштування
В налаштуваннях користувач може бачити:
Переглянуті ним продукти раніше
свій профіль
змінити мову додатку

Переглянуті продукти
Сторінка за функціоналом така ж як і сторінка з продуктами. Користувач може переглянути всі товари, які він коли- небудь переглядав, скористатися пошуком та фільтром по категоріям. Якщо користувач не захоче, щоб якийсь продукт відображався в списку переглянутих продуктів, він може натиснути “хрестик”.


Редагування профілю
Користувач може змінити своє фото, та завантажити з телефону. Вказати інше прізвище та ім’я. Вийти з профілю.



Змінити мову