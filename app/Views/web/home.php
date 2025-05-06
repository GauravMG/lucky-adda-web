<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $title ?? 'Lucky Adda' ?></title>
  <meta name="description" content="Download PlayGlimpse, the ultimate betting app for sports enthusiasts. Place bets, track statistics, and win big with our user-friendly mobile application." />
  <meta name="author" content="PlayGlimpse" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- AOS Animation Library -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- Custom CSS -->
  <!-- <style>
    :root {
      --primary: #1a1a2e;
      --secondary: #16213e;
      --accent: #0f3460;
      --highlight: #e94560;
      --light: #f8f9fa;
      --dark: #212529;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--dark);
      overflow-x: hidden;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 700;
    }

    .text-gradient {
      background: linear-gradient(90deg, var(--highlight), #ff6b6b);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .bg-gradient {
      background: linear-gradient(135deg, var(--primary), var(--accent));
    }

    .btn-primary {
      background-color: var(--highlight);
      border-color: var(--highlight);
      border-radius: 30px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #d63e57;
      border-color: #d63e57;
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(233, 69, 96, 0.2);
    }

    .btn-outline {
      color: var(--light);
      background-color: transparent;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-radius: 30px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-outline:hover {
      border-color: var(--light);
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateY(-3px);
    }

    /* Navbar */
    .navbar {
      transition: all 0.3s ease;
      padding: 20px 0;
    }

    .navbar.scrolled {
      background-color: rgba(255, 255, 255, 0.97);
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      padding: 15px 0;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
    }

    .navbar-brand .logo {
      width: 40px;
      height: 40px;
      background-color: var(--primary);
      border-radius: 12px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      margin-right: 10px;
    }

    .nav-link {
      font-weight: 500;
      padding: 10px 15px !important;
      transition: all 0.3s ease;
    }

    /* Hero Section */
    .hero {
      padding: 180px 0 100px;
      background-color: #f8f9fa;
      position: relative;
      overflow: hidden;
    }

    .hero-shape {
      position: absolute;
      bottom: -10%;
      right: -10%;
      width: 50%;
      height: 50%;
      background-color: rgba(233, 69, 96, 0.05);
      border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
      z-index: 0;
    }

    .hero h1 {
      font-size: 3.5rem;
      line-height: 1.2;
      margin-bottom: 1.5rem;
    }

    .hero p {
      font-size: 1.2rem;
      color: #6c757d;
      margin-bottom: 2rem;
    }

    .hero-badge {
      display: inline-block;
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
      font-weight: 600;
      color: var(--dark);
      background-color: rgba(233, 69, 96, 0.1);
      border-radius: 30px;
      margin-bottom: 1.5rem;
    }

    .app-screenshot {
      position: relative;
      z-index: 1;
    }

    .app-screenshot img {
      border-radius: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      transition: all 0.5s ease;
    }

    .app-screenshot img:hover {
      transform: translateY(-10px);
    }

    .floating {
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-20px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    /* Features Section */
    .features {
      padding: 100px 0;
    }

    .section-title {
      margin-bottom: 60px;
    }

    .section-title h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .section-title p {
      color: #6c757d;
      font-size: 1.1rem;
      max-width: 700px;
      margin: 0 auto;
    }

    .feature-card {
      background-color: white;
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      width: 70px;
      height: 70px;
      border-radius: 20px;
      background-color: rgba(233, 69, 96, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
      color: var(--highlight);
      margin-bottom: 25px;
    }

    .feature-card h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
    }

    .feature-card p {
      color: #6c757d;
      margin-bottom: 0;
    }

    /* App Screenshots */
    .app-screens {
      padding: 100px 0;
      background-color: #f8f9fa;
    }

    .screen-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .screen-img:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .screen-img img {
      width: 100%;
      height: auto;
      border-radius: 20px;
    }

    /* Testimonials */
    .testimonials {
      padding: 100px 0;
      background-color: white;
    }

    .testimonial-card {
      background-color: white;
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
      position: relative;
      z-index: 1;
    }

    .testimonial-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .quote-icon {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 40px;
      color: rgba(233, 69, 96, 0.1);
      z-index: -1;
    }

    .testimonial-text {
      font-style: italic;
      color: #6c757d;
      margin-bottom: 20px;
      font-size: 1.1rem;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
    }

    .author-img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 15px;
    }

    .author-img img {
      width: 100%;
      height: 100%;
      -o-object-fit: cover;
      object-fit: cover;
    }

    .author-info h5 {
      margin-bottom: 5px;
      font-size: 1.1rem;
    }

    .author-info p {
      color: #6c757d;
      margin-bottom: 0;
      font-size: 0.9rem;
    }

    .rating {
      color: #ffc107;
      margin-top: 5px;
    }

    /* FAQ Section */
    .faq {
      padding: 100px 0;
      background-color: #f8f9fa;
    }

    .accordion-item {
      border: none;
      margin-bottom: 15px;
      border-radius: 15px !important;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .accordion-button {
      padding: 20px 25px;
      font-weight: 600;
      background-color: white !important;
      box-shadow: none !important;
    }

    .accordion-button:not(.collapsed) {
      color: var(--highlight);
    }

    .accordion-body {
      padding: 0 25px 20px;
      color: #6c757d;
    }

    /* Download CTA */
    .download-cta {
      padding: 100px 0;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      /* color: white; */
    }

    .download-cta h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .download-cta p {
      font-size: 1.1rem;
      margin-bottom: 40px;
      /* color: rgba(255, 255, 255, 0.8); */
    }

    .store-badge {
      display: inline-flex;
      align-items: center;
      background-color: white;
      color: var(--dark);
      border-radius: 12px;
      padding: 12px 25px;
      margin: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .store-badge:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      color: var(--dark);
    }

    .store-badge i {
      font-size: 2rem;
      margin-right: 15px;
    }

    .store-badge span {
      display: flex;
      flex-direction: column;
      text-align: left;
    }

    .store-badge small {
      font-size: 0.8rem;
      color: #6c757d;
    }

    .store-badge strong {
      font-size: 1.2rem;
      font-weight: 600;
    }

    /* Footer */
    .footer {
      padding: 80px 0 30px;
      background-color: #16213e;
      color: rgba(255, 255, 255, 0.8);
    }

    .footer-logo {
      font-weight: 700;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      color: white;
      margin-bottom: 20px;
    }

    .footer-logo .logo {
      width: 40px;
      height: 40px;
      background-color: var(--highlight);
      border-radius: 12px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      margin-right: 10px;
    }

    .footer-text {
      margin-bottom: 25px;
      color: rgba(255, 255, 255, 0.7);
    }

    .social-links {
      margin-bottom: 30px;
    }

    .social-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.1);
      color: rgba(255, 255, 255, 0.8);
      margin-right: 10px;
      transition: all 0.3s ease;
    }

    .social-link:hover {
      background-color: var(--highlight);
      color: white;
      transform: translateY(-3px);
    }

    .footer h5 {
      color: white;
      margin-bottom: 20px;
      font-size: 1.2rem;
    }

    .footer-links {
      list-style: none;
      padding-left: 0;
    }

    .footer-links li {
      margin-bottom: 12px;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .footer-links a:hover {
      color: white;
      text-decoration: none;
    }

    .copyright {
      text-align: center;
      padding-top: 30px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: rgba(255, 255, 255, 0.6);
    }

    /* Responsive */
    @media (max-width: 991.98px) {
      .hero {
        padding: 150px 0 80px;
      }

      .hero h1 {
        font-size: 2.8rem;
      }

      .section-title h2 {
        font-size: 2rem;
      }

      .feature-card,
      .testimonial-card {
        margin-bottom: 30px;
      }
    }

    @media (max-width: 767.98px) {
      .hero {
        padding: 120px 0 60px;
      }

      .hero h1 {
        font-size: 2.2rem;
      }

      .hero p {
        font-size: 1rem;
      }

      .app-screenshot {
        margin-top: 40px;
      }
    }
  </style> -->

  <style>
    /* :root {
      --primary: #d32f2f;
      /* Deep red for primary actions and branding *
      --secondary: #ffe6cc;
      /* Soft peachy background *
      --accent: #ff9800;
      /* Golden-orange accent *
      --highlight: #ff4500;
      /* Bright orange-red for excitement and action *
      --light: #ffffff;
      /* Clean white card background *
      --dark: #3b1f00;
      /* Deep brown for readability *
    } */
    :root {
      --primary: #ff1744;
      /* Deep red for primary actions and branding */
      --secondary: #1b1b1b;
      /* Soft peachy background */
      --accent: #ffcc00;
      /* Golden-orange accent */
      --highlight: #ff4500;
      /* Bright orange-red for excitement and action */
      --light: #272727;
      /* Clean white card background */
      --dark: #d5a845;
      /* Deep brown for readability */
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: var(--dark);
      overflow-x: hidden;
      background-color: var(--secondary);
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-weight: 700;
    }

    .text-gradient {
      background: linear-gradient(90deg, var(--highlight), #ff9800);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .bg-gradient {
      background: linear-gradient(135deg, var(--primary), var(--accent));
    }

    .btn-primary {
      background-color: var(--highlight);
      border-color: var(--highlight);
      border-radius: 30px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
      /* color: var(--light); */
    }

    .btn-primary:hover {
      background-color: #d63e57;
      border-color: #d63e57;
      transform: translateY(-3px);
      box-shadow: 0 10px 20px rgba(255, 69, 0, 0.2);
    }

    .btn-outline {
      color: var(--dark);
      background-color: transparent;
      border: 2px solid rgba(59, 31, 0, 0.3);
      border-radius: 30px;
      padding: 12px 30px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-outline:hover {
      border-color: var(--dark);
      background-color: rgba(255, 69, 0, 0.1);
      transform: translateY(-3px);
    }

    /* Navbar */
    .navbar {
      transition: all 0.3s ease;
      padding: 20px 0;
    }

    .navbar.scrolled {
      /* background-color: rgba(255, 255, 255, 0.97); */
      background-color: var(--secondary);
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
      padding: 15px 0;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      color: var(--dark);
    }

    .navbar-brand .logo {
      width: 40px;
      height: 40px;
      background-color: var(--primary);
      border-radius: 12px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      margin-right: 10px;
    }

    .nav-link {
      font-weight: 500;
      padding: 10px 15px !important;
      transition: all 0.3s ease;
      color: var(--dark);
    }

    /* Hero Section */
    .hero {
      padding: 180px 0 100px;
      background-color: var(--light);
      position: relative;
      overflow: hidden;
    }

    .hero-shape {
      position: absolute;
      bottom: -10%;
      right: -10%;
      width: 50%;
      height: 50%;
      background-color: rgba(255, 152, 0, 0.05);
      border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
      z-index: 0;
    }

    .hero h1 {
      font-size: 3.5rem;
      line-height: 1.2;
      margin-bottom: 1.5rem;
      color: var(--primary);
    }

    .hero p {
      font-size: 1.2rem;
      color: #6c757d;
      margin-bottom: 2rem;
    }

    .hero-badge {
      display: inline-block;
      padding: 0.5rem 1rem;
      font-size: 0.875rem;
      font-weight: 600;
      color: var(--dark);
      background-color: rgba(255, 152, 0, 0.1);
      border-radius: 30px;
      margin-bottom: 1.5rem;
    }

    .app-screenshot {
      position: relative;
      z-index: 1;
    }

    .app-screenshot img {
      border-radius: 30px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      transition: all 0.5s ease;
    }

    .app-screenshot img:hover {
      transform: translateY(-10px);
    }

    .floating {
      animation: float 6s ease-in-out infinite;
    }

    @keyframes float {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(-20px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    /* Features Section */
    .features {
      padding: 100px 0;
    }

    .section-title {
      margin-bottom: 60px;
    }

    .section-title h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      color: var(--primary);
    }

    .section-title p {
      color: #6c757d;
      font-size: 1.1rem;
      max-width: 700px;
      margin: 0 auto;
    }

    .feature-card {
      background-color: var(--light);
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
    }

    .feature-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
      width: 70px;
      height: 70px;
      border-radius: 20px;
      background-color: rgba(255, 152, 0, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 30px;
      color: var(--highlight);
      margin-bottom: 25px;
    }

    .feature-card h3 {
      font-size: 1.5rem;
      margin-bottom: 15px;
      color: var(--primary);
    }

    .feature-card p {
      color: #6c757d;
      margin-bottom: 0;
    }

    /* App Screenshots */
    .app-screens {
      padding: 100px 0;
      background-color: var(--light);
    }

    .screen-img {
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .screen-img:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .screen-img img {
      width: 100%;
      height: auto;
      border-radius: 20px;
    }

    /* Testimonials */
    .testimonials {
      padding: 100px 0;
      background-color: var(--light);
    }

    .testimonial-card {
      background-color: var(--light);
      border-radius: 20px;
      padding: 40px 30px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      height: 100%;
      position: relative;
      z-index: 1;
    }

    .testimonial-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .testimonial-card h3 {
      color: var(--primary);
    }

    .testimonial-card p {
      color: #6c757d;
    }

    .quote-icon {
      position: absolute;
      top: 20px;
      right: 20px;
      font-size: 40px;
      color: rgba(233, 69, 96, 0.1);
      z-index: -1;
    }

    .testimonial-text {
      font-style: italic;
      color: #6c757d;
      margin-bottom: 20px;
      font-size: 1.1rem;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
    }

    .author-img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      overflow: hidden;
      margin-right: 15px;
    }

    .author-img img {
      width: 100%;
      height: 100%;
      -o-object-fit: cover;
      object-fit: cover;
    }

    .author-info h5 {
      margin-bottom: 5px;
      font-size: 1.1rem;
    }

    .author-info p {
      color: #6c757d;
      margin-bottom: 0;
      font-size: 0.9rem;
    }

    .rating {
      color: #ffc107;
      margin-top: 5px;
    }

    /* FAQ Section */
    .faq {
      padding: 100px 0;
      background-color: #f8f9fa;
    }

    .accordion-item {
      border: none;
      margin-bottom: 15px;
      border-radius: 15px !important;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .accordion-button {
      padding: 20px 25px;
      font-weight: 600;
      background-color: white !important;
      box-shadow: none !important;
    }

    .accordion-button:not(.collapsed) {
      color: var(--highlight);
    }

    .accordion-body {
      padding: 0 25px 20px;
      color: #6c757d;
    }

    /* Download CTA */
    .download-cta {
      padding: 100px 0;
      background: linear-gradient(135deg, var(--primary), var(--accent));
      /* color: white; */
    }

    .download-cta h2 {
      font-size: 2.5rem;
      margin-bottom: 20px;
    }

    .download-cta p {
      font-size: 1.1rem;
      margin-bottom: 40px;
      /* color: rgba(255, 255, 255, 0.8); */
    }

    .store-badge {
      display: inline-flex;
      align-items: center;
      background-color: white;
      color: var(--dark);
      border-radius: 12px;
      padding: 12px 25px;
      margin: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease;
    }

    .store-badge:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
      color: var(--dark);
    }

    .store-badge i {
      font-size: 2rem;
      margin-right: 15px;
    }

    .store-badge span {
      display: flex;
      flex-direction: column;
      text-align: left;
    }

    .store-badge small {
      font-size: 0.8rem;
      color: #6c757d;
    }

    .store-badge strong {
      font-size: 1.2rem;
      font-weight: 600;
    }

    /* Footer */
    .footer {
      padding: 80px 0 30px;
      background-color: var(--secondary);
      color: rgba(255, 255, 255, 0.8);
    }

    .footer-logo {
      font-weight: 700;
      font-size: 1.5rem;
      display: flex;
      align-items: center;
      color: white;
      margin-bottom: 20px;
    }

    .footer-logo .logo {
      width: 40px;
      height: 40px;
      background-color: var(--highlight);
      border-radius: 12px;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      margin-right: 10px;
    }

    .footer-text {
      margin-bottom: 25px;
      color: rgba(255, 255, 255, 0.7);
    }

    .social-links {
      margin-bottom: 30px;
    }

    .social-link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: rgba(255, 255, 255, 0.1);
      color: rgba(255, 255, 255, 0.8);
      margin-right: 10px;
      transition: all 0.3s ease;
    }

    .social-link:hover {
      background-color: var(--highlight);
      color: white;
      transform: translateY(-3px);
    }

    .footer h5 {
      color: white;
      margin-bottom: 20px;
      font-size: 1.2rem;
    }

    .footer-links {
      list-style: none;
      padding-left: 0;
    }

    .footer-links li {
      margin-bottom: 12px;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.7);
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .footer-links a:hover {
      color: white;
      text-decoration: none;
    }

    .copyright {
      text-align: center;
      padding-top: 30px;
      border-top: 1px solid rgba(255, 255, 255, 0.1);
      color: rgba(255, 255, 255, 0.6);
    }

    /* Responsive */
    @media (max-width: 991.98px) {
      .hero {
        padding: 150px 0 80px;
      }

      .hero h1 {
        font-size: 2.8rem;
      }

      .section-title h2 {
        font-size: 2rem;
      }

      .feature-card,
      .testimonial-card {
        margin-bottom: 30px;
      }
    }

    @media (max-width: 767.98px) {
      .hero {
        padding: 120px 0 60px;
      }

      .hero h1 {
        font-size: 2.2rem;
      }

      .hero p {
        font-size: 1rem;
      }

      .app-screenshot {
        margin-top: 40px;
      }
    }

    /* Add more sections here if needed */
  </style>

  <!-- IMPORTANT: DO NOT REMOVE THIS SCRIPT TAG OR THIS VERY COMMENT! -->
  <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script>
  <script type="module" crossorigin src="/assets/index-B5Qt9EMX.js"></script>

  <style>
    #lovable-badge {
      position: fixed;
      bottom: 10px;
      right: 10px;
      width: 141px;
      padding: 5px 13px;
      background-color: #000;
      color: #fff;
      font-size: 12px;
      border-radius: 5px;
      font-family: sans-serif;
      display: flex;
      align-items: center;
      gap: 4px;
      z-index: 1000000;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/">
        <div class="logo">
          <img src="https://lucky-adda.com/api/app-logo.png" alt="Lucky Adda" class="brand-image img-circle elevation-3" style="background-color: #ffffff; width: 100%; border-radius: 7px;">
        </div>
        Lucky Adda
      </a>
      <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#screenshots">Screenshots</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#testimonials">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#faq">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-primary ms-lg-3" href="#download">Download Now</a>
          </li>
        </ul>
      </div> -->
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="hero-shape"></div>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="hero-badge">THE ULTIMATE MATKA BETTING EXPERIENCE</div>
          <h1>Bet Smarter, Win <span class="text-gradient">Bigger</span> with Lucky Adda</h1>
          <p>Step into the exciting world of Matka betting with Lucky Adda, your go-to app for seamless gaming and winning opportunities. With a user-friendly interface and real-time updates, we bring you the ultimate betting platform designed to enhance your experience and maximize your winnings.</p>
          <div class="d-flex flex-wrap gap-2">
            <!-- <a href="#download" class="btn btn-primary">
              <i class="fab fa-apple me-2"></i> Download for iOS
            </a> -->
            <a href="/lucky-adda.apk" class="btn btn-primary android-download-link">
              <i class="fab fa-android me-2"></i> Download for Android
            </a>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="app-screenshot d-flex justify-content-center">
            <img src="https://images.unsplash.com/photo-1586765677067-f8030bd8e303?q=80&w=1000&auto=format&fit=crop" alt="PlayGlimpse App" class="img-fluid floating">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features" id="features">
    <div class="container">
      <div class="section-title text-center" data-aos="fade-up">
        <h2>Features That Set Lucky Adda Apart</h2>
        <p>Explore the unique features that make Lucky Adda the preferred choice for Matka enthusiasts.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-trophy"></i>
            </div>
            <h3>Best Odds & Payouts</h3>
            <p>Get access to highly competitive odds and enjoy the best payouts, giving you more value with every successful bet.</p>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            <h3>Secure & Trusted Transactions</h3>
            <p>Your transactions are safe with Lucky Adda, thanks to advanced encryption technology ensuring secure deposits and withdrawals.</p>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="feature-card">
            <div class="feature-icon">
              <i class="fas fa-mobile-alt"></i>
            </div>
            <h3>Simple & Intuitive Interface</h3>
            <p>Whether you're a pro or a beginner, our app's intuitive design makes placing bets quick, easy, and hassle-free.</p>
          </div>
        </div>
      </div>

      <!-- <div class="row mt-5 align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
          <div class="p-4">
            <div class="mb-3 d-inline-block px-3 py-1 rounded-pill" style="background-color: rgba(233, 69, 96, 0.1);">
              <span class="text-dark fw-medium">PLAY SMARTER</span>
            </div>
            <h3 class="mb-4">SMART BETTING WITH REAL-TIME ANALYTICS</h3>
            <p class="text-muted mb-4">
            Stay ahead of the game with data-driven insights and real-time analytics. Lucky Adda empowers you with the tools and stats needed to make smarter betting decisions.
            </p>
            <ul class="list-unstyled">
              <li class="mb-3">
                <i class="fas fa-check-circle me-2 text-success"></i>
                Live match statistics
              </li>
              <li class="mb-3">
                <i class="fas fa-check-circle me-2 text-success"></i>
                Historical performance data
              </li>
              <li class="mb-3">
                <i class="fas fa-check-circle me-2 text-success"></i>
                Personalized recommendations
              </li>
              <li class="mb-3">
                <i class="fas fa-check-circle me-2 text-success"></i>
                Odds movement tracking
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
          <div class="p-4 text-center">
            <img src="https://images.unsplash.com/photo-1577741314755-048d8525d31e?q=80&w=1000&auto=format&fit=crop" alt="Analytics dashboard" class="img-fluid rounded-4 shadow">
          </div>
        </div>
      </div> -->
    </div>
  </section>

  <!-- App Screenshots -->
  <!-- <section class="app-screens" id="screenshots">
    <div class="container">
      <div class="section-title text-center" data-aos="fade-up">
        <h2>See the App in Action</h2>
        <p>Browse through our app's interface and discover its intuitive design.</p>
      </div>

      <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-featured-tab" data-bs-toggle="pill" data-bs-target="#pills-featured" type="button" role="tab" aria-controls="pills-featured" aria-selected="true">Featured</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-interface-tab" data-bs-toggle="pill" data-bs-target="#pills-interface" type="button" role="tab" aria-controls="pills-interface" aria-selected="false">Interface</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-betting-tab" data-bs-toggle="pill" data-bs-target="#pills-betting" type="button" role="tab" aria-controls="pills-betting" aria-selected="false">Betting</button>
        </li>
      </ul>

      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-featured" role="tabpanel" aria-labelledby="pills-featured-tab">
          <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1609921212029-bb5a28e60960?q=80&w=800&auto=format&fit=crop" alt="App Screenshot 1" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1512075135822-67cdd9dd7314?q=80&w=800&auto=format&fit=crop" alt="App Screenshot 2" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1533228876829-65c94e7b5025?q=80&w=800&auto=format&fit=crop" alt="App Screenshot 3" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-interface" role="tabpanel" aria-labelledby="pills-interface-tab">
          <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1551650975-87deedd944c3?q=80&w=800&auto=format&fit=crop" alt="Interface Screenshot 1" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1536304993881-ff6e9eefa2a6?q=80&w=800&auto=format&fit=crop" alt="Interface Screenshot 2" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?q=80&w=800&auto=format&fit=crop" alt="Interface Screenshot 3" class="img-fluid">
              </div>
            </div>
          </div>
        </div>

        <div class="tab-pane fade" id="pills-betting" role="tabpanel" aria-labelledby="pills-betting-tab">
          <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1571974599782-fac97a0e2076?q=80&w=800&auto=format&fit=crop" alt="Betting Screenshot 1" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1568306630920-8c615860ab49?q=80&w=800&auto=format&fit=crop" alt="Betting Screenshot 2" class="img-fluid">
              </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
              <div class="screen-img">
                <img src="https://images.unsplash.com/photo-1623018035782-b269248df916?q=80&w=800&auto=format&fit=crop" alt="Betting Screenshot 3" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Testimonials -->
  <!-- <section class="testimonials" id="testimonials">
    <div class="container">
      <div class="section-title text-center" data-aos="fade-up">
        <h2>What Our Users Say</h2>
        <p>Join thousands of satisfied users who have transformed their betting experience.</p>
      </div>

      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
          <div class="testimonial-card">
            <div class="quote-icon">
              <i class="fas fa-quote-right"></i>
            </div>
            <p class="testimonial-text">
              This app has completely changed how I approach sports betting. The analytics tools are incredible, and I love how easy it is to place bets.
            </p>
            <div class="testimonial-author">
              <div class="author-img">
                <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?q=80&w=200&auto=format&fit=crop" alt="Alex Morgan">
              </div>
              <div class="author-info">
                <h5>Alex Morgan</h5>
                <p>Sports Enthusiast</p>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <div class="testimonial-card">
            <div class="quote-icon">
              <i class="fas fa-quote-right"></i>
            </div>
            <p class="testimonial-text">
              As someone who takes betting seriously, I appreciate the depth of information available. The real-time stats have helped me make better decisions.
            </p>
            <div class="testimonial-author">
              <div class="author-img">
                <img src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?q=80&w=200&auto=format&fit=crop" alt="Michael Chen">
              </div>
              <div class="author-info">
                <h5>Michael Chen</h5>
                <p>Professional Bettor</p>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
          <div class="testimonial-card">
            <div class="quote-icon">
              <i class="fas fa-quote-right"></i>
            </div>
            <p class="testimonial-text">
              I was new to betting, but this app made everything so intuitive. The interface is clean, and I never feel overwhelmed by options or information.
            </p>
            <div class="testimonial-author">
              <div class="author-img">
                <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop" alt="Sarah Johnson">
              </div>
              <div class="author-info">
                <h5>Sarah Johnson</h5>
                <p>Casual User</p>
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- FAQ Section -->
  <!-- <section class="faq" id="faq">
    <div class="container">
      <div class="section-title text-center" data-aos="fade-up">
        <h2>Got Questions? We Have Answers</h2>
        <p>Find answers to the most common questions about our betting app.</p>
      </div>

      <div class="row justify-content-center">
        <div class="col-lg-8" data-aos="fade-up">
          <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Is the app available in my country?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Our app is available in most countries where online betting is legal. You can check the app store in your region to confirm availability or contact our support team for specific information.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  How do I deposit and withdraw funds?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  We support multiple payment methods including credit/debit cards, e-wallets, and bank transfers. To deposit, simply navigate to the 'Wallet' section in the app and follow the instructions. Withdrawals follow a similar process and are typically processed within 1-3 business days.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Is my personal information secure?
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Absolutely. We use advanced encryption technologies to protect your personal and financial information. Our privacy policy outlines how we collect, use, and protect your data, and we never share your information with third parties without your consent.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                  What types of bets can I place?
                </button>
              </h2>
              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Our app offers a wide range of betting options including single bets, accumulators, system bets, and live in-play betting across multiple sports and events. You can explore all options in the 'Betting' section of the app.
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                  Do you offer bonuses for new users?
                </button>
              </h2>
              <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes, we offer welcome bonuses for new users as well as regular promotions for existing users. The specific bonus offers vary by region, so check the 'Promotions' section in the app for current offers available to you.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Download CTA -->
  <section class="download-cta bg-gradient" id="download">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-lg-8" data-aos="fade-up">
          <h2>Ready to Transform Your Matka Betting Experience?</h2>
          <p>Download Lucky Adda now and join thousands of players who have taken their betting journey to the next level. Experience smarter betting, bigger wins, and the ultimate thrill — all in one app!</p>
          <p>👉 Download Now & Start Winning!</p>
          <div class="d-flex flex-wrap justify-content-center gap-2">
            <!-- <a href="#" class="store-badge">
              <i class="fab fa-apple"></i>
              <span>
                <small>Download on the</small>
                <strong>App Store</strong>
              </span>
            </a> -->
            <!-- <a href="#" class="store-badge">
              <i class="fab fa-google-play"></i>
              <span>
                <small>GET IT ON</small>
                <strong>Google Play</strong>
              </span>
            </a> -->
            <a href="/lucky-adda.apk" class="store-badge android-download-link">
              <i class="fab fa-google-play"></i>
              <span>
                <small>Download for</small>
                <strong>Android</strong>
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-5 mb-lg-0">
          <a href="#" class="footer-logo">
            <div class="logo">
              <img src="https://lucky-adda.com/api/app-logo.png" alt="Lucky Adda" class="brand-image img-circle elevation-3" style="background-color: #ffffff; width: 100%; border-radius: 7px;">
            </div>
            Lucky Adda
          </a>
          <p class="footer-text">Take your betting experience to the next level with our cutting-edge mobile app. Join now and start winning big!</p>
          <!-- <div class="social-links">
            <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
          </div> -->
        </div>

        <!-- <div class="col-6 col-md-3 col-lg-2 mb-5 mb-md-0">
          <h5>Company</h5>
          <ul class="footer-links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Partners</a></li>
            <li><a href="#">Press</a></li>
          </ul>
        </div> -->

        <!-- <div class="col-6 col-md-3 col-lg-2 mb-5 mb-md-0">
          <h5>Product</h5>
          <ul class="footer-links">
            <li><a href="#">Features</a></li>
            <li><a href="#">How It Works</a></li>
            <li><a href="#">Pricing</a></li>
            <li><a href="#">Security</a></li>
          </ul>
        </div> -->

        <!-- <div class="col-6 col-md-3 col-lg-2 mb-5 mb-md-0">
          <h5>Support</h5>
          <ul class="footer-links">
            <li><a href="#">Help Center</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Community</a></li>
            <li><a href="#">FAQs</a></li>
          </ul>
        </div> -->

        <!-- <div class="col-6 col-md-3 col-lg-2">
          <h5>Legal</h5>
          <ul class="footer-links">
            <li><a href="#">Terms of Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Cookie Policy</a></li>
            <li><a href="#">Responsible Gaming</a></li>
          </ul>
        </div> -->
      </div>

      <div class="copyright mt-5">
        <p>&copy; 2025 Lucky Adda. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AOS Animation Library -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <!-- Custom JavaScript -->
  <script>
    const urlParams = new URLSearchParams(window.location.search);
    const refCode = urlParams.get("referral-code");
    alert(`referral code - ${refCode}`)
    if (refCode) {
      localStorage.setItem("referral_code", refCode);

      document.querySelectorAll('.android-download-link').forEach(el => {
        const currentHref = el.getAttribute('href');
        el.setAttribute('href', currentHref + `?referral_code=${refCode}`);
      });
    }

    // Initialize AOS animation library
    AOS.init({
      duration: 800,
      once: true
    });

    // Add scroll class to navbar
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });

    // Close mobile menu when clicking nav links
    const navLinks = document.querySelectorAll('.nav-link');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        if (navbarCollapse.classList.contains('show')) {
          navbarCollapse.classList.remove('show');
        }
      });
    });
  </script>

  <!-- <a id="lovable-badge" target="_blank" href=https://lovable.dev/projects/2dc8c45e-8142-4511-b373-322563ffaa47?utm_source=gpt-engineer-badge>
    <span style="color: #A1A1AA;">Edit with</span> <svg width="60" height="12" viewBox="0 0 901 180" fill="none" xmlns="http://www.w3.org/2000/svg">
      <mask id="mask0_0_1" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="203" height="180">
        <path d="M101.17 180C99.1471 180 97.1093 179.634 95.0573 178.902C93.0069 178.172 91.2229 177.048 89.7054 175.531L74.9496 161.956C55.0528 143.577 37.5874 125.83 22.5534 108.715C7.51781 91.6006 0 73.4043 0 54.1262C0 38.7264 5.17066 25.855 15.512 15.512C25.855 5.17066 38.6699 0 53.9567 0C62.6692 0 71.1566 2.00908 79.4188 6.02724C87.6811 10.0471 94.9316 16.3003 101.17 24.7868C107.971 16.3003 115.334 10.0471 123.259 6.02724C131.184 2.00908 139.559 0 148.384 0C163.671 0 176.486 5.17066 186.829 15.512C197.17 25.855 202.341 38.7264 202.341 54.1262C202.341 73.4043 194.838 91.6149 179.831 108.758C164.824 125.902 147.315 143.663 127.305 162.042L112.636 175.531C111.118 177.048 109.334 178.172 107.284 178.902C105.232 179.634 103.194 180 101.17 180Z" fill="white" />
      </mask>
      <g mask="url(#mask0_0_1)">
        <path d="M101.17 180C99.1471 180 97.1093 179.634 95.0573 178.902C93.0069 178.172 91.2229 177.048 89.7054 175.531L74.9496 161.956C55.0528 143.577 37.5874 125.83 22.5534 108.715C7.51781 91.6006 0 73.4043 0 54.1262C0 38.7264 5.17066 25.855 15.512 15.512C25.855 5.17066 38.6699 0 53.9567 0C62.6692 0 71.1566 2.00908 79.4188 6.02724C87.6811 10.0471 94.9316 16.3003 101.17 24.7868C107.971 16.3003 115.334 10.0471 123.259 6.02724C131.184 2.00908 139.559 0 148.384 0C163.671 0 176.486 5.17066 186.829 15.512C197.17 25.855 202.341 38.7264 202.341 54.1262C202.341 73.4043 194.838 91.6149 179.831 108.758C164.824 125.902 147.315 143.663 127.305 162.042L112.636 175.531C111.118 177.048 109.334 178.172 107.284 178.902C105.232 179.634 103.194 180 101.17 180Z" fill="#FF1814" />
        <g filter="url(#filter0_f_0_1)">
          <ellipse cx="129.441" cy="219.795" rx="76.5" ry="77.5" transform="rotate(-105 129.441 219.795)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter1_f_0_1)">
          <ellipse cx="177.737" cy="206.854" rx="76.5" ry="77.5" transform="rotate(-105 177.737 206.854)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter2_f_0_1)">
          <ellipse cx="55.2627" cy="136.143" rx="76.5" ry="77.5" transform="rotate(-105 55.2627 136.143)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter3_f_0_1)">
          <ellipse cx="103.559" cy="123.202" rx="76.5" ry="77.5" transform="rotate(-105 103.559 123.202)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter4_f_0_1)">
          <circle cx="-70.8088" cy="38.1911" r="85.7011" transform="rotate(2.38352 -70.8088 38.1911)" fill="#BE2B29" />
        </g>
        <g filter="url(#filter5_f_0_1)">
          <ellipse cx="64.431" cy="55.7415" rx="64.431" ry="55.7415" transform="matrix(-0.67039 -0.742009 0.730841 -0.682548 163.103 96.668)" fill="#00C986" />
        </g>
        <g style="mix-blend-mode:hard-light" filter="url(#filter6_f_0_1)">
          <ellipse cx="72.6324" cy="62.7936" rx="72.6324" ry="62.7936" transform="matrix(-0.67039 -0.742009 0.730841 -0.682548 202.229 151.008)" fill="#297FFF" />
        </g>
      </g>
      <path d="M856.097 66.2109C883.509 66.2109 899.957 83.6374 899.957 114.574V119.274H832.404C833.775 133.176 843.957 141.204 857.859 141.204C870.782 141.204 879.789 133.959 884.88 128.868L897.019 146.294C888.992 153.735 876.852 162.546 857.859 162.546C828.293 162.546 809.104 143.357 809.104 114.574C809.104 85.7913 827.705 66.2109 856.097 66.2109ZM854.922 85.5954C843.369 85.5954 834.95 91.2737 832.992 103.805H875.677C874.894 92.2528 866.67 85.5954 854.922 85.5954Z" fill="#FAFAFA" />
      <path d="M768.703 22.5586H792.786V159.621H768.703V22.5586Z" fill="#FAFAFA" />
      <path d="M709.181 162.558C694.496 162.558 684.706 156.292 679.028 146.894H678.636V159.621H654.552V22.5586H678.636V81.8869H679.028C684.706 72.4884 694.496 66.2227 709.181 66.2227C732.873 66.2227 752.65 83.4534 752.65 114.39C752.65 145.327 732.873 162.558 709.181 162.558ZM703.111 139.845C717.601 139.845 727.587 129.663 727.587 114.39C727.587 99.1176 717.601 88.9358 703.111 88.9358C688.622 88.9358 678.636 99.1176 678.636 114.39C678.636 129.663 688.622 139.845 703.111 139.845Z" fill="#FAFAFA" />
      <path d="M578.939 162.546C555.247 162.546 535.471 145.315 535.471 114.379C535.471 83.4416 555.247 66.2109 578.939 66.2109C593.625 66.2109 603.415 72.4766 609.093 81.8752H609.485V69.148H633.373V159.609H609.485V146.882H609.093C603.415 156.28 593.625 162.546 578.939 162.546ZM585.009 139.833C599.499 139.833 609.485 129.651 609.485 114.379C609.485 99.1059 599.499 88.9241 585.009 88.9241C570.52 88.9241 560.534 99.1059 560.534 114.379C560.534 129.651 570.52 139.833 585.009 139.833Z" fill="#FAFAFA" />
      <path d="M486.412 131.817L507.755 69.1602H535.167L498.16 159.621H474.664L437.853 69.1602H465.07L486.412 131.817Z" fill="#FAFAFA" />
      <path d="M387.501 66.2109C416.284 66.2109 437.627 85.9871 437.627 114.379C437.627 142.77 416.284 162.546 387.501 162.546C358.718 162.546 337.375 142.77 337.375 114.379C337.375 85.9871 358.718 66.2109 387.501 66.2109ZM387.501 88.9241C372.816 88.9241 362.047 98.9101 362.047 114.379C362.047 129.847 372.816 139.833 387.501 139.833C402.186 139.833 412.76 129.847 412.76 114.379C412.76 98.9101 402.186 88.9241 387.501 88.9241Z" fill="#FAFAFA" />
      <path d="M296.974 22.5586H321.058V159.621H296.974V22.5586Z" fill="#FAFAFA" />
      <mask id="mask1_0_1" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="203" height="180">
        <path d="M101.17 180C99.1471 180 97.1093 179.634 95.0573 178.902C93.0069 178.172 91.2229 177.048 89.7054 175.531L74.9496 161.956C55.0528 143.577 37.5874 125.83 22.5534 108.715C7.51781 91.6006 0 73.4043 0 54.1262C0 38.7264 5.17066 25.855 15.512 15.512C25.855 5.17066 38.6699 0 53.9567 0C62.6692 0 71.1566 2.00908 79.4188 6.02724C87.6811 10.0471 94.9316 16.3003 101.17 24.7868C107.971 16.3003 115.334 10.0471 123.259 6.02724C131.184 2.00908 139.559 0 148.384 0C163.671 0 176.486 5.17066 186.829 15.512C197.17 25.855 202.341 38.7264 202.341 54.1262C202.341 73.4043 194.838 91.6149 179.831 108.758C164.824 125.902 147.315 143.663 127.305 162.042L112.636 175.531C111.118 177.048 109.334 178.172 107.284 178.902C105.232 179.634 103.194 180 101.17 180Z" fill="white" />
      </mask>
      <g mask="url(#mask1_0_1)">
        <path d="M101.17 180C99.1471 180 97.1093 179.634 95.0573 178.902C93.0069 178.172 91.2229 177.048 89.7054 175.531L74.9496 161.956C55.0528 143.577 37.5874 125.83 22.5534 108.715C7.51781 91.6006 0 73.4043 0 54.1262C0 38.7264 5.17066 25.855 15.512 15.512C25.855 5.17066 38.6699 0 53.9567 0C62.6692 0 71.1566 2.00908 79.4188 6.02724C87.6811 10.0471 94.9316 16.3003 101.17 24.7868C107.971 16.3003 115.334 10.0471 123.259 6.02724C131.184 2.00908 139.559 0 148.384 0C163.671 0 176.486 5.17066 186.829 15.512C197.17 25.855 202.341 38.7264 202.341 54.1262C202.341 73.4043 194.838 91.6149 179.831 108.758C164.824 125.902 147.315 143.663 127.305 162.042L112.636 175.531C111.118 177.048 109.334 178.172 107.284 178.902C105.232 179.634 103.194 180 101.17 180Z" fill="#FF1814" />
        <g filter="url(#filter7_f_0_1)">
          <ellipse cx="129.441" cy="219.795" rx="76.5" ry="77.5" transform="rotate(-105 129.441 219.795)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter8_f_0_1)">
          <ellipse cx="177.737" cy="206.854" rx="76.5" ry="77.5" transform="rotate(-105 177.737 206.854)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter9_f_0_1)">
          <ellipse cx="55.2627" cy="136.143" rx="76.5" ry="77.5" transform="rotate(-105 55.2627 136.143)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter10_f_0_1)">
          <ellipse cx="103.559" cy="123.202" rx="76.5" ry="77.5" transform="rotate(-105 103.559 123.202)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter11_f_0_1)">
          <circle cx="-70.8088" cy="38.1911" r="85.7011" transform="rotate(2.38352 -70.8088 38.1911)" fill="#BE2B29" />
        </g>
        <g filter="url(#filter12_f_0_1)">
          <ellipse cx="64.431" cy="55.7415" rx="64.431" ry="55.7415" transform="matrix(-0.67039 -0.742009 0.730841 -0.682548 163.103 96.668)" fill="#00C986" />
        </g>
        <g style="mix-blend-mode:hard-light" filter="url(#filter13_f_0_1)">
          <ellipse cx="72.6324" cy="62.7936" rx="72.6324" ry="62.7936" transform="matrix(-0.67039 -0.742009 0.730841 -0.682548 202.229 151.008)" fill="#297FFF" />
        </g>
      </g>
      <path d="M856.464 66.2109C883.876 66.2109 900.323 83.6374 900.323 114.574V119.274H832.771C834.142 133.176 844.324 141.204 858.226 141.204C871.149 141.204 880.156 133.959 885.247 128.868L897.386 146.294C889.358 153.735 877.219 162.546 858.226 162.546C828.66 162.546 809.471 143.357 809.471 114.574C809.471 85.7913 828.072 66.2109 856.464 66.2109ZM855.289 85.5954C843.736 85.5954 835.317 91.2737 833.359 103.805H876.044C875.261 92.2528 867.037 85.5954 855.289 85.5954Z" fill="#FAFAFA" />
      <path d="M769.07 22.5586H793.153V159.621H769.07V22.5586Z" fill="#FAFAFA" />
      <path d="M709.548 162.558C694.863 162.558 685.073 156.292 679.395 146.894H679.003V159.621H654.919V22.5586H679.003V81.8869H679.395C685.073 72.4884 694.863 66.2227 709.548 66.2227C733.24 66.2227 753.017 83.4534 753.017 114.39C753.017 145.327 733.24 162.558 709.548 162.558ZM703.478 139.845C717.968 139.845 727.954 129.663 727.954 114.39C727.954 99.1176 717.968 88.9358 703.478 88.9358C688.989 88.9358 679.003 99.1176 679.003 114.39C679.003 129.663 688.989 139.845 703.478 139.845Z" fill="#FAFAFA" />
      <path d="M579.306 162.546C555.614 162.546 535.838 145.315 535.838 114.379C535.838 83.4416 555.614 66.2109 579.306 66.2109C593.992 66.2109 603.782 72.4766 609.46 81.8752H609.852V69.148H633.74V159.609H609.852V146.882H609.46C603.782 156.28 593.992 162.546 579.306 162.546ZM585.376 139.833C599.866 139.833 609.852 129.651 609.852 114.379C609.852 99.1059 599.866 88.9241 585.376 88.9241C570.887 88.9241 560.901 99.1059 560.901 114.379C560.901 129.651 570.887 139.833 585.376 139.833Z" fill="#FAFAFA" />
      <path d="M486.779 131.817L508.122 69.1602H535.534L498.527 159.621H475.031L438.22 69.1602H465.437L486.779 131.817Z" fill="#FAFAFA" />
      <path d="M387.868 66.2109C416.651 66.2109 437.994 85.9871 437.994 114.379C437.994 142.77 416.651 162.546 387.868 162.546C359.085 162.546 337.742 142.77 337.742 114.379C337.742 85.9871 359.085 66.2109 387.868 66.2109ZM387.868 88.9241C373.183 88.9241 362.414 98.9101 362.414 114.379C362.414 129.847 373.183 139.833 387.868 139.833C402.553 139.833 413.127 129.847 413.127 114.379C413.127 98.9101 402.553 88.9241 387.868 88.9241Z" fill="#FAFAFA" />
      <path d="M297.341 22.5586H321.425V159.621H297.341V22.5586Z" fill="#FAFAFA" />
      <mask id="mask2_0_1" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="203" height="180">
        <path d="M101.17 180C99.1471 180 97.1093 179.634 95.0573 178.902C93.0069 178.172 91.2229 177.048 89.7054 175.531L74.9496 161.956C55.0528 143.577 37.5874 125.83 22.5534 108.715C7.51781 91.6006 0 73.4043 0 54.1262C0 38.7264 5.17066 25.855 15.512 15.512C25.855 5.17066 38.6699 0 53.9567 0C62.6692 0 71.1566 2.00908 79.4188 6.02724C87.6811 10.0471 94.9316 16.3003 101.17 24.7868C107.971 16.3003 115.334 10.0471 123.259 6.02724C131.184 2.00908 139.559 0 148.384 0C163.671 0 176.486 5.17066 186.829 15.512C197.17 25.855 202.341 38.7264 202.341 54.1262C202.341 73.4043 194.838 91.6149 179.831 108.758C164.824 125.902 147.315 143.663 127.305 162.042L112.636 175.531C111.118 177.048 109.334 178.172 107.284 178.902C105.232 179.634 103.194 180 101.17 180Z" fill="white" />
      </mask>
      <g mask="url(#mask2_0_1)">
        <path d="M101.17 180C99.1471 180 97.1093 179.634 95.0573 178.902C93.0069 178.172 91.2229 177.048 89.7054 175.531L74.9496 161.956C55.0528 143.577 37.5874 125.83 22.5534 108.715C7.51781 91.6006 0 73.4043 0 54.1262C0 38.7264 5.17066 25.855 15.512 15.512C25.855 5.17066 38.6699 0 53.9567 0C62.6692 0 71.1566 2.00908 79.4188 6.02724C87.6811 10.0471 94.9316 16.3003 101.17 24.7868C107.971 16.3003 115.334 10.0471 123.259 6.02724C131.184 2.00908 139.559 0 148.384 0C163.671 0 176.486 5.17066 186.829 15.512C197.17 25.855 202.341 38.7264 202.341 54.1262C202.341 73.4043 194.838 91.6149 179.831 108.758C164.824 125.902 147.315 143.663 127.305 162.042L112.636 175.531C111.118 177.048 109.334 178.172 107.284 178.902C105.232 179.634 103.194 180 101.17 180Z" fill="#FF1814" />
        <g filter="url(#filter14_f_0_1)">
          <ellipse cx="129.441" cy="219.795" rx="76.5" ry="77.5" transform="rotate(-105 129.441 219.795)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter15_f_0_1)">
          <ellipse cx="177.737" cy="206.854" rx="76.5" ry="77.5" transform="rotate(-105 177.737 206.854)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter16_f_0_1)">
          <ellipse cx="55.2627" cy="136.143" rx="76.5" ry="77.5" transform="rotate(-105 55.2627 136.143)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter17_f_0_1)">
          <ellipse cx="103.559" cy="123.202" rx="76.5" ry="77.5" transform="rotate(-105 103.559 123.202)" fill="#FFAB25" />
        </g>
        <g filter="url(#filter18_f_0_1)">
          <circle cx="-70.8088" cy="38.1911" r="85.7011" transform="rotate(2.38352 -70.8088 38.1911)" fill="#BE2B29" />
        </g>
        <g filter="url(#filter19_f_0_1)">
          <ellipse cx="64.431" cy="55.7415" rx="64.431" ry="55.7415" transform="matrix(-0.67039 -0.742009 0.730841 -0.682548 163.103 96.668)" fill="#00C986" />
        </g>
        <g style="mix-blend-mode:hard-light" filter="url(#filter20_f_0_1)">
          <ellipse cx="72.6324" cy="62.7936" rx="72.6324" ry="62.7936" transform="matrix(-0.67039 -0.742009 0.730841 -0.682548 202.229 151.008)" fill="#297FFF" />
        </g>
      </g>
      <path d="M856.464 66.2109C883.876 66.2109 900.323 83.6374 900.323 114.574V119.274H832.771C834.142 133.176 844.324 141.204 858.226 141.204C871.149 141.204 880.156 133.959 885.247 128.868L897.386 146.294C889.358 153.735 877.219 162.546 858.226 162.546C828.66 162.546 809.471 143.357 809.471 114.574C809.471 85.7913 828.072 66.2109 856.464 66.2109ZM855.289 85.5954C843.736 85.5954 835.317 91.2737 833.359 103.805H876.044C875.261 92.2528 867.037 85.5954 855.289 85.5954Z" fill="#FAFAFA" />
      <path d="M769.07 22.5586H793.153V159.621H769.07V22.5586Z" fill="#FAFAFA" />
      <path d="M709.548 162.558C694.863 162.558 685.073 156.292 679.395 146.894H679.003V159.621H654.919V22.5586H679.003V81.8869H679.395C685.073 72.4884 694.863 66.2227 709.548 66.2227C733.24 66.2227 753.017 83.4534 753.017 114.39C753.017 145.327 733.24 162.558 709.548 162.558ZM703.478 139.845C717.968 139.845 727.954 129.663 727.954 114.39C727.954 99.1176 717.968 88.9358 703.478 88.9358C688.989 88.9358 679.003 99.1176 679.003 114.39C679.003 129.663 688.989 139.845 703.478 139.845Z" fill="#FAFAFA" />
      <path d="M579.306 162.546C555.614 162.546 535.838 145.315 535.838 114.379C535.838 83.4416 555.614 66.2109 579.306 66.2109C593.992 66.2109 603.782 72.4766 609.46 81.8752H609.852V69.148H633.74V159.609H609.852V146.882H609.46C603.782 156.28 593.992 162.546 579.306 162.546ZM585.376 139.833C599.866 139.833 609.852 129.651 609.852 114.379C609.852 99.1059 599.866 88.9241 585.376 88.9241C570.887 88.9241 560.901 99.1059 560.901 114.379C560.901 129.651 570.887 139.833 585.376 139.833Z" fill="#FAFAFA" />
      <path d="M486.779 131.817L508.122 69.1602H535.534L498.527 159.621H475.031L438.22 69.1602H465.437L486.779 131.817Z" fill="#FAFAFA" />
      <path d="M387.868 66.2109C416.651 66.2109 437.994 85.9871 437.994 114.379C437.994 142.77 416.651 162.546 387.868 162.546C359.085 162.546 337.742 142.77 337.742 114.379C337.742 85.9871 359.085 66.2109 387.868 66.2109ZM387.868 88.9241C373.183 88.9241 362.414 98.9101 362.414 114.379C362.414 129.847 373.183 139.833 387.868 139.833C402.553 139.833 413.127 129.847 413.127 114.379C413.127 98.9101 402.553 88.9241 387.868 88.9241Z" fill="#FAFAFA" />
      <path d="M297.341 22.5586H321.425V159.621H297.341V22.5586Z" fill="#FAFAFA" />
      <defs>
        <filter id="filter0_f_0_1" x="-20.0115" y="71.2083" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter1_f_0_1" x="28.2847" y="58.2673" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter2_f_0_1" x="-94.1897" y="-12.4434" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter3_f_0_1" x="-45.8936" y="-25.3843" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter4_f_0_1" x="-284.511" y="-175.511" width="427.405" height="427.405" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="64" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter5_f_0_1" x="29.2722" y="-122.289" width="262.749" height="266.204" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter6_f_0_1" x="60.519" y="-86.6069" width="277.821" height="281.722" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter7_f_0_1" x="-20.0115" y="71.2083" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter8_f_0_1" x="28.2847" y="58.2673" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter9_f_0_1" x="-94.1897" y="-12.4434" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter10_f_0_1" x="-45.8936" y="-25.3843" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter11_f_0_1" x="-284.511" y="-175.511" width="427.405" height="427.405" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="64" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter12_f_0_1" x="29.2722" y="-122.289" width="262.749" height="266.204" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter13_f_0_1" x="60.519" y="-86.6069" width="277.821" height="281.722" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter14_f_0_1" x="-20.0115" y="71.2083" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter15_f_0_1" x="28.2847" y="58.2673" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter16_f_0_1" x="-94.1897" y="-12.4434" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter17_f_0_1" x="-45.8936" y="-25.3843" width="298.905" height="297.173" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter18_f_0_1" x="-284.511" y="-175.511" width="427.405" height="427.405" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="64" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter19_f_0_1" x="29.2722" y="-122.289" width="262.749" height="266.204" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
        <filter id="filter20_f_0_1" x="60.519" y="-86.6069" width="277.821" height="281.722" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
          <feFlood flood-opacity="0" result="BackgroundImageFix" />
          <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape" />
          <feGaussianBlur stdDeviation="36" result="effect1_foregroundBlur_0_1" />
        </filter>
      </defs>
    </svg>

    <button id="lovable-badge-close" style="position: absolute; top: -2px; right: 5px; cursor: pointer; font-size: 14px; color: #A1A1AA;">&times;</button>
  </a> -->
  <script>
    // Don't show the lovable-badge if the page is in an iframe or if it's being rendered by puppeteer (screenshot service)
    if (navigator.userAgent.includes('puppeteer')) {
      // the page is in an iframe
      var badge = document.getElementById('lovable-badge');
      if (badge) {
        badge.style.display = 'none';
      }
    }

    // Add click event listener to close button
    var closeButton = document.getElementById('lovable-badge-close');
    if (closeButton) {
      closeButton.addEventListener('click', function(event) {
        event.preventDefault();
        event.stopPropagation();
        var badge = document.getElementById('lovable-badge');
        if (badge) {
          badge.style.display = 'none';
        }
      });
    }
  </script>
</body>

</html>