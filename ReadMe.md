# Content Management System

Welcome to the Content Management System repository. This project focuses on the structure and functionality of the homepage (`index.php`) and how it leads to subpages. The project utilizes Bootstrap to create six types of templates, providing a dynamic and user-friendly experience.

## GitHub Repository
You can find the complete code and documentation in the GitHub repository: [Content Management System](https://github.com/Jdurairaj-hub/Content-Management-System).

## Pages Description

### index.php
- **Purpose**: The homepage of the website.
- **Features**: Custom title and navbar, optimized layout, and connected to the database.

### about.php
- **Purpose**: A page that details the site's origin and its founders.
- **Features**: Customized title and navbar, streamlined content for clarity and relevance.

### artists.php
- **Purpose**: A page showcasing all contributing artists.
- **Features**: Adapted from the about page, focused on displaying the team of artists with a clean and professional layout.

### collections_T.php
- **Purpose**: A page displaying art collections by theme.
- **Features**: Modified Bootstrap template, enhanced with additional blog cards, and dynamically linked to the `themes.csv` file for real-time theme display.

### signin.php
- **Purpose**: A user authentication page for sign-in and sign-up.
- **Features**: Simplified form, focusing on username and password inputs, connected to the database for secure authentication.

### aboutArtists.php
- **Purpose**: Provides detailed information about each artist.
- **Features**: Seamlessly linked with the `artists.php` page for detailed artist profiles and information.

## Database Integration
The system is integrated with a MySQL database named `artbyyou`, featuring the following tables:
- `artists`
- `about`
- `artwork`
- `themes`


## Setup Instructions

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Apache or any other web server
- Composer
- Node.js and npm
- MAMP (for easy setup)

### Installation Steps

#### Using MAMP

1. **Download and Install MAMP**
   - Download MAMP from [MAMP's official website](https://www.mamp.info/en/).
   - Install and run MAMP.

2. **Clone the repository**
    ```bash
    git clone https://github.com/Jdurairaj-hub/Content-Management-System.git
    cd Content-Management-System
    ```

3. **Move the project to MAMP's htdocs**
   - Move the cloned repository folder to the `htdocs` directory in your MAMP installation.

4. **Install PHP dependencies**
    ```bash
    composer install
    ```

5. **Install JavaScript dependencies**
    ```bash
    npm install
    ```

6. **Set up the database**
    - Open MAMP and start the servers.
    - Access phpMyAdmin via `http://localhost/phpmyadmin`.
    - Create a database named `artbyyou`.
    - Import the provided SQL file to create the necessary tables and data.
      ```bash
      mysql -u root -p artbyyou < database/artbyyou.sql
      ```

7. **Configure the environment**
    - Rename `.env.example` to `.env`.
    - Update the database credentials and other configurations in the `.env` file.

8. **Start the development server**
    - Ensure your MAMP servers are running.
    - Access the site at `http://localhost:8888/Content-Management-System`.

### Running the Application
- Navigate to `http://localhost:8888/Content-Management-System` in your web browser.
- Use the sign-in page to create an account and log in.
- Explore the various pages such as the homepage, about page, artists page, and collections page.
