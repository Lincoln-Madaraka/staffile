# Staffile Payroll Management App

Staffile is a simple web-based application built with Laravel and Livewire that helps organizations manage their employees and automate payroll processing.

The system allows administrators to manage employee records, assign salaries, and generate payroll with automatic statutory deductions including SHIF, Housing Levy, and PAYE (30%)

## Features

- *Employee Management*
Add, edit, view, and delete employee records. Each employee is uniquely managed with personal and contact information.

- *Salary Assignment*
Assign a gross salary to each employee. The system ensures an employee can only have one salary assigned at a time.

- *Statutory Deductions*
Automatically deduct:
   * SHIF: Fixed amount (e.g. 500)
   * Housing Levy: Fixed amount (e.g. 500)
   * PAYE: 30% of the gross salary
These deductions are subtracted from the gross salary to compute the net salary.

- *Payroll Generation*
Generate payroll records for employees showing gross salary, each deduction, and net salary. This ensures clarity and compliance with statutory requirements.

- *Download Payslip*
The Admin is able to view an employees payslip and download. The employee can download their payslip.
- *Livewire-Powered Interface*
Built using Laravel Livewire for a smooth, interactive user experience with real-time updates.



## Installation

To install and run the Staffile App locally, follow these steps:

1. Clone the project
2. Go to the project root directory and run `composer install` and `npm install`
3. Create `.env` file and copy content from `.env.example`
4. Run `php artisan key:generate` from terminal
5. Change database information in `.env`
6. Run migrations by executing `php artisan migrate` , Then Run  `php artisan db:seed` if you want use faker database records,
7. Start the project by running `php artisan serve` then `npm run dev`

8. Access the application in your web browser at `http://localhost:8000/admin`, with this credentials

````
test@example.com
password
````
## About Me
*Reach Out To Me btw!!*
I am a Fullstack Developer with 1+ year of experience in fullstack web and app development, my expertise lies in NextJs, Django Flask and PHP Laravel. Strong foundation in creating efficient and scalable web solutions. Skills include Python
Laravel, PHP, TailwindCSS, and Livewire. Enjoy working with MySQL databases and REST APIs.
Dedication to producing clean, well-documented code and sharing knowledge with others is
essential. Committed to continuous learning and improvement to grow as a developer.

- [My Portfolio](https://lincoln-madaraka-portfolio.vercel.app/).
- [Twitter](https://x.com/syntaxrtx).



**Deploying**
Deployed on Render