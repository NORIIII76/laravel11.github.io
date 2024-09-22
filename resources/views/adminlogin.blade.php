<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin--Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    body {
        font-family: 'Roboto', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f5f5f5;
    }
    
    .login-container {
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 40px;
        width: 360px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    
    h2 {
        margin-bottom: 20px;
        font-weight: 500;
        color: #202124;
    }
    
    .input-group {
        margin-bottom: 20px;
    }
    
    input {
        width: 100%;
        padding: 14px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
        background-color: #f5f5f5;
        margin-top: 10px;
    }
    
    input:focus {
        outline: none;
        border-color: #1a73e8;
        background-color: #ffffff;
    }
    
    button {
        width: 100%;
        padding: 12px;
        background-color: #1a73e8;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #155ab6;
    }
    
    .forgot-password {
        display: block;
        margin-top: 20px;
        color: #1a73e8;
        text-decoration: none;
        font-size: 14px;
    }
    
    .forgot-password:hover {
        text-decoration: underline;
    }
    
    .divider {
        width: 100%;
        height: 1px;
        background-color: #ddd;
        margin: 30px 0;
    }
    
    .google-login {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: #ffffff;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 12px;
        font-size: 14px;
        cursor: pointer;
        width: 100%;
    }
    
    .google-login i {
        margin-right: 10px;
        font-size: 18px;
        color: #ea4335;
    }
    
    .google-login:hover {
        background-color: #f5f5f5;
    }
    
    .google-login span {
        font-weight: 500;
        color: #202124;
    }
    </style>    
    
</head>
<body>
    <div class="login-container">
        <h2>Sign in</h2>
        <form id="loginForm" onsubmit="return validateLogin(event)">
            <div class="input-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>

        <a href="https://geekprank.com/hacker/" class="forgot-password">Forgot password?</a>
        <script>
            const express = require('express');
            const app = express();
            const port = 3000;

            // Middleware untuk autentikasi
            function authMiddleware(req, res, next) {
                const { username, password } = req.body; // Mengambil username dan password dari body request

                if (username === 'Rino' && password === 'RPL1') {
                    next(); // Jika berhasil, lanjutkan ke rute berikutnya
                } else {
                    res.status(401).send('Unauthorized: Invalid credentials'); // Jika gagal, kirimkan error
                }
            }

            // Middleware untuk memparsing request body sebagai JSON
            app.use(express.json());

            // Rute login
            app.post('/adminlogin', authMiddleware, (req, res) => {
                res.send('Login successful');
            });

            // Rute produk yang hanya bisa diakses jika login berhasil
            app.get('/products', (req, res) => {
                res.send('This is the products page');
            });

            app.listen(port, () => {
                console.log(`Server running at http://localhost:${port}`);
            });
        </script>
    </body>
</html>
