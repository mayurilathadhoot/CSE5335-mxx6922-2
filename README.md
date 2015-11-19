# CSE5335-mxx6922-2
# CSE 5335- Project 2
#### Mayuri Latha mxx6922

##### What is your external data source used to populate your Heroku data sources?
The data was taken from http://www.omdbapi.com and then stored in a CSV file. The database is for a series "friends" where main coloums are imdbID, Title and ImbdRating. Only these three coloumns were sufficient to execute the task at hand.

##### What are the Heroku toolbelt commands to execute the scripts?
 - git init
 - heroku git:remote -a cse-mxx6922-2
 - git remote -v
 - git add .
 - git commit -m "First"
 - git push heroku master
 - heroku run php insertdata.php // To insert data
 - heroku run php BonusQuery1.php // To return data using primary key
 - heroku run php Query2.php // To return data using non primary key
 - heroku run php index.php // To retrieve complete set of data from database
 - heroku run bash// for both redis and mongodb execution
 
##### What aspect of the implementation did you find easy, if any, and why?
 inserting and retrieving data in postgres was easy when compared to the other two databases as there is lot of materials available online for postgres in php and it is easy to establish a connection in postgress using php as it doesnot require any extra libraries or extentions.

##### What aspect of the implementation did you find hard, if any, and why?
retrieving data from redis is quiet difficult as the format in which the data must be stored is quiet confusing. Although there is a lot of material available online, not one is in harmony with other. There were not many sources which explained how to establish connection to redis in php using windows and for the material available there were no steps of what to do after you clone predis, how to push proceed once the required repository is cloned in github. 
