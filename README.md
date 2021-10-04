# Restful-api

For the test of api: 

  1. Download api.
  2. run composer install
  3. redirect all requests to public/index.php
  4. Api does not have any authintication or authorization. 


Costumers routes: 
  1. For the recieve all responses send get request {url}/costumer/
  2. For the recieve only one user send get request {url}/costumer/id=1  (search by user id)
  3. For the reason of  update user send put request {url}/costumer/update/?id=1 {search by user id)
  4. For the reason of Delete user send delete request {url}/costumer/delete/?id=1  (search by user id)

Pay attention when you will send request header must be contain Accept : application/json.

For the testing I used nginx server. but hopefully it will work as well on apache web server too.

or for the reason easy testing you can use php server php -S 127.0.0.1:8080 -t public

If you have any questions I am open to answer any of them.
  
