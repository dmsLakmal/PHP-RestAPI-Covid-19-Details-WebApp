# COVID-19 Country Details Web App

![Screenshot 2024-06-06 120404-min](https://github.com/dmsLakmal/PHP-RestAPI-Covid-19-Details-WebApp/assets/143265507/6e1afb0b-54d8-40fa-8089-00ee8cfa1640)


This web application fetches and displays information about countries and cities related to COVID-19 using various APIs. It provides details such as population, 
total COVID-19 cases, total deaths, tests conducted, and more.

## Prerequisites

Before running the application, ensure you have the following:

  - Web server environment (e.g., XAMPP, WAMP, LAMP) set up on your local machine.
  - PHP installed and configured.
  - Access to the internet to fetch data from external APIs.

# Setup
  01. Clone this repository to your local machine:
       ```git clone https://github.com/your-username/covid-details-web-app.git```
  02. Place the cloned folder in your web server's document root directory (e.g., htdocs for XAMPP).
  03. Start your web server and make sure it's running.
  04. Open a web browser and navigate to `http://localhost/covid-details-web-app/home.php` to access the home page of the application.

# Usage
  - Home: Displays general COVID-19 information and navigation links.
  - Country & City: Allows searching for country details and provides links to view city information.
  - Europe: Displays COVID-19 statistics for European countries.
  - Covid Chart: Displays a bar chart showing COVID-19 cases in European countries.
  - Covid Global Info: Shows global COVID-19 information fetched from an external API.

# Technologies Used
  - HTML/CSS/JavaScript: Frontend development.
  - PHP: Backend server-side scripting.
  - Bootstrap: Frontend framework for styling and layout.
  - jQuery: JavaScript library for simplified DOM manipulation and AJAX requests.
  - Google Charts: For visualizing data in charts.
  - cURL: For making HTTP requests to external APIs

# External APIs Used

This project utilizes the following external APIs to gather data related to COVID-19 statistics, country information, and city & state search:

1. **COVID-19 Statistics**
   - **API Name:** covid-193 API
   - **Description:** Provides up-to-date statistics on COVID-19 cases, deaths, and tests conducted worldwide.
   - **API Documentation:** [covid-193 API Documentation](https://rapidapi.com/api-sports/api/covid-193)

2. **Country Information**
   - **API Name:** Rest Countries API
   - **Description:** Offers comprehensive information about countries, including details such as population, capital city, currency, and more.
   - **API Documentation:** [Rest Countries API Documentation](https://restcountries.com/)

3. **City & State Search**
   - **API Name:** City and State Search API
   - **Description:** Enables searching for cities and states by name, providing details such as ID, state code, country name, and more.
   - **API Documentation:** [City and State Search API Documentation](https://rapidapi.com/user/larimarghe/api/city-and-state-search)

These APIs play a crucial role in fetching and displaying relevant data within the web application. They contribute to providing users with accurate and comprehensive information regarding COVID-19, countries, and cities, enhancing the overall functionality and user experience of the application.
