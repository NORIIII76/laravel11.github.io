<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        }

        /* Main Container */
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        /* Google-like Logo */
        .google-logo {
            margin-bottom: 20px;
        }

        /* Heading */
        h2 {
            font-size: 24px;
            color: #202124;
            font-weight: 400;
            margin-bottom: 20px;
        }

        /* Input Fields */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #dadce0;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            color: #202124;
            transition: border 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            outline: none;
            border: 1px solid #1a73e8;
            box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
        }

        /* Submit Button */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #155cb0;
        }

        /* Error Messages */
        .error {
            color: red;
            font-size: 12px;
            margin-top: -5px;
            margin-bottom: 10px;
        }

        /* Success Messages */
        .success {
            color: green;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Link to Login */
        p {
            font-size: 14px;
            margin-top: 20px;
            color: #5f6368;
        }

        p a {
            color: #1a73e8;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        /* Media Query for Small Devices */
        @media (max-width: 600px) {
            .container {
                padding: 20px;
                max-width: 90%;
            }

            input[type="text"], input[type="password"], button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Sign Up</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <!-- Registration Form -->
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Username Input -->
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}" required>
            @error('username')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password Input -->
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit">Register</button>
    </form>

    <!-- Link to Login -->
    <p>Already have an account? <a href="{{ route('login') }}">Login here</a>.</p>
</div>
</body>
</html>
