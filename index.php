<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - Biopro VET System</title>
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('bgimage.jpg');
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        header {
            background-color: rgba(76, 175, 80, 0.8);
            color: white;
            text-align: center;
            padding: 1em 0;
            width: 100%;
            position: fixed;
            top: 0;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            width: 100%;
            margin-top: 70px; /* Adjust according to the header height */
        }

        section {
            background: white;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 1em;
        }

        h2 {
            text-align: center;
            color: #4CAF50;
        }

        .form-group {
            margin-bottom: 1em;
        }

        label {
            display: block;
            margin-bottom: 0.5em;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 0.7em;
            background-color: #4CAF50;
            border: none;
            color: white;
            font-size: 1em;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
        }

        a {
            color: #4CAF50;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        footer {
            text-align: center;
            padding: 1em 0;
            background-color: black;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>BIOPRO VET SYSTEM</h1>
    </header>

    <main>
        <section id="login">
            <h2>Login</h2>
            <form  action="process_login.php" method="post">
                <div class="form-group">
                    <label for="usernames">Username:</label>
                    <input type="text" id="usernames" name="usernames" required>
                </div>
                <div class="form-group">
                    <label for="passwords">Password:</label>
                    <input type="password" id="passwords" name="passwords" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <p>If you are not registered, please <a href="#" onclick="showRegistration(event)">register here</a>.</p>
        </section>

        <section id="register" style="display: none;">
            <h2>Register</h2>
            <form  action="process_register.php" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Register</button>
            </form>
            <p>Already registered? <a href="#" onclick="showLogin(event)">Login here</a>.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Veterinary Care System. All rights reserved.</p>
    </footer>

    <script>
        function showRegistration(event) {
            event.preventDefault();
            document.getElementById('login').style.display = 'none';
            document.getElementById('register').style.display = 'block';
        }

        function showLogin(event) {
            event.preventDefault();
            document.getElementById('register').style.display = 'none';
            document.getElementById('login').style.display = 'block';
        }

        function handleLogin(event) {
            event.preventDefault();
            const username = document.getElementById('usernames').value;
            const password = document.getElementById('passwords').value;

            const storedUser = localStorage.getItem(username);
            if (storedUser) {
                const user = JSON.parse(storedUser);
                if (user.password === password) {
                    alert("SUCCESS");
                    // window.location.href = "indexs.php"; // Redirect to indexs.php
                } else {
                    alert("Invalid username or password.");
                }
            } else {
                alert("Invalid username or password.");
            }
        }

        function handleRegister(event) {
            event.preventDefault();
            const name = document.getElementById('name').value;
            const username = document.getElementById('username').value;
            const phone = document.getElementById('phone').value;
            const password = document.getElementById('password').value;

            if (name && username && phone && password) {
                const user = {
                    name: name,
                    username: username,
                    phone: phone,
                    password: password
                };

                localStorage.setItem(username, JSON.stringify(user));
                alert("Registration successful!");
                showLogin(event); // Switch to the login form
            } else {
                alert("Please fill in all fields.");
            }
        }
    </script>
</body>
</html>
