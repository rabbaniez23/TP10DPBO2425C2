# 🏋️‍♂️ Gym Membership System (MVVM Architecture)

![PHP](https://img.shields.io/badge/Language-PHP_Native-777BB4?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/Database-MySQL-4479A1?style=for-the-badge&logo=mysql)
![Architecture](https://img.shields.io/badge/Architecture-MVVM-ff69b4?style=for-the-badge)
![Status](https://img.shields.io/badge/Status-Completed-success?style=for-the-badge)

> **Tugas Praktikum DPBO 2024/2025**
> Aplikasi manajemen data membership gym sederhana yang dibangun menggunakan pola arsitektur **Model-View-ViewModel (MVVM)** tanpa framework (Native PHP).

---

## 📋 Daftar Isi
- [Tentang Project](#-tentang-project)
- [Fitur Utama](#-fitur-utama)
- [Arsitektur & Desain](#-arsitektur--desain-mvvm)
- [Struktur Database](#-struktur-database)
- [Struktur Folder](#-struktur-folder)

---

## 📖 Tentang Project
Project ini bertujuan untuk mendemonstrasikan pemahaman tentang konsep **Pemrograman Berorientasi Objek (PBO)** dan arsitektur **MVVM** dalam pengembangan web. Aplikasi ini memungkinkan admin gym untuk mengelola data member, pelatih, jenis paket membership, dan mencatat transaksi pendaftaran.

Tampilan antarmuka didesain **modern dan responsif** menggunakan CSS custom dengan gaya dashboard profesional.

---

## ✨ Fitur Utama
Aplikasi ini memiliki kemampuan **CRUD (Create, Read, Update, Delete)** lengkap untuk semua entitas:

1.  **👥 Kelola Member**: Menambah, mengedit, dan menghapus data anggota gym.
2.  **🏋️ Kelola Pelatih**: Manajemen data trainer beserta keahliannya.
3.  **🏷️ Kelola Jenis Member**: Mengatur paket membership (contoh: Gold, Silver) dan harganya.
4.  **💸 Transaksi Pendaftaran**:
    * Mencatat pendaftaran member baru.
    * **Relasi Database**: Memilih Member, Paket, dan Pelatih menggunakan *Dropdown* (mengambil data dari tabel lain).
    * Otomatis mencatat tanggal transaksi.

---

## 🏗 Arsitektur & Desain (MVVM)
Project ini memisahkan logika kode menjadi 3 lapisan utama:

| Komponen | Deskripsi & Tugas |
| :--- | :--- |
| **Model** (`/models`) | **Data Layer**. Bertanggung jawab langsung untuk *query* ke database (SQL). Tidak peduli dengan tampilan. |
| **ViewModel** (`/viewmodels`) | **Logic Layer**. Menjadi perantara. Menerima request dari View, memproses logika (validasi/tombol submit), lalu meminta data ke Model. |
| **View** (`/views`) | **UI Layer**. Hanya berisi HTML/PHP untuk menampilkan data kepada user. Tidak boleh ada query SQL di sini. |

---

## 🗄 Struktur Database
Terdapat 4 Tabel dalam database `gym_db`:

1.  **`member`** (Master): Menyimpan data diri anggota.
2.  **`pelatih`** (Master): Menyimpan data instruktur.
3.  **`jenis_member`** (Master): Menyimpan kategori paket dan harga.
4.  **`transaksi`** (Relasi):
    * Menghubungkan `id_member`, `id_jenis`, dan `id_pelatih`.
    * Menggunakan **Foreign Key** dengan fitur `ON DELETE CASCADE`.

---

## 📂 Struktur Folder
Berikut adalah susunan folder project agar rapi dan mudah dipahami:

```text
TP10DPBO2425C/
├── config/
│   └── Database.php        # Koneksi ke MySQL
├── css/
│   └── style.css           # Styling tampilan (Dashboard UI)
├── database/
│   └── gym_db.sql          # File Import SQL
├── models/                 # [M] Menangani Query Database
│   ├── Member.php
│   ├── Pelatih.php
│   ├── JenisMember.php
│   └── Transaksi.php
├── viewmodels/             # [VM] Menangani Logika & Request
│   ├── MemberViewModel.php
│   ├── ...
├── views/                  # [V] Menangani Tampilan HTML
│   ├── member_list.php
│   ├── member_form.php
│   ├── ...
├── index.php               # Routing Utama (Entry Point)
└── README.md               # Dokumentasi Project

```
