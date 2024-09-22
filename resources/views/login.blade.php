<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User--Login</title>
    <style>
        /* Universal Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5; /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Container for Login Form */
        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Google Logo */
        .google-logo {
            margin-bottom: 20px;
        }

        /* Heading Style */
        h1 {
            font-size: 24px;
            color: #202124;
            margin-bottom: 20px;
            font-weight: 500;
        }

        /* Form Style */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Label Styling (Hidden for minimalistic look) */
        label {
            display: none;
        }

        /* Input Fields */
        input[type="text"], input[type="password"] {
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #dadce0;
            border-radius: 4px;
            font-size: 16px;
            background-color: #fff;
            color: #202124;
            transition: all 0.3s ease;
        }

        /* Input Focus Style */
        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border: 1px solid #1a73e8;
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
        }

        /* Button Style */
        button {
            padding: 14px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        /* Button Hover and Active Styles */
        button:hover {
            background-color: #1669bb;
        }

        button:active {
            background-color: #0f5ba7;
        }

        /* Error Message */
        .error-message {
            color: #d93025;
            margin-top: 10px;
            font-size: 14px;
        }

        /* Footer */
        .footer {
            margin-top: 20px;
            font-size: 14px;
            color: #5f6368;
        }

        .footer a {
            color: #1a73e8;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Media Query for Small Devices */
        @media (max-width: 600px) {
            .login-container {
                padding: 20px;
                max-width: 90%;
            }

            input[type="text"], input[type="password"], button {
                font-size: 14px;
                padding: 12px;
            }
        }

    </style>
</head>
<body>
    <div class="login-container">
        <h1>Sign in</h1>
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>

        @if (session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif

        <div class="footer">
            <p>Don't have an account? <a href="/register">Sign up</a></p>
        </div>
    </div>
</body>
</html>
