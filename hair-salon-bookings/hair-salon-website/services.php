<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Services - Hair Salon</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(120deg, #e6e9f9 0%, #f8f8f8 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #0B1D51;
        }
        .container {
            max-width: 600px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 32px rgba(114,92,173,0.10);
            padding: 40px 32px 32px 32px;
        }
        h2 {
            text-align: center;
            color: #725CAD;
            margin-bottom: 32px;
        }
        .service {
            background: #f8f8f8;
            border-left: 6px solid #725CAD;
            border-radius: 8px;
            margin-bottom: 24px;
            padding: 18px 22px 14px 22px;
            box-shadow: 0 2px 8px rgba(114,92,173,0.04);
            transition: box-shadow 0.2s, background 0.2s;
        }
        .service:hover {
            background: #e6e9f9;
            box-shadow: 0 4px 16px rgba(114,92,173,0.10);
        }
        .service h3 {
            color: #725CAD;
            margin-top: 0;
        }
        .service p {
            margin-bottom: 0;
        }
        a {
            display: block;
            width: 100%;
            background: #725CAD;
            color: #fff;
            border: none;
            padding: 14px 0;
            border-radius: 6px;
            font-size: 1.1em;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            margin-top: 18px;
            transition: background 0.2s;
        }
        a:hover {
            background: #0B1D51;
        }
        @media (max-width: 600px) {
            .container {
                padding: 18px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Our Services</h2>
        <div class="service">
            <h3>Haircut</h3>
            <p>Experience a fresh new look with our professional haircut services. Prices start at $30.</p>
        </div>
        <div class="service">
            <h3>Coloring</h3>
            <p>Add some color to your life! Our coloring services start at $50.</p>
        </div>
        <div class="service">
            <h3>Styling</h3>
            <p>Get ready for any occasion with our expert styling services. Prices start at $40.</p>
        </div>
        <div class="service">
            <h3>Other Services</h3>
            <p>We also offer a range of other services including treatments and special packages. Contact us for more details.</p>
        </div>
        <a href="index.php">Back to Home</a>
    </div>
</body>
</html>