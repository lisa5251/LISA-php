<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Haircuts - Our Hair Salon</title>
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
            max-width: 700px;
            margin: 60px auto 0 auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 6px 32px rgba(114,92,173,0.10);
            padding: 40px 32px 32px 32px;
        }
        h1 {
            text-align: center;
            color: #725CAD;
            margin-bottom: 18px;
        }
        p {
            text-align: center;
            margin-bottom: 32px;
        }
        .services-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 24px;
            margin-bottom: 30px;
        }
        .service-card {
            background: #f8f8f8;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(114,92,173,0.04);
            text-align: center;
            padding: 18px 10px 14px 10px;
            border: 2px solid #e6e9f9;
            transition: box-shadow 0.2s, border 0.2s, background 0.2s;
        }
        .service-card:hover {
            background: #e6e9f9;
            border: 2px solid #725CAD;
            box-shadow: 0 4px 16px rgba(114,92,173,0.10);
        }
        .service-card img {
            width: 100%;
            max-width: 140px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 2px 8px rgba(114,92,173,0.08);
        }
        .service-card h3 {
            color: #725CAD;
            margin: 0;
            font-size: 1.1em;
        }
        .button {
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
        .button:hover {
            background: #0B1D51;
        }
        @media (max-width: 600px) {
            .container {
                padding: 18px 6px;
            }
            .service-card img {
                max-width: 100px;
                height: 80px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Haircuts</h1>
        <p>Explore our range of stylish haircuts for all ages and styles!</p>
        <div class="services-gallery">
            <div class="service-card">
                <img src="assets/haircut1.jpg" alt="Classic Cut">
                <h3>Classic Cut</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut2.jpg" alt="Fade">
                <h3>Long layers</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut3.jpg" alt="Bob Cut">
                <h3>Bob Cut</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut4.jpg" alt="Pixie Cut">
                <h3>Pixie Cut</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut5.jpg" alt="Crew Cut">
                <h3>Crew Cut</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut6.jpg" alt="Taper Fade">
                <h3>Taper Fade</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut7.jpg" alt="Curly Shag">
                <h3>Curly Shag</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut8.jpg" alt="French Crop">
                <h3>French Crop</h3>
            </div>
            <!-- Add more haircut styles as needed -->
            <div class="service-card">
                <img src="assets/haircut9.jpg" alt="Layered Bob">
                <h3>Layered Bob</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut10.jpg" alt="Blunt Cut">
                <h3>Blunt Cut</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut11.jpg" alt="A-Line Bob">
                <h3>A-Line Bob</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut12.jpg" alt="Shag Cut">
                <h3>Shag Cut</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut13.jpg" alt="Shoulder Length Waves">
                <h3>Shoulder Length Waves</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut14.jpg" alt="Side-Swept Bangs">
                <h3>Side-Swept Bangs</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut15.jpg" alt="Curly Lob">
                <h3>Curly Lob</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut16.jpg" alt="Face Framing Layers">
                <h3>Face Framing Layers</h3>
            </div>
            <div class="service-card">
                <img src="assets/haircut17.jpg" alt="Feathered Cut">
                <h3>Feathered Cut</h3>
            </div>
              <div class="service-card">
                <img src="assets/haircut18.jpg" alt="Feathered Cut">
                <h3>Bangs</h3>
            </div>
            <!-- Add more haircut styles as needed -->
        </div>
        <a href="index.php" class="button">Back to Home</a>
    </div>
</body>
</html>
