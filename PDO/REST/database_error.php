<!DOCTYPE html>
<html>
<head>
    <title>Course/Student Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>


<body>
    <header><h1>Course Manager</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Yaroslav Rykal, Inc.</p>
    </footer>
</body>
</html>
