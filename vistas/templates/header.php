<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" href="/src/images/logo.png" type="image/x-icon">
    <title>INGESOFT S.A</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f0f4f8;
            /* Color de fondo de la página */
        }

        .custom-navbar {
            background-color: #343a40;
            /* Gris oscuro */
            border-bottom: 1px solid #ffffff;
            padding: 1rem 1.5rem;
            /* Más grande */
        }

        .custom-navbar .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            /* Texto más grande */
            color: #fff;
        }

        .custom-navbar .navbar-brand img.navbar-logo {
            margin-right: 1rem;
            width: 60px;
            /* Imagen más grande */
            height: 60px;
            /* Imagen más grande */
        }

        .custom-navbar .nav-link {
            color: #ffffff;
            /* Texto blanco */
            font-size: 1.25rem;
            /* Texto más grande */
            font-weight: 500;
        }

        .custom-navbar .nav-link:hover {
            color: #d1ecff;
        }

        .custom-navbar .nav-link.active {
            color: #e2e6ea;
        }

        .custom-navbar .nav-link .icon-large {
            font-size: 1.75rem;
            /* Icono más grande */
        }

        .custom-navbar .dropdown-menu {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .custom-navbar .dropdown-item {
            color: #333;
        }

        .custom-navbar .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #0056b3;
        }

        .custom-navbar .navbar-toggler {
            border: none;
        }

        .custom-navbar .navbar-toggler:focus {
            outline: none;
        }

        .custom-navbar .navbar-toggler-icon {
            color: #ffffff;
        }

        .footer {
            background-color: #343a40;
            /* Gris oscuro */
            color: #ffffff;
            /* Texto blanco */
            padding: 1.5rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 1rem;
        }

        .footer a:hover {
            color: #d1ecff;
        }

        .footer-icons i {
            font-size: 1.5rem;
        }
    </style>

</head>

<body>
    <?php include_once 'navbar.php' ?>
    <div class="container mt-5 pt-5">