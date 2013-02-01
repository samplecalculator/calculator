## Download App

### Calculator App on GitHub

*	**GitHub Repo:**
	The full git repository is at: <https://github.com/samplecalculator/calculator>
	Get it using the following command:
		
		$git clone git://github.com/samplecalculator/calculator.git

## Install App

*	**Install App:**
	Move the whole application on your testing server for example:
		www/
			!Calculator Folder Here

*	**Install Database:**
	Open up PHPMyadmin,SQL console, etc, log in, and create a database{'choose a name'}
		CREATE DATABASE calculator_db
	
	Import Database file: {data.sql is located on calculator/private/application/models/database/}
		$mysql -u  username -p -h localhost calculator_db < data.sql
	
	Delete database folder once install on calculator/private/application/models

## Configure App

*	**App Configuration:**
	Head over to calculator folder
		calculator/private/application/config/config.php
	
	Scroll down until:
		$config['base_url']	= {'wwww/calculator'};  //change the value in brackets to your base path
		
	Head over to calculator folder
		calculator/private/application/config/database.php
	
	Scroll down until:
		// Change Default Settings to your settings
		$db['default']['hostname'] = 'localhost'; 
		$db['default']['username'] = 'root';
		$db['default']['password'] = '';
		$db['default']['database'] = 'calculator'; //name of the database you created
	
	Configure .htaccess:
		Open up calculator/.htaccess in an editor
		RewriteEngine On
		RewriteBase /   !chage it to your base path		

## Enjoy

*	**Fire Up your Server: **
	
	Got to your browser and type the url for the application
	
	You should see an image similar to this one
	
	[![calculator screenshot](https://github.com/samplecalculator/resources/images/calculator_default.png)]
	
	Sing up... You're ready to go.