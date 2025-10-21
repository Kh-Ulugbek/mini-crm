<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Widget</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f8f9fa;
        }

        .widget-container {
            max-width: 400px;
            margin: 40px auto;
            padding: 40px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .1);
        }

        input, textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        button {
            background: #2563eb;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
        }

        button:hover {
            background: #1e40af;
        }

        .alert {
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            display: none;
        }

        .alert.success {
            background: #d1fae5;
            color: #065f46;
        }

        .alert.error {
            background: #fee2e2;
            color: #991b1b;
        }
    </style>
</head>
<body>

@yield('content')

@yield('js')
</body>
</html>
