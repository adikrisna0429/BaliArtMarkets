<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
    <style>
        /* CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            padding: 10px 0;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .contact-section {
            background-color: #fff;
            padding: 40px 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .contact-form {
            max-width: 600px;
            margin: 0 auto;
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .submit-btn {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-btn:hover {
            background-color: #555;
        }

        .contact-info {
            margin-top: 40px;
            font-size: 16px;
        }

        .contact-info h2 {
            color: #333;
            margin-bottom: 15px;
        }

        .contact-info ul {
            list-style-type: none;
            padding: 0;
        }

        .contact-info ul li {
            margin-bottom: 10px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Beranda</a></li>
                <li><a href="/shop">Toko</a></li>
                <li><a href="/contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <section class="contact-section">
        <div class="container">
            <h1>Hubungi Kami</h1>
            <p>Jika Anda memiliki pertanyaan atau membutuhkan bantuan, silakan kirim pesan kepada kami melalui formulir di bawah ini.</p>
            
            <!-- Contact Form -->
            <form action="/submit-contact-form" method="POST" class="contact-form">
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Kirim Pesan</button>
            </form>

            <div class="contact-info">
                <h2>Informasi Kontak</h2>
                <ul>
                    <li><strong>Alamat:</strong> Jl. Raya Bali No. 123, Denpasar, Bali</li>
                    <li><strong>Email:</strong> info@baliart.com</li>
                    <li><strong>Telepon:</strong> +62 812 3456 7890</li>
                </ul>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Bali Art. Semua hak cipta dilindungi.</p>
    </footer>
</body>
</html>
