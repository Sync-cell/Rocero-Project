<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 24px;
            color: #2c3e50;
            font-size: 26px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #dcdde1;
            border-radius: 8px;
            font-size: 16px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #74b9ff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0984e3;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #74b9ff;
        }

        .error-message {
            color: #d63031;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #0984e3;
            text-decoration: none;
        }

        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Welcome Back</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="error-message"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form action="<?= base_url('admin/authenticate') ?>" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <a href="<?= base_url('admin/register') ?>" class="register-link">Don't have an account? Register here.</a>
</div>

</body>
</html>


