# Laravel 12 Modular CRUD Generator 🏗️

A fully structured, scalable, reusable and enterprise-ready Laravel architecture to bootstrap modules with:

- ✅ Service Layer
- ✅ Repository Layer
- ✅ DTO Layer
- ✅ Request Validation
- ✅ Admin Controllers (With Blade Views)
- ✅ Migrations, Models, Routes, Views
- ✅ Modular CRUD generation with Artisan Command

---

## 📦 Folder Structure

app/
DTOs/
Interfaces/
Repositories/
Services/
Http/
Requests/
Controllers/
Admin/
Models/
resources/views/admin/
database/migrations/

yaml
Copy
Edit

---

## 🚀 Usage Guide

### 1️⃣ Generate New Module

```bash
php artisan make:module ModuleName
Example:

bash
Copy
Edit
php artisan make:module Product
This will automatically create:

Repository, Interface, Service, DTO

Request validation

Controller (Admin)

Model

Migration

Blade views (index, create, edit, show)

🧮 How Architecture Works
Layer	Responsibility
Controller	Receives validated data via Request + DTO
Request	Handles form validation
DTO	Transforms validated data
Service	Business logic layer
Repository	Data access layer
Model	Eloquent ORM
Views	Admin Blade Templates

🧰 Example Flow
Controller:
php
Copy
Edit
public function store(ProductRequest $request)
{
    $dto = ProductDTO::fromRequest($request);
    $this->service->create($dto);
}
Service:
php
Copy
Edit
public function create(ProductDTO $dto)
{
    return $this->repository->create($dto->toArray());
}
Repository:
php
Copy
Edit
public function create(array $data)
{
    return $this->model->create($data);
}
📄 Stubs Structure
The module generator uses stub files:

stubs/repository.stub

stubs/service.stub

stubs/interface.stub

stubs/request.stub

stubs/controller.stub

stubs/dto.stub

stubs/model.stub

stubs/migration.stub

stubs/views/index.stub

stubs/views/create.stub

stubs/views/edit.stub

stubs/views/show.stub

🔒 Security & Clean Code
No dirty $request->all() passing directly.

DTO layer handles data sanitization.

Each layer has single responsibility.

Easy unit testing of every layer.

Clean separation between HTTP layer & business logic.

👨‍💻 Contribution (Optional)
Add dynamic field-based generation.

Auto generate migrations, fillables, rules & DTO properties.

Add Role & Permission management support.

API Version also possible with same architecture.

🔥 Future Improvements (Roadmap)
Dynamic field generator support

Full REST API generator with Passport/Sanctum

Unit Tests generation

Event & Listener generator

Notification support

Role & Permission integration

OpenAPI/Swagger generator for API docs

❤️ Credits
Developed with ❤️ by Mustajab Ahmed
