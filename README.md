### Simple Contact Form with Vue and Laravel API

**Objective:** Create a basic contact form with frontend validation and backend processing.

1. **Front-End (Vue.js):**
   - Create a simple contact form with fields: Name, Email, Subject, and Message.
   - Implement client-side validation using Vue.js (e.g., required fields, valid email format).
   - On form submission, send the data to a Laravel backend API.
   - For styling please use TailwindCSS.

2. **Back-End (Laravel):**
   - Create a single API endpoint in Laravel to receive the contact form data.
   - Validate the data on the server-side (e.g., required fields, valid email).
   - Store the submitted data in a database (create a `contacts` table with appropriate fields).
   - Send an email to Mailhog Docker container.
   - Return a JSON response indicating success or failure.
   - Write a test for the endpoint.

3. **Dockerization:**
   - Provide a basic `Dockerfile` and `docker-compose.yml` to run the Laravel application in a Docker container.
   - The Docker setup should include the Laravel application and a MySQL database.
   - Also include Mailhog container to act as the inbox.

4. **Documentation:**
	- Provide a `README.md` in your repository
	- Give clear instructions on how to use your repository.

**Evaluation Criteria:**
- Clean and efficient Vue.js code for form handling and validation.
- Proper API design and server-side validation in Laravel.
- Design and logic of the test case in Laravel.
- Basic understanding of Docker for setting up a development environment.
- Well written documentation.