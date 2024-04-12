<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .links {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        .links a {
            margin: 0 10px;
            font-size: 24px;
            text-decoration: none;
            color: #333;
        }

        .links a:hover {
            color: #666;
        }
    </style>
</head>

<body>
    <div class="links">
        <h1>Error</h1>
        <p style="color: salmon;"><?php echo $message; ?></p>
        <a href="/">go main</a>
    </div>
</body>

</html>