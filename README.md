# step by step installation in web server ubuntu (cara installasi di web server ubuntu)

## requirement / dibutuhkan

- php8.3 php8.3-cli php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-mysql
- nginx unzip curl composer mysql-server nodejs npm git .

## can be used when the IP address configuration has been completed (requirement)
## installation / instalasi

###### For Superuser
- **sudo su** 
- **apt update**

###### For Install PHP and Exstension Requirement
- **apt install php8.3 php8.3-cli php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-mysql unzip curl** 

######  For Install Web Server
- **apt install nginx** 

######  For Install DBMS
- **apt install mysql-server** 

###### For Install Composer
- **curl  -sS  https://getcomposer.org/installer | php** 

###### For Move Composer
- **mv composer.phar /usr/bin/composer** 

###### For Get A Version Composer
- **composer --version**  

###### For Install Nvm
- **curl  -o-  https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash** 
- **source  ~/.bashrc** if error use **source  ~/.zshrc**

###### For Install Nodejs Version 22
- **nvm install 22** 

###### For Get a Version Nodejs
- **node  --version**

###### For Using Node Version 22
- **nvm use 22** 

###### For Installation NPM
- **apt install npm** 

###### For Get a Version NPM
- **npm  --version** 

## configuration mysql

- **mysql -u root -p**

###### For Create a New Database (name database optional) 
- **create database smknega** 

###### For Create a New User
- **create user "name_user"@"localhost" indentified by "pass_user"** 

###### To Allow a User
- grant all privileges on *.* "name_user"@"localhost" 
- **exit**

###### For Restart Mysql
- **systemctl restart mysql** 
- if you will try a new user , try logging into mysql with the newest user


## configurasi web

###### Go To the Directory Html
- **cd /var/www/html** 

###### For Clone a New Project
- **git clone https://github.com/smkn1gedangan/smknega.git** 
- if git not installed yet , install git with command *apt install git*

###### For Change File Owner
- **chown wwww-data:www-data smknega** 

###### For Go To New Directory
- **cd smknega** 

## Make sure it's in the smknega folder 

###### For Copy env.example To env
- **cp .env-example .env** 
- **nano .env**

- must be the same
- ![.env](./github/env1.png)

- match it with your mysql configuration
- ![.env](./github/env2.png)

- must be the same
- ![.env](./github/env3.png)

## if config .env have been completed type the command below correctly

###### For Access Permissions For a File
- **chmod -R 775 storage bootstrap/cache** 

###### For New Key Website
- **php artisan key:generate** 

###### For Installing Dependency Composer
- **composer install** 

###### For Installing Node_module
- **npm install** 
- **npm run build**

###### For Migrate All Table to Database Smknega (database name depends on config in the .env)
- **php artisan migrate:fresh --seed** 

## configuration nginx

- ![etc/nginx/sites-avaible/default](./github/konfigurasi%20nginx.png)

###### Make sure there are no errors in the root directory and configuration code (pastikan tidak ada yang error untuk root directory dan konfigurasi lainnya)
- **nginx -t** 

- **systemctl restart nginx**

- open in browser ip public web server

## Developers

If that command not successfull , Double-check the command you ran earlier 

