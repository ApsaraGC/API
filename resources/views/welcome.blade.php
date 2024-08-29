<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    /* background-color: #468bda; */
    background-image: url('images/moon.jpg');
}

.header {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    align-items: center;
    padding: 20px 10px;
}

@media (min-width: 1024px) {
    .header {
        grid-template-columns: 1fr 1fr 1fr;
    }
}

.logo-container {
    display: flex;
    justify-content: center;
    grid-column: 1 / 2;
}

@media (min-width: 1024px) {
    .logo-container {
        grid-column: 2 / 3;
    }
}

.logo {
    height: 50px;
    width: auto;
    color: #FF2D20;
}

@media (min-width: 1024px) {
    .logo {
        height: 70px;
    }
}
main {
        text-align: center;
        font-size: 3rem; /* Adjust the size as needed */
        color: white; /* Text color */
        margin-top: 20vh; /* Pushes the text down from the top */
        padding: 1rem;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Adds a shadow to the text */
        background-color: rgba(115, 190, 203, 0.5); /* Adds a semi-transparent background */
        border-radius: 10px; /* Rounds the corners of the background */
        max-width: 600px; /* Limits the width of the text box */
        margin-left: auto;
        margin-right: auto;
    }

.nav {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

.nav-link {
    padding: 8px 15px;
    text-decoration: none;
    color: black;
    border: 1px solid transparent;
    transition: color 0.3s ease, border-color 0.3s ease;
}

.nav-link:hover {
    color: rgba(0, 0, 0, 0.7);
    border-color: #FF2D20;
}

.nav-link:focus-visible {
    outline: none;
    border-color: #FF2D20;
}

@media (prefers-color-scheme: dark) {
    .nav-link {
        color: white;
    }

    .nav-link:hover {
        color: rgba(255, 255, 255, 0.8);
    }

    .nav-link:focus-visible {
        border-color: rgb(255, 255, 255);
    }
}

        </style>
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <svg class="logo" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG content goes here -->
            </svg>
        </div>
        <nav class="nav">
            <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>
            <a href="{{ route('login') }}" class="nav-link">Log in</a>
            <a href="{{ route('register') }}" class="nav-link">Register</a>
        </nav>
    </header>
    <main>
        Welcom To Hanag's Hospital
    </main>
</body>
</html>


