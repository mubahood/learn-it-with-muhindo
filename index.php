<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn it with Muhindo Academy - Learn Programming with AI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.5;
            color: #000;
            overflow-x: hidden;
        }

        :root {
            --black: #000;
            --white: #fff;
            --gray-light: #f5f5f5;
            --gray-border: #ddd;
            --gray-text: #666;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
        }

        /* Navigation */
        .navbar {
            background: var(--white) !important;
            box-shadow: 0 1px 0 var(--gray-border);
            padding: 0.5rem 0;
        }

        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.3rem;
            color: var(--black) !important;
        }

        .navbar-toggler {
            border: none !important;
            padding: 0.5rem;
            box-shadow: none !important;
        }

        .navbar-toggler:focus {
            outline: none;
            box-shadow: none !important;
        }

        .navbar-toggler-icon {
            background-image: none !important;
            width: 30px;
            height: 2px;
            background-color: var(--black);
            display: block;
            position: relative;
            transition: all 0.3s;
        }

        .navbar-toggler-icon::before,
        .navbar-toggler-icon::after {
            content: '';
            width: 30px;
            height: 2px;
            background-color: var(--black);
            display: block;
            position: absolute;
            transition: all 0.3s;
        }

        .navbar-toggler-icon::before {
            top: -8px;
        }

        .navbar-toggler-icon::after {
            top: 8px;
        }

        .nav-link {
            font-weight: 500;
            color: var(--black) !important;
            margin: 0 0.3rem;
            padding: 0.5rem 0.8rem !important;
            transition: background 0.2s;
        }

        .nav-link:hover {
            background: var(--gray-light);
        }

        .btn-enroll {
            background: var(--black);
            border: 2px solid var(--black);
            padding: 0.5rem 1.2rem;
            color: white;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-enroll:hover {
            background: var(--white);
            color: var(--black);
        }

        /* Hero Section */
        #hero {
            background: var(--black);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 60px;
        }

        .hero-content {
            color: white;
        }

        .hero-content h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: left;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
        }

        /* Section Styling */
        section {
            padding: 3rem 0;
        }

        .section-title {
            margin-bottom: 2rem;
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--black);
            margin-bottom: 0.5rem;
        }

        .section-title p {
            font-size: 1rem;
            color: var(--gray-text);
            max-width: 700px;
        }

        /* Courses Section */
        #courses {
            background: var(--white);
        }

        .course-card {
            background: white;
            border: 2px solid var(--black);
            padding: 1.5rem;
            transition: all 0.2s;
            height: 100%;
        }

        .course-card:hover {
            background: var(--black);
            color: var(--white);
        }

        .course-card:hover h3,
        .course-card:hover .course-topics li,
        .course-card:hover .price-tag {
            color: var(--white);
        }

        .course-card:hover .course-topics li i {
            color: var(--white);
        }

        .course-card:hover .btn-enroll {
            background: var(--white);
            color: var(--black);
            border-color: var(--white);
        }

        .course-icon {
            width: 50px;
            height: 50px;
            background: var(--black);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--white);
        }

        .course-card:hover .course-icon {
            background: var(--white);
            color: var(--black);
        }

        .course-card h3 {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: var(--black);
        }

        .course-card .course-topics {
            list-style: none;
            padding: 0;
            margin: 1rem 0;
        }

        .course-card .course-topics li {
            padding: 0.3rem 0;
            color: var(--gray-text);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .course-card .course-topics li i {
            color: var(--black);
            font-size: 0.7rem;
        }

        .course-price {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-border);
        }

        .course-card:hover .course-price {
            border-top-color: #333;
        }

        .price-tag {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--black);
        }

        .price-sub {
            font-size: 0.85rem;
            color: var(--gray-text);
            display: block;
        }

        /* About/Instructor Section */
        #about {
            background: var(--gray-light);
        }

        .instructor-card {
            background: var(--black);
            padding: 2rem;
            color: white;
        }

        .instructor-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .instructor-title {
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }

        .skills-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .skill-item {
            background: rgba(255,255,255,0.1);
            padding: 0.7rem;
            border: 1px solid rgba(255,255,255,0.2);
            font-size: 0.9rem;
        }

        .skill-item i {
            margin-right: 0.5rem;
        }

        .experience-section {
            background: rgba(255,255,255,0.05);
            padding: 1.5rem;
            border: 1px solid rgba(255,255,255,0.1);
            margin-top: 1.5rem;
        }

        .experience-section h4 {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .experience-list {
            list-style: none;
            padding: 0;
        }

        .experience-list .mb-3 {
            padding: 0.7rem 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
        }

        .experience-list .mb-3:last-child {
            border-bottom: none;
        }

        .experience-list strong {
            display: block;
            margin-bottom: 0.2rem;
        }

        /* Features Section */
        #features {
            background: var(--white);
        }

        .feature-card {
            text-align: center;
            padding: 1.5rem;
            border: 2px solid var(--black);
            transition: all 0.2s;
        }

        .feature-card:hover {
            background: var(--black);
            color: var(--white);
        }

        .feature-card:hover h4 {
            color: var(--white);
        }

        .feature-card:hover .feature-icon {
            background: var(--white);
            color: var(--black);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 1rem;
            background: var(--black);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .feature-card h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--black);
        }

        .feature-card p {
            color: var(--gray-text);
            font-size: 0.9rem;
            margin: 0;
        }

        .feature-card:hover p {
            color: rgba(255,255,255,0.9);
        }

        /* Contact Section */
        #contact {
            background: var(--gray-light);
        }

        .contact-card {
            background: var(--white);
            border: 2px solid var(--black);
            padding: 2rem;
        }

        .contact-info {
            margin-bottom: 1.5rem;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.8rem;
            background: var(--gray-light);
            margin-bottom: 0.5rem;
        }

        .contact-item i {
            width: 35px;
            height: 35px;
            background: var(--black);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
        }

        .contact-form .form-control {
            border: 2px solid var(--black);
            padding: 0.7rem;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .contact-form .form-control:focus {
            border-color: var(--black);
            box-shadow: none;
            outline: none;
        }

        .btn-submit {
            background: var(--black);
            border: 2px solid var(--black);
            padding: 0.8rem 1.5rem;
            color: white;
            font-weight: 600;
            width: 100%;
            transition: all 0.2s;
        }

        .btn-submit:hover {
            background: var(--white);
            color: var(--black);
        }

        /* Footer */
        footer {
            background: var(--black);
            color: white;
            padding: 1.5rem 0;
            text-align: center;
        }

        footer a {
            color: white;
            transition: opacity 0.2s;
        }

        footer a:hover {
            opacity: 0.7;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .hero-stats {
                gap: 1.5rem;
            }

            .section-title h2 {
                font-size: 1.6rem;
            }

            .skills-list {
                grid-template-columns: 1fr;
            }

            .navbar-brand {
                font-size: 1.1rem;
            }
        }

        /* Badge/Tag Styles */
        .badge-custom {
            background: var(--black);
            color: var(--white);
            padding: 0.3rem 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 0.5rem;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }

        .course-card:hover .badge-custom {
            background: var(--white);
            color: var(--black);
        }

        .course-duration {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--gray-text);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .course-card:hover .course-duration {
            color: rgba(255,255,255,0.9);
        }

        .course-card:hover .price-sub {
            color: rgba(255,255,255,0.7);
        }

        /* Remove all rounded corners */
        .navbar,
        .btn-enroll,
        .course-card,
        .course-icon,
        .feature-card,
        .feature-icon,
        .contact-card,
        .contact-item,
        .contact-item i,
        .form-control,
        .btn-submit,
        .skill-item,
        .experience-section,
        .badge-custom,
        .instructor-card {
            border-radius: 0 !important;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#hero">
                Learn it with Muhindo
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#hero">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#courses">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Instructor</a></li>
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item"><a class="btn btn-enroll ms-3" href="#contact">Enroll Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="hero-content">
                        <h1>Master <span class="highlight">Programming with AI</span> This Holiday Season</h1>
                        <p>Join Learn it with Muhindo Academy and transform your career with cutting-edge courses in Web Design, Web Development, and Mobile App Development.</p>
                        <a href="#courses" class="btn btn-enroll btn-lg">
                            Explore Courses
                        </a>
                        <div class="hero-stats">
                            <div class="stat-item">
                                <span class="stat-number">6</span>
                                <span class="stat-label">Weeks Duration</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">3</span>
                                <span class="stat-label">Professional Courses</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">100%</span>
                                <span class="stat-label">Online Learning</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="text-center">
                        <i class="fas fa-laptop-code" style="font-size: 15rem; opacity: 0.2;"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section id="courses">
        <div class="container">
            <div class="section-title">
                <h2>Our Professional Courses!</h2>
                <p>Choose from our comprehensive programs designed to make you job-ready</p>
            </div>

            <!-- Course Introduction Video -->
            <div class="row mb-5">
                <div class="col-12">
                    <div style="background: var(--black); padding: 2rem; margin-bottom: 2rem;">
                        <h3 style="color: var(--white); margin-bottom: 1.5rem; text-align: center;">Course Introduction</h3>
                        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000;">
                            <iframe 
                                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;"
                                src="https://www.youtube.com/embed/0MLfJ3fKGgs" 
                                title="Course Introduction Video" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <!-- Course 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <div class="course-icon">
                            <i class="fas fa-palette"></i>
                        </div>
                        <span class="badge-custom">BEGINNER FRIENDLY</span>
                        <h3>Web Design</h3>
                        <div class="course-duration">
                            <i class="fas fa-clock"></i>
                            <span>6 Weeks • Online</span>
                        </div>
                        <ul class="course-topics">
                            <li><i class="fas fa-check-circle"></i> HTML & CSS Fundamentals</li>
                            <li><i class="fas fa-check-circle"></i> Bootstrap Framework</li>
                            <li><i class="fas fa-check-circle"></i> JavaScript Basics</li>
                            <li><i class="fas fa-check-circle"></i> Responsive Design</li>
                            <li><i class="fas fa-check-circle"></i> Final Project Portfolio</li>
                        </ul>
                        <div class="course-price">
                            <div>
                                <span class="price-tag">$100</span>
                                <span class="price-sub">UGX 300,000</span>
                            </div>
                            <a href="#contact" class="btn btn-enroll">Enroll Now</a>
                        </div>
                    </div>
                </div>

                <!-- Course 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <div class="course-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <span class="badge-custom">INTERMEDIATE</span>
                        <h3>Web System Development</h3>
                        <div class="course-duration">
                            <i class="fas fa-clock"></i>
                            <span>6 Weeks • Online</span>
                        </div>
                        <ul class="course-topics">
                            <li><i class="fas fa-check-circle"></i> PHP Programming</li>
                            <li><i class="fas fa-check-circle"></i> MySQL Database</li>
                            <li><i class="fas fa-check-circle"></i> Laravel Framework</li>
                            <li><i class="fas fa-check-circle"></i> Backend Development</li>
                            <li><i class="fas fa-check-circle"></i> Complete Web System Project</li>
                        </ul>
                        <div class="course-price">
                            <div>
                                <span class="price-tag">$120</span>
                                <span class="price-sub">UGX 400,000</span>
                            </div>
                            <a href="#contact" class="btn btn-enroll">Enroll Now</a>
                        </div>
                    </div>
                </div>

                <!-- Course 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="course-card">
                        <div class="course-icon">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <span class="badge-custom">ADVANCED</span>
                        <h3>Mobile App Development</h3>
                        <div class="course-duration">
                            <i class="fas fa-clock"></i>
                            <span>6 Weeks • Online</span>
                        </div>
                        <ul class="course-topics">
                            <li><i class="fas fa-check-circle"></i> Dart Programming</li>
                            <li><i class="fas fa-check-circle"></i> Flutter Framework</li>
                            <li><i class="fas fa-check-circle"></i> UI/UX Design for Mobile</li>
                            <li><i class="fas fa-check-circle"></i> Firebase Integration</li>
                            <li><i class="fas fa-check-circle"></i> Complete Mobile App Project</li>
                        </ul>
                        <div class="course-price">
                            <div>
                                <span class="price-tag">$130</span>
                                <span class="price-sub">UGX 350,000</span>
                            </div>
                            <a href="#contact" class="btn btn-enroll">Enroll Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Us?</h2>
                <p>Get the best learning experience with industry-standard practices</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <h4>Online Learning</h4>
                        <p>Learn via Zoom, Google Meet, and pre-recorded videos</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h4>Certificate</h4>
                        <p>Receive a certificate of completion after finishing</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-wallet"></i>
                        </div>
                        <h4>Flexible Payment</h4>
                        <p>Pay 50% upfront and the rest during the course</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-project-diagram"></i>
                        </div>
                        <h4>Real Projects</h4>
                        <p>Build actual projects to showcase in your portfolio</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About/Instructor Section -->
    <section id="about">
        <div class="container">
            <div class="section-title">
                <h2>Meet Your Instructor</h2>
                <p>Learn from an experienced full-stack developer with 8+ years of industry experience</p>
            </div>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="instructor-card">
                        <h3>Muhindo Mubarak</h3>
                        <p class="instructor-title">Full Stack Developer | Lead Developer at Eight Tech Consults Ltd</p>
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h4>Education</h4>
                                <ul style="list-style: none; padding-left: 0;">
                                    <li>• Masters in Computer Science (Ongoing) - Makerere University</li>
                                    <li>• Bachelor of Computer Science - Islamic University of Technology</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>Experience</h4>
                                <ul style="list-style: none; padding-left: 0;">
                                    <li>• 8+ Years Professional Development</li>
                                    <li>• Lead Developer - 14+ Major Projects</li>
                                    <li>• YouTube Educator - "Learn it with Muhindo"</li>
                                </ul>
                            </div>
                        </div>

                        <h4 class="mb-3">Technical Expertise</h4>
                        <div class="skills-list">
                            <div class="skill-item">
                                PHP, Laravel, Python Django
                            </div>
                            <div class="skill-item">
                                React.js, Vue.js, JavaScript
                            </div>
                            <div class="skill-item">
                                Flutter, Dart, Mobile Development
                            </div>
                            <div class="skill-item">
                                MySQL, Firebase, Database Design
                            </div>
                            <div class="skill-item">
                                HTML, CSS, Bootstrap, UI/UX
                            </div>
                            <div class="skill-item">
                                WordPress Development
                            </div>
                        </div>

                        <div class="experience-section">
                            <h4>Notable Projects</h4>
                            <div class="experience-list">
                                <div class="mb-3">
                                    <strong>School Dynamics</strong> - Complete school management system (Web & Mobile)
                                </div>
                                <div class="mb-3">
                                    <strong>Uganda Livestock System</strong> - Comprehensive livestock management platform
                                </div>
                                <div class="mb-3">
                                    <strong>Hospital Management System</strong> - Full-featured healthcare solution
                                </div>
                                <div class="mb-3">
                                    <strong>E-commerce Platforms</strong> - Multiple online store solutions
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="section-title">
                <h2>Enroll Now</h2>
                <p>Ready to start your programming journey? Get in touch with us today!</p>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="contact-card">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h4 class="mb-3">Contact Information</h4>
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <div>
                                        <strong>Email</strong>
                                        <p class="mb-0">muhindo@8technologies.net</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <div>
                                        <strong>Phone</strong>
                                        <p class="mb-0">+256 783 204665</p>
                                        <p class="mb-0">+256 706 638484</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div>
                                        <strong>Location</strong>
                                        <p class="mb-0">Kampala, Uganda</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fab fa-youtube"></i>
                                    <div>
                                        <strong>YouTube Channel</strong>
                                        <p class="mb-0">Learn it with Muhindo</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-3">Send a Message</h4>
                                <div id="enrollmentAlert" style="display: none; padding: 1rem; margin-bottom: 1rem; border: 2px solid #000;"></div>
                                <form class="contact-form" id="enrollForm">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone Number" required>
                                    <select class="form-control" name="course" id="course" required>
                                        <option value="">Select Course</option>
                                        <option value="web-design">Web Design ($100)</option>
                                        <option value="web-development">Web System Development ($120)</option>
                                        <option value="mobile-app">Mobile App Development ($130)</option>
                                    </select>
                                    <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message (Optional)"></textarea>
                                    <button type="submit" class="btn btn-submit" id="submitBtn">
                                        Submit Enrollment
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2025 Learn it with Muhindo Academy. All Rights Reserved.</p>
            <p>Empowering the Next Generation of Developers</p>
            <div class="mt-3">
                <a href="#" class="text-white me-3"><i class="fab fa-youtube fa-2x"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-facebook fa-2x"></i></a>
                <a href="#" class="text-white me-3"><i class="fab fa-twitter fa-2x"></i></a>
                <a href="#" class="text-white"><i class="fab fa-linkedin fa-2x"></i></a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Show enrollment alert
        function showEnrollmentAlert(result) {
            const alertDiv = document.getElementById('enrollmentAlert');
            const submitBtn = document.getElementById('submitBtn');
            
            alertDiv.textContent = result.message;
            alertDiv.style.display = 'block';
            alertDiv.style.background = result.success ? '#000' : '#fff';
            alertDiv.style.color = result.success ? '#fff' : '#000';
            alertDiv.style.borderColor = result.success ? '#000' : '#f00';
            
            // Scroll to the alert
            alertDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Hide after 10 seconds
            setTimeout(function() {
                alertDiv.style.display = 'none';
            }, 10000);

            // Reset form if successful
            if (result.success) {
                document.getElementById('enrollForm').reset();
            }
            
            // Re-enable submit button
            submitBtn.disabled = false;
            submitBtn.textContent = 'Submit Enrollment';
        }

        // Handle form submission via AJAX
        document.getElementById('enrollForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = document.getElementById('submitBtn');
            const alertDiv = document.getElementById('enrollmentAlert');
            
            // Disable submit button
            submitBtn.disabled = true;
            submitBtn.textContent = 'Submitting...';
            
            // Hide previous alert
            alertDiv.style.display = 'none';
            
            // Get form data
            const formData = new FormData();
            formData.append('action', 'enroll');
            formData.append('name', document.getElementById('name').value);
            formData.append('email', document.getElementById('email').value);
            formData.append('phone', document.getElementById('phone').value);
            formData.append('course', document.getElementById('course').value);
            formData.append('message', document.getElementById('message').value);
            
            // Send AJAX request
            fetch('enroll.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok: ' + response.status);
                }
                return response.text();
            })
            .then(text => {
                console.log('Server response:', text);
                try {
                    const data = JSON.parse(text);
                    showEnrollmentAlert(data);
                } catch (e) {
                    console.error('JSON parse error:', e);
                    console.error('Response text:', text);
                    showEnrollmentAlert({
                        success: false,
                        message: 'Server error: Invalid response format'
                    });
                }
            })
            .catch(error => {
                console.error('Fetch error:', error);
                showEnrollmentAlert({
                    success: false,
                    message: 'Connection error: ' + error.message
                });
            });
        });

        // Navbar background change on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 2px 0 #000';
            } else {
                navbar.style.boxShadow = '0 1px 0 #ddd';
            }
        });
    </script>
</body>
</html>
