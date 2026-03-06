# 📸 Galeria Obrazów z Panelem Administratora

Aplikacja webowa umożliwiająca przeglądanie galerii obrazów w podziale na kategorie oraz zarządzanie nimi przez panel administratora (dodawanie, edycję, usuwanie).

## 🛠️ Technologie

- **Frontend:** HTML, CSS, JavaScript
- **Backend:** PHP (proceduralny)
- **Baza danych:** MySQL
- **Serwer lokalny:** XAMPP

---

## 📁 Struktura aplikacji

### `index.php`
- Strona główna galerii
- Wyświetla wszystkie obrazy lub obrazy filtrowane wg kategorii
- Kategorie: Zwierzęta, Ludzie, Przedmioty, Krajobraz
- Działa jako publiczna strona, z ukrytym linkiem do panelu administratora

### `add.php`
- Panel administratora
- Formularz dodawania nowego zdjęcia:
  - Nazwa
  - Opis
  - Kategoria
  - Plik graficzny (JPEG, PNG)
- Widok tabeli z dodanymi zdjęciami
- Zawiera przyciski do edycji i usuwania zdjęć

### `delete.php`
- Obsługuje usuwanie zdjęcia na podstawie `id`
- Usuwa wpis z bazy i plik z katalogu `uploads/`

### `edit.php`
- Formularz edycji danych zdjęcia na podstawie `id`
- Pozwala zmienić nazwę, opis i kategorię

### `save_edit.php`
- Zapisuje zmiany wprowadzone w formularzu edycji
- Aktualizuje rekord w bazie danych

### `db.php`
- Plik z połączeniem do bazy danych (host, login, hasło, nazwa bazy)

### `galery.js`
- Skrypt odpowiedzialny za rozwijane menu nawigacji (używany w `index.php`)

---

## 🗂️ Katalogi i pliki

- `uploads/` – folder na dodawane obrazy
- `style.css` – stylizacja aplikacji
- `README.md` – opis projektu

---

## 🔧 Jak uruchomić projekt lokalnie?

1. **Wymagania:**
   - Zainstalowany XAMPP
   - PHP i MySQL w wersji zgodnej z projektem

2. **Kroki:**
   - Sklonuj repozytorium lub skopiuj pliki do folderu `htdocs` w XAMPP.
   - Uruchom XAMPP i włącz `Apache` oraz `MySQL`.
   - W phpMyAdmin utwórz nową bazę danych, np. `galeria`.
   - Zaimportuj plik SQL z strukturą tabeli (jeśli jest dostępny).
   - Skonfiguruj dane połączenia w pliku `db.php`.
   - Wejdź na `http://localhost/nazwa-folderu/index.php`, aby uruchomić galerię.

---

## ✅ Funkcje

- Przeglądanie zdjęć wg kategorii
- Dodawanie nowych zdjęć z formularza
- Edycja danych zdjęcia
- Usuwanie zdjęcia
- Wyświetlanie miniatur w siatce
- Stylizacja CSS i prosty JavaScript do nawigacji

---

## 📌 Autor

Projekt stworzony przez Mateusz Biernacki jako część portfolio programistycznego.
