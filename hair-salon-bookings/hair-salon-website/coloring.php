<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coloring - Our Hair Salon</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: linear-gradient(120deg, #e6e9f9 0%, #f8f8f8 100%); font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; color: #0B1D51; }
        .container { max-width: 700px; margin: 60px auto 0 auto; background: #fff; border-radius: 16px; box-shadow: 0 6px 32px rgba(114,92,173,0.10); padding: 40px 32px 32px 32px; }
        h1 { text-align: center; color: #725CAD; margin-bottom: 18px; }
        p { text-align: center; margin-bottom: 32px; }
        .services-gallery { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 24px; margin-bottom: 30px; }
        .service-card { background: #f8f8f8; border-radius: 10px; box-shadow: 0 2px 8px rgba(114,92,173,0.04); text-align: center; padding: 18px 10px 14px 10px; border: 2px solid #e6e9f9; transition: box-shadow 0.2s, border 0.2s, background 0.2s; }
        .service-card:hover { background: #e6e9f9; border: 2px solid #725CAD; box-shadow: 0 4px 16px rgba(114,92,173,0.10); }
        .service-card img { width: 100%; max-width: 140px; height: 120px; object-fit: cover; border-radius: 8px; margin-bottom: 10px; box-shadow: 0 2px 8px rgba(114,92,173,0.08); }
        .service-card h3 { color: #725CAD; margin: 0; font-size: 1.1em; }
        .button { display: block; width: 100%; background: #725CAD; color: #fff; border: none; padding: 14px 0; border-radius: 6px; font-size: 1.1em; font-weight: bold; text-align: center; text-decoration: none; margin-top: 18px; transition: background 0.2s; }
        .button:hover { background: #0B1D51; }
        @media (max-width: 600px) { .container { padding: 18px 6px; } .service-card img { max-width: 100px; height: 80px; } }
    </style>
</head>
<body>
    <div class="container">
        <h1>Coloring</h1>
        <p>Discover our vibrant coloring services for every style and personality!</p>
        <div class="services-gallery">
            <div class="service-card">
                <img src="assets/color1.jpg" alt="Full Color">
                <h3>Full Color</h3>
            </div>
            <div class="service-card">
                <img src="assets/color2.jpg" alt="Highlights">
                <h3>Highlights</h3>
            </div>
            <div class="service-card">
                <img src="assets/color3.jpg" alt="Balayage">
                <h3>Balayage</h3>
            </div>
            <div class="service-card">
                <img src="assets/color4.jpg" alt="Ombre">
                <h3>Ombre</h3>
            </div>
            <div class="service-card">
                <img src="assets/color5.jpg" alt="Root Touch-Up">
                <h3>Root Touch-Up</h3>
            </div>
            <div class="service-card">
                <img src="assets/color6.jpg" alt="Gloss/Toner">
                <h3>Gloss/Toner</h3>
            </div>
        </div>
        <a href="index.php" class="button">Back to Home</a>
    </div>
</body>
</html>
