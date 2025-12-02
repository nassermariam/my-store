<!-- Copilot / AI agent guidance for this repo -->
# Quick repository orientation

This is a small PHP storefront template intended to run on a local PHP server (Laragon in the developer's environment).

 - Entry page: `index.php` — includes `inc/header.php` and `inc/footer.php` and renders product cards.
 - Layout includes: `inc/header.php`, `inc/footer.php` (navigation, Bootstrap assets). Many view pages in `views/auth/` include the header/footer by relative paths.
 - Application logic place-holders: `core/function.php` and `core/validation.php` exist but are currently empty — business logic is expected to go here.
 - Static assets: `assets/`, `css/`, and `js/` (consumed from `inc/header.php` and `inc/footer.php`).

# Important patterns and conventions (observed)

 Files use direct PHP `require_once` includes with relative paths. Examples:
  - `index.php` -> `require_once('inc/header.php')`
  - `views/auth/login.php` -> `require_once('../../inc/header.php')`

 Files use no framework or Composer; code is plain PHP + Bootstrap assets loaded from CDNs.

 Several view files contain inconsistent or incorrect relative include paths (e.g. `<?php require_once('../..inc/header.php'); ?>`). Expect to see path bugs when navigating views.

 CSS and JS filenames referenced in templates may not match actual filesystem names (example: `inc/header.php` references `css/styles.css` while repo contains `css/style.css`). Check file names before edit or change references consistently.

# How to run locally (developer workflow)

 Preferred for quick checks: run PHP built-in server from project root:

 ```powershell
 cd d:\laragon\www\my-store
 php -S localhost:8000 -t .
 ```

 Then open `http://localhost:8000/index.php`.

 If using Laragon: place repo under Laragon `www` (already present), start Apache, and visit `http://localhost/my-store/index.php`.

 For debugging, enable display of errors temporarily at the top of a file:

 ```php
 <?php
 ini_set('display_errors', 1);
 error_reporting(E_ALL);
 ```

# Recommendations for AI edits (what to change and where)

 When modifying include paths, prefer deterministic patterns — use `__DIR__` or centralized `inc/config.php` to build absolute paths instead of fragile relative `../../` chains. Example fix:

 ```php
 require_once __DIR__ . '/inc/header.php';
 // or, from inside views/auth/login.php
 require_once dirname(__DIR__, 2) . '/inc/header.php';
 ```

 Verify asset paths before updating templates. E.g. `inc/header.php` links `css/styles.css` — confirm `css/` contains that file, or update the link to `css/style.css`.

 If adding business logic, put helper functions in `core/function.php` and validation helpers in `core/validation.php` to match existing layout.

 When creating or changing view files in `views/auth/`, test by opening the page via server rather than only relying on static linting (path issues are common).

# Key files to inspect when making changes

 - `index.php` — page layout and primary example of how header/footer are included.
 - `inc/header.php` — navigation, Bootstrap, and CSS `<link>`s. Update carefully; used across pages.
 - `inc/footer.php` — scripts and closing tags for pages.
 - `views/auth/*.php` — view pages; watch relative includes.
 - `core/function.php`, `core/validation.php` — intended place for logic (currently empty).

# Safety & style notes for AI code suggestions

 - Do not introduce new external dependencies (Composer) without explicit instruction; repo is intentionally dependency-free.
 - Keep changes minimal and focused: fix include paths, asset links, or small helper functions rather than large refactors unless requested.
 - When suggesting code that adjusts file paths, provide the before/after snippet and a short test step (URL to open or `php -S` command).

# If you need more context

 - Tell me which page(s) you want to fix or improve (e.g., `views/auth/about.php`, `inc/header.php`).
 - If there are environment details (DB, sessions, or external APIs) add them so the agent can update handlers safely.

---
If you'd like, I can (1) normalize the include patterns across views, (2) fix asset filename mismatches, or (3) scaffold a small `inc/config.php` and update views to use it — tell me which option to perform next.
