<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Manajemen Rental Mobil')</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
            font-size: 15px;
            line-height: 1.5;
            color: #222222;
            background-color: #fafafa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .navbar {
            background-color: #f0f0f0;
            border-bottom: 1px solid #d0d0d0;
            padding: 12px 20px;
        }
        .navbar-inner {
            max-width: 960px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 17px;
            color: #111111;
            text-decoration: none;
        }
        .navbar-links {
            display: flex;
            gap: 18px;
        }
        .navbar-links a {
            color: #333333;
            text-decoration: none;
            padding: 6px 8px;
            border-radius: 4px;
        }
        .navbar-links a.active {
            font-weight: 700;
            color: #111111;
        }
        .navbar-links a:hover {
            text-decoration: underline;
        }
        a:focus-visible,
        button:focus-visible,
        input:focus-visible,
        select:focus-visible,
        textarea:focus-visible {
            outline: 2px solid #1d4ed8;
            outline-offset: 2px;
        }
        .container {
            width: 100%;
            max-width: 960px;
            margin: 24px auto;
            padding: 24px;
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 4px;
            flex: 1;
        }
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 18px;
        }
        .page-header h1 {
            margin: 0;
            font-size: 22px;
            color: #111111;
        }
        .alert-success {
            background-color: #e8f5e9;
            border: 1px solid #81c784;
            color: #1b5e20;
            padding: 10px 14px;
            border-radius: 4px;
            margin-bottom: 18px;
        }
        .btn {
            display: inline-block;
            padding: 8px 16px;
            min-height: 38px;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            border-radius: 4px;
            border: 1px solid #555555;
            background-color: #f5f5f5;
            color: #111111;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #e5e5e5;
        }
        .btn-primary {
            background-color: #e8eef5;
            border-color: #2b4c7e;
            color: #102a43;
        }
        .btn-primary:hover {
            background-color: #d5e2f2;
        }
        .btn-danger {
            background-color: #fdecea;
            border-color: #b91c1c;
            color: #991b1b;
        }
        .btn-danger:hover {
            background-color: #fbd5d1;
        }
        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        th, td {
            padding: 10px 12px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: middle;
        }
        th {
            background-color: #f2f2f2;
            font-weight: 700;
            color: #222222;
        }
        .actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .action-link {
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 500;
        }
        .action-link:hover {
            text-decoration: underline;
        }
        .action-delete-btn {
            background: none;
            border: none;
            padding: 0;
            font: inherit;
            color: #b91c1c;
            cursor: pointer;
            font-weight: 500;
        }
        .action-delete-btn:hover {
            text-decoration: underline;
        }
        .form-row {
            display: grid;
            grid-template-columns: 160px 1fr;
            gap: 8px 16px;
            align-items: start;
            margin-bottom: 14px;
        }
        .form-row label {
            padding-top: 7px;
            color: #333333;
            font-weight: 500;
        }
        .form-control {
            width: 100%;
            padding: 8px 10px;
            font-size: 14px;
            font-family: inherit;
            color: #111111;
            background-color: #ffffff;
            border: 1px solid #bbbbbb;
            border-radius: 4px;
        }
        .form-control.is-invalid {
            border-color: #b91c1c;
        }
        .error-text {
            color: #b91c1c;
            font-size: 13px;
            margin-top: 4px;
        }
        .checkbox-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding-top: 7px;
            cursor: pointer;
        }
        .form-actions {
            margin-left: 176px;
            display: flex;
            gap: 10px;
            margin-top: 18px;
        }
        .detail-list {
            margin: 0 0 20px 0;
        }
        .detail-row {
            display: grid;
            grid-template-columns: 180px 1fr;
            padding: 10px 0;
            border-bottom: 1px solid #eeeeee;
        }
        .detail-label {
            color: #555555;
        }
        .detail-value {
            color: #111111;
            font-weight: 500;
        }
        .footer {
            text-align: center;
            padding: 16px 20px;
            border-top: 1px solid #dddddd;
            background-color: #f5f5f5;
            color: #444444;
            font-size: 14px;
        }
        @media (max-width: 640px) {
            .form-row,
            .detail-row {
                grid-template-columns: 1fr;
            }
            .form-actions {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ url('/') }}" class="navbar-brand">Manajemen Rental Mobil</a>
            <div class="navbar-links">
                <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                <a href="{{ url('/cars') }}" class="{{ request()->is('cars*') ? 'active' : '' }}">Mobil</a>
            </div>
        </div>
    </nav>

    <main class="container">
        @if (session('success'))
            <div class="alert-success" role="status">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        Muhammad Hari Fazrian · 2457401023
    </footer>
</body>
</html>
