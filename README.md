# step by step installation in web server ubuntu (cara installasi di web server ubuntu)

## requirement / dibutuhkan

- php8.3 php8.3-cli php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-mysql
- nginx unzip curl composer mysql-server nodejs npm git .

## can be used when the IP address configuration has been completed (requirement)
## installation / instalasi

- for super user
**sudo su** 
- **apt update**

- for install php and exstension requirement
**apt install php8.3 php8.3-cli php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-mysql unzip curl** 

- for install web server
**apt install nginx** 

- for install dbms
**apt install mysql-server** 

- for install composer
**curl -sS https://getcomposer.org/installer | php** 

- for move composer
**mv composer.phar /usr/bin/composer** 

- for get a version composer
**composer --version**  

- for install nvm
**curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash** 
**source ~/.bashrc** if error use **source ~/.zshrc**

- for install nodejs versi 22
**nvm install 22** 

- for get a version nodejs
**node --version**

- for using node version 22
**nvm use 22** 

- for installation npm
**apt install npm** 

- for get a version npm
**npm --version** 

## configuration mysql

**mysql -u root -p**

- for create a new database (name database optional) 
**create database smknega** 

- for a create new user
**create user "name_user"@"localhost" indentified by "pass_user"** 

- to allow a user
**grant all privileges on *.* "name_user"@"localhost"** 
**exit**

- for restart mysql
**systemctl restart mysql** 
- if you will try a new user , try logging into mysql with the newest user


## configurasi web

- go to the directory html
**cd /var/www/html** 

- for clone a new project
**git clone https://github.com/smkn1gedangan/smknega.git** 
- if git not installed yet , install git with command *apt install git*

- for change file owner
**chown wwww-data:www-data smknega** 

- for go to new directory
**cd smknega** 

## Make sure it's in the smknega folder 

- for copy env.example to env
**cp .env-example .env** 
**nano .env**

- must be the same
- ![.env](./github/env1.png)

- match it with your mysql configuration
- ![.env](./github/env2.png)

- must be the same
- ![.env](./github/env3.png)

## if config .env have been completed type the command below correctly

- for access permissions for a file
**chmod -R 775 storage bootstrap/cache** 

- for new key website
**php artisan key:generate** 

- for installing dependency composer
**composer install** 

- for installing node_module
**npm install** 
**npm run build**

- for migrate all table to database smknega (database name depends on config in the .env)
**php artisan migrate:fresh --seed** 

## configuration nginx

- ![etc/nginx/sites-avaible/default](./github/konfigurasi%20nginx.png)

- Make sure there are no errors in the root directory and configuration code (pastikan tidak ada yang error untuk root directory dan konfigurasi lainnya)
**nginx -t** 

**systemctl restart nginx**

- open in browser ip public web server

## Developers

If that command not successfull , Double-check the command you ran earlier 

