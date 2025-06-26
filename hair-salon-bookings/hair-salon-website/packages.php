<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Special Packages - Our Hair Salon</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: linear-gradient(120deg, #e6e9f9 0%, #f8f8f8 100%); font-family: 'Segoe UI', Arial, sans-serif; margin: 0; padding: 0; color: #0B1D51; }
        .container { max-width: 700px; margin: 60px auto 0 auto; background: #fff; border-radius: 16px; box-shadow: 0 6px 32px rgba(114,92,173,0.10); padding: 40px 32px 32px 32px; }
        h1 { text-align: center; color: #725CAD; margin-bottom: 18px; }
        p { text-align: center; margin-bottom: 32px; }
        .packages-gallery { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; margin-bottom: 30px; }
        .package-card { background: #f8f8f8; border-radius: 10px; box-shadow: 0 2px 8px rgba(114,92,173,0.04); text-align: center; padding: 22px 14px 18px 14px; border: 2px solid #e6e9f9; transition: box-shadow 0.2s, border 0.2s, background 0.2s; }
        .package-card:hover { background: #e6e9f9; border: 2px solid #725CAD; box-shadow: 0 4px 16px rgba(114,92,173,0.10); }
        .package-card h3 { color: #725CAD; margin: 0 0 10px 0; font-size: 1.1em; }
        .package-card ul { list-style: disc; padding-left: 18px; text-align: left; margin: 0 0 10px 0; }
        .package-card .price { color: #0B1D51; font-weight: bold; font-size: 1.1em; }
        .button { display: block; width: 100%; background: #725CAD; color: #fff; border: none; padding: 14px 0; border-radius: 6px; font-size: 1.1em; font-weight: bold; text-align: center; text-decoration: none; margin-top: 18px; transition: background 0.2s; }
        .button:hover { background: #0B1D51; }
        @media (max-width: 600px) { .container { padding: 18px 6px; } }
    </style>
</head>
<body>
    <div class="container">
        <h1>Special Packages</h1>
        <p>Save more with our exclusive hair salon packages!</p>
        <div class="packages-gallery">
            <div class="package-card">
                <h3>Bridal Package</h3>
                <ul>
                    <li>Bridal Hair Styling</li>
                    <li>Makeup</li>
                    <li>Trial Session</li>
                </ul>
                <div class="price">$250</div>
            </div>
            <div class="package-card">
                <h3>Color & Care</h3>
                <ul>
                    <li>Full Color</li>
                    <li>Deep Conditioning</li>
                    <li>Blowout</li>
                </ul>
                <div class="price">$120</div>
            </div>
            <div class="package-card">
                <h3>Family Package</h3>
                <ul>
                    <li>3 Haircuts</li>
                    <li>Styling</li>
                    <li>Kids' Cut</li>
                </ul>
                <div class="price">$90</div>
            </div>
        </div>
        <a href="index.php" class="button">Back to Home</a>
    </div>
</body>
</html>
