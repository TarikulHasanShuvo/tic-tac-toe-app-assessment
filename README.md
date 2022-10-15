## Tic Tac Teo App Installation

### Clone the repository

    git clone https://github.com/TarikulHasanShuvo/tic-tac-toe-app-assessment.git

### Switch to the repo folder

    cd tic-tac-toe-app-assessment

### Install all the dependencies using composer

    composer install

### Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

### Generate a new application key & Optimize clear

    php artisan key:generate
    php artisan optimize:clear


### Database configuration

    DB_DATABASE=your_database_name
    DB_USERNAME=your_user_name
    DB_PASSWORD=your_password


### For Create table

    php artisan migrate 


### Start the local development server

    php artisan serve


## For Frontend Installation


### Install all the dependencies using npm

    npm install

### Start the local development server

    npm run dev
