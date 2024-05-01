<!DOCTYPE html>
<html>

<head>
    <title>Register | Page</title>

    <!-- CSS for This Register Page Here -->

    <link rel="stylesheet" href="{{ asset('register_form.css') }}">

</head>

<body>
    <!-- Register Forms Here -->

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="{{ route('sign.up') }}" method="POST">
                @csrf
                <h1>Create Account</h1>
                <input type="text" name="name" placeholder="Name" />
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <button type="submit" name="ok">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="{{ route('sign.in') }}" method="POST">
                @csrf
                <h1>Sign in</h1>
                <input type="email" name="email" placeholder="Email" />
                <input type="password" name="password" placeholder="Password" />
                <a href="#">Forgot your password ?</a>
                <button type="submit" name="ok">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Here -->

    <footer>
        <p>
            Created with <i class="fa fa-heart"></i> by
            <a target="_blank" href="#">Sarvarbek Dev [>_-]</a> |
            <a href="{{ route('main.page') }}">Back to Main Page</a>.
        </p>
    </footer>


    <!-- JavaScript for Register Forms Here -->

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>
