<!-- app/Views/layout.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'My Application'; ?></title>
    <!-- Include any common CSS or JS files here -->
</head>
<body>
    <header>
        <!-- Common header content, like logo or navigation -->
        <nav>
            <ul>
                <li><a href="/rms/home">Home</a></li>
                <li><a href="/rms/user">Users</a></li>
                <li><a href="/rms/grade">Grade</a></li>
                <li><a href="/rms/faculty">Faculty</a></li>
                <li><a href="/rms/streams">Streams</a></li>
                <li><a href="/rms/subject">Subjects</a></li>
                <li><a href="/rms/facultyDetails">Faculty Details</a></li>
                <li><a href="/rms/examination">Examination</a></li>
                <li><a href="/rms/student">Student</a></li>
                <!-- Add more links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $content; ?>
    </main>

    <footer>
        <!-- Common footer content -->
        <p>&copy; 2024 My Application. All rights reserved.</p>
    </footer>
</body>
</html>
