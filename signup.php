<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup — StartUpSync</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #0f1226;
            --card: rgba(15, 23, 36, 0.6);
            --muted: #9aa4c0;
            --accent1: #6c7bff;
            --accent2: #9b5cff;
            --glass: rgba(255, 255, 255, 0.06);
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background:
                radial-gradient(900px 400px at 10% 10%, rgba(108, 123, 255, 0.06), transparent),
                radial-gradient(700px 300px at 90% 90%, rgba(155, 92, 255, 0.04), transparent),
                var(--bg);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            min-height: 100vh;
        }

        /* ---------- FORM CARD ---------- */
        .signup-card {
            width: 380px;
            padding: 28px;
            background: linear-gradient(180deg,
                    rgba(255, 255, 255, 0.04),
                    rgba(255, 255, 255, 0.02));
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 12px 40px rgba(2, 6, 23, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 14px;
            animation: fadeIn 0.8s ease-out;
        }

        .signup-card h2 {
            margin: 0 0 6px;
            font-size: 24px;
        }

        .signup-card p {
            font-size: 13px;
            margin: 0 0 18px;
            color: var(--muted);
        }

        /* ---------- INPUT FIELDS ---------- */
        input {
            width: 100%;
            padding: 12px 14px;
            margin: 10px 0 4px;
            border-radius: 10px;
            background: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.08);
            outline: none;
            font-size: 15px;
            transition: border 0.2s, box-shadow 0.2s;
        }

        input:focus {
            border-color: var(--accent1);
            box-shadow: 0 8px 24px rgba(108, 123, 255, 0.12);
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, var(--accent1), var(--accent2));
            border: none;
            color: white;
            margin-top: 16px;
            font-size: 15px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.15s, opacity 0.15s;
        }

        button:hover {
            transform: translateY(-2px);
            opacity: 0.95;
        }

        a {
            color: var(--accent1);
            text-decoration: none;
            font-weight: 600;
        }

        a:hover {
            text-decoration: underline;
        }

        /* message styles */
        .success {
            margin-top: 14px;
            padding: 10px;
            background: rgba(0, 255, 0, 0.15);
            border: 1px solid rgba(0, 255, 0, 0.2);
            color: #b4ffb4;
            border-radius: 8px;
        }

        .error {
            margin-top: 14px;
            padding: 10px;
            background: rgba(255, 60, 60, 0.15);
            border: 1px solid rgba(255, 60, 60, 0.25);
            color: #ffb4b4;
            border-radius: 8px;
        }

        /* ---------- Animation ---------- */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>

    <div class="signup-card">
        <h2>Create Your Account</h2>
        <p>Join StartUpSync and start building your ideas today!</p>

        <form action="signup.php" method="POST">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <button type="submit" name="signup">Sign Up</button>
        </form>

        <p style="margin-top:16px;font-size:14px;color:var(--muted);">
            Already have an account? <a href="login.php">Login</a>
        </p>

        <?php
        if (isset($_POST['signup'])) {
            include 'db.php';

            $name = $_POST['full_name'];
            $email = $_POST['email'];
            $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
            if (mysqli_num_rows($check) > 0) {
                echo "<div class='error'>Email already exists. Try Login!</div>";
            } else {
                $sql = "INSERT INTO users (full_name, email, password)
                    VALUES ('$name', '$email', '$pass')";

                if (mysqli_query($conn, $sql)) {
                    echo "<div class='success'>Account created! <a href='login.php'>Login</a></div>";
                } else {
                    echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
                }
            }
        }
        ?>
    </div>

</body>

</html>