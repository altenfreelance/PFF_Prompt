Hi Ian,

This web application is pretty simple and straight foward. The only thing that needs to be done is to import the pff.sql file into your version
of mySQL. Other than that make sure your database.php file connection paramters are set up properly in "./api/config/database.php".

(I.E)
private $host   = "localhost";
private $db_name = "pff";
private $username = "root";
private $password = "";

I was running my localhost on XAMPP using Apache.

Other than that let me know if you have any trouble. 

Andrew