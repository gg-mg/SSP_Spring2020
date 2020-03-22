# login2.php

is the application file that has clues on what was intended in SSP06.php

I found out how to access the database on 3/21/2020, two weeks after i submitted the assignment to 
FileZilla submission forum (OCCC).


It is importtant to note 

action "." refers to index.php

action "" refers to current page

action "#" refers to current page 

## What is Wrong and What is Right

if(is_valid_admin_login($email, $password)) is wrong

if($email && $password) is right


## login success

after changing view/login.php, the application renders as described in the book and echos the login email and the password which indicates that the visit to the database was successful.