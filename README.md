# Excel to JSON

A simple Laravel app to upload Excel files, preview the data, copy it as text, view JSON, and send via email.

## Features

- Upload `.xlsx`, `.xls`, or `.csv` files.
- Preview the Excel data in a table.
- Copy table data as text to clipboard.
- View the uploaded data as JSON.
- Send the data via email (requires email configuration).

## Installation & Usage

```bash
# Clone the repository
git clone https://github.com/reymero/excel-to-json.git

# Navigate into the project folder
cd excel-to-json

# Install PHP dependencies
composer install

# Install Node dependencies
npm install
npm run dev

# Copy the environment file
cp .env.example .env

# Generate an application key
php artisan key:generate

# Run the app (if using Herd or local server)
php artisan serve

# Open your browser and navigate to /upload
# Then upload an Excel file, preview or copy the data, view JSON, or send via email
