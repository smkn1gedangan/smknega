# step by step installation in web server ubuntu (cara installasi di web server ubuntu)

## requirement / dibutuhkan

- php8.3 php8.3-cli php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-mysql
- nginx unzip curl composer mysql-server nodejs npm git .

## can be used when the IP address configuration has been completed (requirement)
## installation / instalasi

- **sudo su** for super user
- **apt update**
- **apt install php8.3 php8.3-cli php8.3-mbstring php8.3-xml php8.3-bcmath php8.3-curl php8.3-zip php8.3-mysql unzip curl** (for install php and exstension requirement)
- **apt install nginx** (for install web server)
- **apt install mysql-server** (for install dbms)
- **curl -sS https://getcomposer.org/installer | php** (for install composer)
- **mv composer.phar /usr/bin/composer** (for move composer)
- **composer --version** (for get a version composer) 
- **curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.5/install.sh | bash** (for install nvm)
- **source ~/.bashrc** if error use **source ~/.zshrc**
- **nvm install 22** (for install nodejs versi 22 )
- **node --version** (for get a version nodejs)
- **nvm use 22** (for using node version 22)
- **apt install npm** (for installation npm)
- **npm --version** (for get a version npm)

## configuration mysql

- **mysql -u root -p**
- **create database smknega** (name database optional)(for create a new database)
- **create user "name_user"@"localhost" indentified by "pass_user"** (for a create new user)
- **grant all privileges on *.* "name_user"@"localhost"** (to allow a user)
- **exit**
- **systemctl restart mysql** (for restart mysql)
- if you will try a new user , try logging into mysql with the newest user


## configurasi web

- **cd /var/www/html** (go to the directory html)
- **git clone https://github.com/smkn1gedangan/smknega.git** (for clone a new project)(if git not installed yet , install git with command *apt install git*)
- **chown wwww-data:www-data smknega** (for change file owner)
- **cd smknega** (for go to new directory)

## Make sure it's in the smknega folder 

- **cp .env-example .env** (for copy env.example to env)
- **nano .env**
- ![.env](./github/konfigurasi%20env.png)
- ![.env](./github/env%202.png)

## type the command below correctly

- **chmod -R 775 storage bootstrap/cache** (for access permissions for a file)
- **php artisan key:generate** (for new key website)
- **composer install** (for installing dependency composer)
- **npm install** (for installing node_module)
- **npm run build**
- **php artisan migrate:fresh --seed** (for migrate all table to database smknega)


- open in browser ip public web server


## configuration nginx

- ![etc/nginx/sites-avaible/default](./github/konfigurasi%20nginx.png)
- **nginx -t** Make sure there are no errors in the root directory and configuration code (pastikan tidak ada yang error untuk root directory dan konfigurasi lainnya)
- **systemctl restart nginx**

## Developers

If that command not successfull , Double-check the command you ran earlier 

