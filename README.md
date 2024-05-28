# Job Board Application

## Description

The **Job Board Application** is a web-based platform designed to facilitate connections between job seekers and employers. It offers an intuitive interface for job seekers to browse job listings, apply for jobs, and track their applications. Employers can create job listings, manage applicants, and monitor the progress of applications.

## Features

### Job Listings

-   Browse a catalog of job listings with various filters.
-   Search for specific job positions.
-   Apply for jobs directly from the job listing page.

### Job Application Management

-   Create and manage job applications.
-   Track the status of job applications.
-   Receive email notifications for job application updates.

### Employer Functionality

-   Create and manage job listings.
-   Manage applicants for each job listing.
-   Review and shortlist job applications.
-   Send messages to applicants.

## Technologies Used

-   **PHP**: The server-side scripting language used for web development.
-   **Laravel**: A popular PHP framework that provides a structured and opinionated approach to web development.
-   **Vite**: A build tool used for front-end development, integrated through the vite package in the `devDependencies` section of the `package.json` file.
-   **Tailwind CSS**: A utility-first CSS framework used for styling the web application, integrated through the tailwindcss package in the `devDependencies` section of the `package.json` file.
-   **Alpine.js**: A lightweight JavaScript framework used for building interactive web applications, included as a dependency in the `package.json` file.

## Getting Started

To get started with the Job Board Application, follow these steps:

1. **Clone the repository**:

    ```sh
    git clone https://github.com/AdrienDuval/job-board.git
    cd job-board-application
    ```

2. **Install dependencies**:

    ```sh
    composer install
    npm install
    ```

3. **Set up environment variables**:
   Copy the `.env.example` file to `.env` and update the necessary configurations.

    ```sh
    cp .env.example .env
    ```

4. **Run migrations**:

    ```sh
    php artisan migrate
    ```

5. **Start the development server**:
    ```sh
    php artisan serve
    npm run dev
    ```

## Contributing

Contributions are welcome! Please read the [contributing guidelines](CONTRIBUTING.md) for details on the process of submitting pull requests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more information.
