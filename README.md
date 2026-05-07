# Aplikasi Todo Laravel

## Deskripsi
Aplikasi ini adalah web sederhana untuk manajemen tugas (todo list) berbasis Laravel.  
Setiap user bisa login, bikin task, lihat task sendiri, edit, hapus, dan cari task.

Data setiap user dipisah jadi masing-masing akun, jadi aman dan tidak saling lihat task user lain.

Project ini dibuat untuk belajar Laravel dasar sampai menengah (auth + CRUD + relasi).

---

## Fitur

### Authentication
- Register akun
- Login
- Logout
- Session user

### Todo / Task
- Tambah task
- Lihat daftar task
- Edit task
- Hapus task
- Task hanya milik user yang login

### Fitur tambahan
- Search task
- Pagination (10 data per halaman)
- Validasi form

## Relasi Database
- User memiliki banyak Todo (hasMany)
- Todo dimiliki oleh satu User (belongsTo)
---

## Tech Stack
- Laravel
- PHP
- MySQL
- Blade
- Bootstrap

---

## Struktur Singkat

- UserController → login, register, logout
- TodoController → CRUD task
- User Model → punya banyak todo
- Todo Model → milik user

---

## Database

### users
- id
- name
- email
- password

### todos
- id
- task
- is_completed
- user_id
- created_at
- updated_at

Relasi:
User punya banyak Todo
