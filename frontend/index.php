<?php
  include 'configs.php';

  $usdAmount = 99;
  $usdAmount2 = 70;
  $usdAmount3 = 50;

  // Fetch exchange rate from exchangerate.host
  $response = file_get_contents("https://api.exchangerate.host/latest?base=USD&symbols=NGN");
  $data = json_decode($response, true);

  // Use fallback rate in case the API fails
  $exchangeRate = $data && isset($data['rates']['NGN']) ? $data['rates']['NGN'] : 1500;

  $ngnAmount = $usdAmount * $exchangeRate;
  $ngnAmount2 = $usdAmount2 * $exchangeRate;
  $ngnAmount3 = $usdAmount3 * $exchangeRate;

  $amountInKobo = round($ngnAmount * 100); // Paystack expects amount in kobo
  $amountInKobo2 = round($ngnAmount2 * 100); // Paystack expects amount in kobo
  $amountInKobo3 = round($ngnAmount3 * 100); // Paystack expects amount in kobo
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>EddyChuks University</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link rel="icon" type="image/png" href="assets/img/favicon-96x96.png" sizes="96x96">
  <link rel="icon" type="image/svg+xml" href="assets/img/favicon.svg">
  <link rel="shortcut icon" href="assets/img/favicon.ico">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
  <meta name="apple-mobile-web-app-title" content="EddyChuks">
  <link rel="manifest" href="assets/img/site.webmanifest">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .level {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.qa {
    margin: 5px 0;
}

.question {
    width: 100%;
    text-align: left;
    background-color: #2c7a5a;
    color: #fff;
    border: none;
    padding: 10px;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 4px;
    outline: none;
    transition: background-color 0.3s;
}

.question:hover {
    background-color: #51ad87;
}

.answer {
    display: none;
    background-color: #eef7ff; 
    padding: 10px;
    margin-top: 5px;
    border-radius: 4px;
    font-size: 0.9rem;
    color: #333;
}

.answer.active {
    display: block;
}

.download-link {
    display: inline-block;
    margin-top: 15px;
    padding: 10px 20px;
    background-color: #2c7a5a; 
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    font-size: 1rem;
    transition: background-color 0.3s;
}

.download-link:hover {
    background-color: #51ad87;
    color: #ccc;
}

    .enroll-link {
      display: inline-block;
      text-decoration: none;
      background-color: #2c7a5a;
      color: white;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .enroll-link:hover {
      background-color: #2c7a5a;
    }

    <style>
    :root {
      --accent-color: #2c7a5a;
      --surface-color: #ffffff;
      --default-color: #333333;
      --contrast-color: #ffffff;
    }

    .php-email-form .error-message {
      display: none;
      background:rgb(129, 127, 127);
      color: #ffffff;
      padding: 15px;
      margin-bottom: 24px;
      font-weight: 600;
    }

    .php-email-form .sent-message {
      display: none;
      background: #2c7a5a;
      color: #ffffff;
      text-align: center;
      padding: 15px;
      margin-bottom: 24px;
      font-weight: 600;
    }

    .php-email-form .loading {
      display: none;
      background: var(--surface-color);
      text-align: center;
      padding: 15px;
      margin-bottom: 24px;
    }

    .php-email-form .loading:before {
      content: "";
      display: inline-block;
      border-radius: 50%;
      width: 24px;
      height: 24px;
      margin: 0 10px -6px 0;
      border: 3px solid var(--accent-color);
      border-top-color: var(--surface-color);
      animation: spin 1s linear infinite;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .contact .php-email-form {
      background-color: var(--surface-color);
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
      padding: 30px;
    }

    .php-email-form input,
    .php-email-form textarea {
      font-size: 14px;
      padding: 10px 15px;
      border-radius: 0;
      color: var(--default-color);
      background-color: var(--surface-color);
      border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .php-email-form input:focus,
    .php-email-form textarea:focus {
      border-color: var(--accent-color);
    }

    .php-email-form button[type=submit] {
      color: var(--contrast-color);
      background: var(--accent-color);
      border: 0;
      padding: 10px 30px;
      transition: 0.4s;
      border-radius: 50px;
    }

    .php-email-form button[type=submit]:hover {
      background:#2c7a5a;
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        
        <h1 class="sitename">EddyChuks</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Highlight</a></li>
          <li><a href="#features">Courses</a></li>
          <li><a href="#team">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="cta-btn" href="https://youtube.com/@eddy-chuks?si=ZXpuoQfDVpYOxOdK">Join the community</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="assets/img/forex1.jpg" alt="" data-aos="fade-in">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">WELCOME TO EDDYCHUKS UNIVERSITY</h2>
        <p data-aos="fade-up" data-aos-delay="200">A vibrant hub for Traders and Entrepreneur worldwide! </p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          <a href="https://youtube.com/@eddy-chuks?si=ZXpuoQfDVpYOxOdK" class="btn-get-started">Join the Community</a>
          <a href="https://youtu.be/57pAMSHDnp8?si=bx62fidvhyeBMFRn" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Benefits of Joining EddyChuks University</h3>
            <img src="assets/img/forex2.jpeg" class="img-fluid rounded-4 mb-4" alt="">
            <p>EddyChuks University is a premier institution dedicated to empowering individuals with the knowledge and skils necessary to excel in the dynamic world of forex trading.
            <p>With a community dedicated to fostering growth, sharing insights and exploring new opportunities in international markets, 
              join us to connect, collaborate and thrive in the dynamic world of global trade. By enrolling at EddyChuks University, you are investing in a future where
               you can confidently navigate the forex market, make informed trading decisions and achieve your financial goals. Our commitment to excellence ensures that 
               you recieve the highest quality education and mentorship, setting you on the path to success in forex trading.
            </p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Comprehensive Forex Trading Courses: Our Curriculum covers all aspects of forex trading, from foundational concepts to advanced strategies, ensuring a well-rounded education for traders at all levels.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Practical Experience: Engage in hands-on trading stimulations and real-world scenarios to apply theoretical knowledge, enhancing your decision-making skills and market understanding.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Community Support: Join a vibrant community of like-minded traders, fostering collaboration, networking and shared learning experiences.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Flexible Learning Options: Access our resources and mentorship programs online, allowing you to learn at your own pace and convenience.</span></li>
              </ul>
              <a href="#features" class="enroll-link">Enroll Now</a>

              <div class="position-relative mt-4">
                <img src="assets/img/youtube1.png" class="img-fluid rounded-4" alt="">
                <a href="https://youtu.be/k_X2pr_IjZU?si=V4MRaD6rg_2aVDri" class="glightbox pulsating-play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    <!-- Stats Section -->
    <section id="stats" class="stats section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="1" class="purecounter"></span>
                <p>People in Community</p>
              </div>
            </div>
          </div> 
          <!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="330" data-purecounter-duration="1" class="purecounter"></span>
                <p>Subscribers on Youtube</p>
              </div>
            </div>
          </div>
          <!--- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="120" data-purecounter-duration="1" class="purecounter"></span>
                <p>People learning from the university</p>
              </div>
            </div>
          </div>
          <!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="4" data-purecounter-duration="1" class="purecounter"></span>
                <p>Number of Courses</p>
              </div>
            </div>
          </div>
          <!-- End Stats Item -->

        </div>
      </div>
    </section>
  <!-- /Stats Section -->

  <!-- Features Section -->
  <section id="features" class="features section">

    <div class="container">

      <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100">
        <li class="nav-item col-3">
          <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
          <i class="bi bi-binoculars"></i>
            <h4 class="d-none d-lg-block">Beginner Level: Foundations of Forex Trading</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
            <h4 class="d-none d-lg-block">Intermediate Level: Technical & Fundamental Analysis</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
            <h4 class="d-none d-lg-block">Advanced Level: Strategy & Market Psychology</h4>
          </a>
        </li>
        <li class="nav-item col-3">
          <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-4">
            <h4 class="d-none d-lg-block">FAQ</h4>
            <i class="bi bi-question"></i>
          </a>
        </li>
      </ul>
      <!-- End Tab Nav-->

      <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

        <div class="tab-pane fade active show" id="features-tab-1">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Beginner Level: Foundations of Forex Trading</h3>
              <p class="fst-italic">
                People all around the world are engaging in trading activities in Forex, the largest financial arena of all times. This course is designed for beginners and includes all the necessary information and tools required before starting in the Forex trading business.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i>
                  <span>Learn Forex Basics: Gain a clear understanding of forex concepts and role of forex in the global world.</span>
                </li>
                <li><i class="bi bi-check2-all"></i> <span>Trading Platforms: Understand how to place trades, set stop-loss and take-profit levels, and use tools for analysis.</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Market Structure: Develop an understanding of market trends and analyze price charts to identify trading opportunities.</span></li>
              </ul>
              <p>
                <a href="#" style="background-color:#2c7a5a;color:white;padding:10px;border-radius:5px;" data-bs-toggle="modal" data-bs-target="#paymentModal">
                  Book a Session <i class="bi bi-link-45deg"></i>
                </a>
              </p>
              
              <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3">
                        <div class="modal-header border-bottom">
                            <h5 class="modal-title text-uppercase fw-bold" id="modalTitle">Enroll in a Course - Begineer Level</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="paymentForm">
                                <div class="mb-3">
                                    <label class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label">Course:</label>
                                  <p class="form-control-plaintext">
                                  Beginner Level – $<?php echo $usdAmount; ?> (~₦<?php echo number_format($ngnAmount); ?>)
                                  </p>
                                  <small class="text-muted">You will be charged in Naira. International cards are accepted.</small>
                                </div>
                                
                                <button type="submit" class="btn btn-dark w-100" id="payNow">Pay Now</button>
                              </form>
                        </div>
                    </div>
                </div>
              </div>
              
          </div>

            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/beginner.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div><!-- End Tab Content Item -->

        <div class="tab-pane fade" id="features-tab-2">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Intermediate Level: Technical & Fundamental Analysis</h3>
              <p class="fst-italic">
                Take your Forex trading skills to the next level with this intermediate course, focusing on in-depth technical and fundamental analysis. Designed for those with basic knowledge, this course helps you refine your strategies and make informed trading decisions.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> <span>Master Chart Patterns: Learn how these patterns signal potential market movements.</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Indicators and Economic Events: Analyze the impact of economic events, news releases, and central bank policies on currency markets.</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Risk Management: Master risk management techniques to protect your capital and maximize profits.</span></li>
              </ul>
              <p>
                <a href="#" style="background-color:#2c7a5a; color:white; padding:10px; border-radius:5px;" data-bs-toggle="modal" data-bs-target="#intermediatePaymentModal">
                  Book a Session <i class="bi bi-link-45deg"></i>
                </a>
              </p>
            
              <!-- Payment Modal for Intermediate Level -->
              <div class="modal fade" id="intermediatePaymentModal" tabindex="-1" aria-labelledby="intermediateModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content p-3">
                    <div class="modal-header border-bottom">
                      <h5 class="modal-title text-uppercase fw-bold" id="intermediateModalTitle">Enroll in a Course - Intermediate Level</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="InterpaymentForm">
                          <div class="mb-3">
                              <label class="form-label">Email:</label>
                              <input type="email" class="form-control" id="interemail" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Course:</label>
                            <p class="form-control-plaintext">
                            Intermediate Level – $<?php echo $usdAmount2; ?> (~₦<?php echo number_format($ngnAmount2); ?>)
                            </p>
                            <small class="text-muted">You will be charged in Naira. International cards are accepted.</small>
                          </div>
                          
                          <button type="submit" class="btn btn-dark w-100" id="payNow">Pay Now</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>

            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/intermediate.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div><!-- End Tab Content Item -->

        <div class="tab-pane fade" id="features-tab-3">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>Advanced Level: Strategy and Market Psychology</h3>
              <p class="fst-italic">
                Elevate your trading prowess with this advanced-level course designed to refine your expertise and enhance your decision-making in the Forex market. Tailored for experienced traders, this program dives into sophisticated strategies and psychological insights to optimize performance.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> <span>Expert-Level Insights: Master smart money concepts to follow institutional trading patterns.</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Develop Custom strategies: Learn to craft personalized trading strategies based on market conditions and objectives.</span></li>
                <li><i class="bi bi-check2-all"></i> <span>Advanced risk techniques: Gain insights into the psychological aspects that influence trading behaviors and market movements.</span></li>
              </ul>
              <p>
                <a href="#" style="background-color:#2c7a5a; color:white; padding:10px; border-radius:5px;" data-bs-toggle="modal" data-bs-target="#advancedPaymentModal">
                  Book a Session <i class="bi bi-link-45deg"></i>
                </a>
              </p>
            
              <!-- Payment Modal for Advanced Level -->
              <div class="modal fade" id="advancedPaymentModal" tabindex="-1" aria-labelledby="advancedModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content p-3">
                    <div class="modal-header border-bottom">
                      <h5 class="modal-title text-uppercase fw-bold" id="advancedModalTitle">Enroll in a Course - Advanced Level</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                      <div class="modal-body">
                        <form id="AdvapaymentForm">
                          <div class="mb-3">
                              <label class="form-label">Email:</label>
                              <input type="email" class="form-control" id="advaemail" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label">Course:</label>
                            <p class="form-control-plaintext">
                            Advanced Level – $<?php echo $usdAmount3; ?> (~₦<?php echo number_format($ngnAmount3); ?>)
                            </p>
                            <small class="text-muted">You will be charged in Naira. International cards are accepted.</small>
                          </div>
                          
                          <button type="submit" class="btn btn-dark w-100" id="payNow">Pay Now</button>
                        </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/Advanced.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div><!-- End Tab Content Item -->

        <div class="tab-pane fade" id="features-tab-4">
          <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
              <h3>FAQ</h3>
              <p>
                Frequently Asked Questions
              </p>
              <section class="level" id="beginner">
                <div class="qa">
                    <button class="question">What are the basics of Forex trading?</button>
                    <div class="answer">Forex trading involves trading currency pairs, understanding pips, spreads, and leverage, and navigating trading platforms like MetaTrader 4 and 5.</div>
                </div>
                <div class="qa">
                    <button class="question">How do I analyze the market structure?</button>
                    <div class="answer">Market structure analysis involves understanding trends, patterns, and key drivers to identify trading opportunities.</div>
                </div>
                <div class="qa">
                    <button class="question">How do chart patterns help in trading?</button>
                    <div class="answer">Chart patterns like head and shoulders and flags signal potential market movements.</div>
                </div>            
                <div class="qa">
                    <button class="question">How do I manage emotions while trading?</button>
                    <div class="answer">Managing emotions involves maintaining discipline, understanding psychological factors, and following a structured strategy.</div>
                </div>
                <!-- <div class="row">
                  <div class="col-4">
                    <a href="beginner-guide.pdf" download class="download-link">Download Beginner's Guide</a>
                  </div>
                  <div class="col-4">
                    <a href="intermediate-guide.pdf" download class="download-link">Download Intermediate Guide</a>
                  </div>
                  <div class="col-4">
                    <a href="advanced-guide.pdf" download class="download-link">Download Advanced Guide</a>
                  </div>
                </div> -->
            </section>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
              <img src="assets/img/faq.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div><!-- End Tab Content Item -->

      </div>

    </div>

  </section>
  
    <!-- Team Section -->
    <section id="team" class="team section light-background">
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>WHO IS EDDYCHUKS</p>
      </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
          <p>
            Eddy Chuks is a professional trader and one of the founders of the platform “Eddychuks University” that believes each individual can be imparted with trading skills. Skills to learn from eddychuks university:
          <ul>
            <li style="list-style: none;"><i class="bi bi-check2-circle"></i> <span>In-depth Forex tutorials for beginners and advanced traders.</span></li>
            <li style="list-style: none;"><i class="bi bi-check2-circle"></i> <span>Live trading sessions and market analysis.</span></li>
            <li style="list-style: none;"><i class="bi bi-check2-circle"></i> <span>Insights into the latest market trends and news.</span></li>
          </ul>
        </div>

        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
          <p>
            With an eye on the latest market trends and news, Eddy keeps his community informed and prepared for opportunities in the ever-evolving Forex landscape. As a mentor and educator, Eddy Chuks is not just teaching Forex trading but inspiring a journey towards financial independence and mastery in the global financial market.
          </p>
          <a href="https://youtube.com/@eddy-chuks?si=ZXpuoQfDVpYOxOdK"><i class="bi bi-youtube"></i>Youtube​</a>

        </div>

      </div>

    </div>

  </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>
          REACH OUT TO EDDYCHUKS
        </p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Thinkers' Corner, Emene, Enugu</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>08176242037</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>eddychuksuniversity@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-6">
          <form action="contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
          <div class="row gy-4">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control" placeholder="Your Email" required>
            </div>
            <div class="col-md-12">
              <input type="text" name="subject" class="form-control" placeholder="Subject" required>
            </div>
            <div class="col-md-12">
              <textarea name="message" class="form-control" rows="4" placeholder="Message" required></textarea>
            </div>
            <div class="col-md-12 text-center">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
              <button type="submit">Send Message</button>
            </div>
          </div>
        </form>
          </div><!-- End Contact Form -->
        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">EddyChuks</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Thinkers' Corner</p>
            <p>Emene, Enugu</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+234 8176242037</span></p>
            <p><strong>Email:</strong> <span>eddychuksuniversity@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href="https://x.com/Eddychuk..."><i class="bi bi-twitter-x"></i>​</a>
            <a href="https://www.facebook.com/people/Edwin-Chukwu/pfbid02B1HtzVj7fyH3kTu46Vn8QJp9qSTt7MH51XLr9nZTgrXRWkn9dFkW3QPHCfnuQSvjl/?rdid=Rrcgqbo5JIxL1fM3&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F1E6RfcLcnM%2F"><i class="bi bi-facebook"></i>​</a>
            <a href="https://www.instagram.com/eddychuks_univerisity/profilecard/?igsh=bmlqeHFhY2Q1NGZm"><i class="bi bi-instagram"></i></a>
            <a href="https://t.me/Eddychuksuni"><i class="bi bi-telegram"></i>​</a>
          </div>
        </div>

        <div class="col-lg-4 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#hero">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#about">Highlight</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#features">Courses</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#team">About</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#contact">Contact</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-3 footer-links">
          <h4>Join the community</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i><a href="https://youtube.com/@eddy-chuks?si=ZXpuoQfDVpYOxOdK"><i class="bi bi-youtube"></i>Youtube​</a>
            </li>
            <li><i class="bi bi-chevron-right"></i><a href="https://chat.whatsapp.com/FapQkECdN0MJ2ofDARZMG3"><i class="bi bi-whatsapp"></i>Whatsapp</a>
          </ul>
        </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">EddyChuks</strong> <span>All Rights Reserved</span></p>
      <p><span>Developed</span> By <strong class="px-1 sitename">Idoko Loveth</strong></p>
      <div class="credits">
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>


<script src="https://js.paystack.co/v1/inline.js"></script>

<script>
  document.getElementById("paymentForm").addEventListener("submit", payWithPaystack);

  function payWithPaystack(e) {
    e.preventDefault();

    const email = document.getElementById("email").value;
    if (!email) {
      alert("Please enter your email.");
      return;
    }

    let handler = PaystackPop.setup({
      key: "<?php echo $PublicKey; ?>",
      email: email,
      amount: <?php echo $amountInKobo; ?>, // Naira * 100
      currency: "NGN",
      ref: 'PSK_' + Math.floor(Math.random() * 1000000000 + 1),
      callback: function(response) {
        alert('Payment complete! Reference: ' + response.reference);
        window.location.href = "http://localhost/eddyy/verify_transaction.php?reference=" + response.reference;
      },
      onClose: function() {
        alert('Transaction was not completed, window closed.');
      }
    });

    handler.openIframe();
  }
</script>

<!-- Intermediate level -->
<script>
  document.getElementById("InterpaymentForm").addEventListener("submit", payWithPaystack);

  function payWithPaystack(e) {
    e.preventDefault();

    const email = document.getElementById("interemail").value;
    if (!email) {
      alert("Please enter your email.");
      return;
    }

    let handler = PaystackPop.setup({
      key: "<?php echo $PublicKey; ?>",
      email: email,
      amount: <?php echo $amountInKobo2; ?>, // Naira * 100
      currency: "NGN",
      ref: 'PSK_' + Math.floor(Math.random() * 1000000000 + 1),
      callback: function(response) {
        alert('Payment complete! Reference: ' + response.reference);
        window.location.href = "http://localhost/eddyy/verify_transaction2.php?reference=" + response.reference;
      },
      onClose: function() {
        alert('Transaction was not completed, window closed.');
      }
    });

    handler.openIframe();
  }
</script>

<!-- Advanced Level -->
<script>
  document.getElementById("AdvapaymentForm").addEventListener("submit", payWithPaystack);

  function payWithPaystack(e) {
    e.preventDefault();

    const email = document.getElementById("advaemail").value;
    if (!email) {
      alert("Please enter your email.");
      return;
    }

    let handler = PaystackPop.setup({
      key: "<?php echo $PublicKey; ?>",
      email: email,
      amount: <?php echo $amountInKobo3; ?>, // Naira * 100
      currency: "NGN",
      ref: 'PSK_' + Math.floor(Math.random() * 1000000000 + 1),
      callback: function(response) {
        alert('Payment complete! Reference: ' + response.reference);
        window.location.href = "http://localhost/eddyy/verify_transaction3.php?reference=" + response.reference;
      },
      onClose: function() {
        alert('Transaction was not completed, window closed.');
      }
    });

    handler.openIframe();
  }
</script>


  <script>
    document.querySelectorAll('.question').forEach(button => {
        button.addEventListener('click', () => {
            let answer = button.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
  </script>

</body>
</html>