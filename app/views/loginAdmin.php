<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

body {
    background-color: #f7f7f7;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.login-container {
    background: white;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
    width: 100%;
    max-width: 400px;
    margin: 0 16px;
}

h2 {
    color: #222222;
    font-size: 22px;
    font-weight: 600;
    margin-bottom: 24px;
}

.form-group {
    margin-bottom: 16px;
}

label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: #222222;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 12px;
    border: 1px solid #b0b0b0;
    border-radius: 8px;
    font-size: 16px;
    color: #222222;
    transition: all 0.2s ease;
}

input:focus {
    outline: none;
    border-color: #222222;
    box-shadow: 0 0 0 1px #222222;
}

input::placeholder {
    color: #717171;
}

button {
    width: 100%;
    padding: 14px;
    background: #ff385c;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: transform 0.1s ease;
}

button:hover {
    background: #e61e4d;
    transform: scale(1.01);
}

button:active {
    transform: scale(0.99);
}

/* Responsive design */
@media (max-width: 480px) {
    .login-container {
        margin: 0 12px;
        padding: 20px;
    }

    h2 {
        font-size: 20px;
    }

    input, button {
        padding: 12px;
        font-size: 15px;
    }
}
</style>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <form action="/loginAdmin" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="nom" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>