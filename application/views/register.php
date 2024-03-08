<html lang="en">

<head>

    <head>
        <script
            src="https://www.google.com/recaptcha/enterprise.js?render=6Lc5HJEpAAAAAKHCeBhUw5ZoKZO7YELkf__O7n3A"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Registration</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 400px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h2 {
                text-align: center;
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 5px;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 20px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            input[type="submit"] {
                width: 100%;
                padding: 10px;
                background-color: #007bff;
                border: none;
                color: #fff;
                cursor: pointer;
                border-radius: 5px;
            }

            input[type="submit"]:hover {
                background-color: #0056b3;
            }
        </style>
    </head>

<body>
    <div class="container">
        <h2>Student Registration</h2>
        <?php echo validation_errors(); ?>
        <?php if ($this->session->flashdata('success')): ?>
            <div>
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>
        <?php echo form_open('student', 'id="registration_form"'); ?>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">

        <label for="email">Email:</label>
        <input type="email" name="email" id="email">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <!-- Add a hidden field to store the reCAPTCHA token -->
        <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">

        <input type="submit" value="Register" onclick="onClick(event)">
        <?php echo form_close(); ?>
    </div>
    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.enterprise.ready(async () => {
                const token = await grecaptcha.enterprise.execute('6Lc5HJEpAAAAAKHCeBhUw5ZoKZO7YELkf__O7n3A', { action: 'LOGIN' });
            });
        }
    </script>
</body>

</html>