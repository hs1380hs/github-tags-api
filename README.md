# **GitHub Starred Repositories with Tags API**

This project is a simple JSON-based API built with Laravel that allows users to manage their GitHub starred repositories by adding tags for better categorization and searching.

---

## **Features**
1. **Fetch Starred Repositories**: Retrieve a GitHub user's starred repositories.
2. **Add Tags**: Add custom tags to starred repositories for better organization.
3. **Search Repositories**: Search starred repositories by tags.
4. **RESTful API**: Built with REST principles, providing a clean and consistent interface.
5. **Unit Testing**: Includes unit tests to ensure reliability.

---

## **Requirements**
To run this project, you need the following installed:
- PHP (>=8.1)
- Composer
- MySQL
- Laravel (>=10.x)
- Git
- A GitHub Personal Access Token (for API requests)

---

## **Installation**
Follow these steps to set up the project locally:

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/github-tags-api.git
cd github-tags-api
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Set Up Environment Variables
Copy the `.env.example` file to `.env`:
```bash
cp .env.example .env
```
Edit `.env` to configure your database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=github_tags_api
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

Add your GitHub Personal Access Token (for API requests):
```env
GITHUB_TOKEN=your_github_personal_access_token
```

### 4. Run Migrations
Create the database and run the migrations:
```bash
php artisan migrate
```

### 5. Start the Development Server
```bash
php artisan serve
```

The API will be available at `http://127.0.0.1:8000`.

---

## **API Endpoints**

### **1. Fetch Starred Repositories**
**POST** `/api/repositories/sync`

Fetches and syncs starred repositories for a given GitHub username.

**Request Body:**
```json
{
  "username": "octocat"
}
```

**Response:**
```json
{
  "message": "Repositories synced successfully"
}
```

---

### **2. Add Tags to Repository**
**POST** `/api/repositories/{repositoryId}/tags`

Adds a tag to a repository.

**Request Body:**
```json
{
  "name": "javascript"
}
```

**Response:**
```json
{
  "message": "Tag added successfully"
}
```

---

### **3. Remove Tag from Repository**
**DELETE** `/api/repositories/{repositoryId}/tags/{tagId}`

Removes a tag from a repository.

**Response:**
```json
{
  "message": "Tag removed successfully"
}
```

---

### **4. Search Repositories by Tag**
**GET** `/api/repositories/search?tag=javascript`

Searches for repositories tagged with a specific keyword.

**Response:**
```json
[
  {
    "id": 1,
    "github_id": 123456,
    "name": "react",
    "description": "A library for building UI",
    "url": "https://github.com/facebook/react",
    "language": "JavaScript"
  }
]
```

---

## **Testing**
Run the test suite using:
```bash
php artisan test
```
Example test output:
```
PASS  Tests\Feature\RepositoryTest
✓ Fetch starred repositories
✓ Add tag to a repository
✓ Search repositories by tag
```

---

## **Deployment**
1. Configure a cloud Linux server with PHP, MySQL, Composer, and a web server (Nginx/Apache).
2. Clone this repository onto the server.
3. Set up environment variables in `.env`.
4. Configure your web server to point to the Laravel `public` directory.
5. Run migrations and start the application.

---

## **Technologies Used**
- Laravel Framework
- MySQL Database
- GitHub REST API
- PHPUnit for Testing

---

## **Future Improvements**
- Add authentication for API requests.
- Implement pagination for repositories.
- Cache GitHub API responses to reduce API calls.
- Deploy using Docker for easier scalability.

---

## **License**
This project is licensed under the MIT License.
