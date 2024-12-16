<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #1a5f7a;
        }

        .header {
            background-color: #1a5f7a;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-logo {
            display: flex;
            align-items: center;
        }

        .logo-img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border-radius: 50%;
        }

        .header h1 {
            font-size: 1.2em;
            margin: 0;
            font-weight: 600;
        }

        .user-indicator {
            display: flex;
            align-items: center;
            padding-right: 50px;
        }

        .nav-links {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-grow: 1;
            text-align: center;
            padding-right: 150px;
        }

        .nav-link {
            color: #ffffff;
            font-size: 1.0em;
            text-decoration: none;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #ddd;
        }

        .logout-indicator {
            font-size: 1.8em;
            margin-left: 15px;
            color: white;
            text-decoration: none;
        }

        .logout-indicator:hover {
            color: #ddd;
        }

        .content {
            padding: 80px 20px 20px;
        }

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .table-container h3 {
            font-size: 1.3em;  
        }

        .table-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container table, th, td {
            border: 1px solid #ccc;
        }

        .table-container th, td {
            padding: 15px;
            text-align: left;
        }

        .table-container th {
            background-color: #1a5f7a;
            color: white;
        }

        .table-container td {
            background-color: #f9f9f9;
        }

        .table-container td a {
            text-decoration: none;
            color: #1a5f7a;
            font-weight: bold;
        }

        .table-container td a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="header-logo">
        <img src="/images/uclogo.jpg" alt="UC Logo" class="logo-img">
        <h1>Welcome, Admin!</h1>
    </div>

    <div class="nav-links">
        <a href="{{ route('admin.registerStudent') }}" class="nav-link"><i class="fas fa-user-plus"></i> Register Student</a>
        <a href="{{ route('admin.viewStudents') }}" class="nav-link"><i class="fas fa-users"></i> View Students</a>
    </div>

    <div class="user-indicator">
        <a href="{{ route('login') }}" class="logout-indicator" title="Logout">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </div>
</header>

<div class="content">
    <div class="table-container">
        <h3>Registered Students</h3>
        <table>
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Program</th>
                    <th>Year & Section</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->user_id }}</td>
                    <td>{{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->program }}</td>
                    <td>{{ $student->year_section }}</td>
                    <td>{{ $student->department }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
