<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Online Courses - Learn and Grow with Us!" />
        <meta name="author" content="" />
        <title>Educatioverse</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('img/logo75x75.ico') }}"/>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container px-4">
                <a href="/" class="d-flex navbar-brand align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                    <div style="margin-right: 10px;">
                        <img src="{{ asset('img/logo72x72.ico') }}" height="48" width="48">
                    </div>
                    <div>
                        <span class="fs-4" style="font-weight: 600; letter-spacing: 0.05em;">Educatioverse</span>
                    </div>       
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav nav-pills navbar-nav ms-auto mb-2 mb-lg-0">
                        <a href="{{route('login')}}"><button type="button" class="btn btn-outline-dark text-uppercase me-2" style="--bs-btn-font-weight: 600; letter-spacing: 0.05em;">log in</button></a>
                        <a href="{{route('register')}}"><button type="button" class="btn btn-dark text-uppercase" style="--bs-btn-font-weight: 600; letter-spacing: 0.05em;">register</button></a>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5" style="background-image: url('img/landinglogo.jpg'); background-size: cover; background-position: center;">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center my-5">
                            <h1 class="display-5 fw-bolder text-white mb-2" style="--bs-btn-font-weight: 600; letter-spacing: 0.05em;">Learn and Grow with Educatioverse</h1>
                            <p class="lead text-white-50 mb-4">Explore our wide range of online courses on various topics. Enhance your skills and knowledge!</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                                <a class="btn btn-dark btn-lg px-4 me-sm-3" href="#courses" style="font-weight: 600; letter-spacing: 0.05em;">Browse Courses</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="{{route('register')}}" style="font-weight: 600; letter-spacing: 0.05em;">Get Started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5 border-bottom" id="courses">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-dark bg-gradient text-white rounded-3 mb-3"><i class="bi bi-journal"></i></div>
                        <h2 class="h4 fw-bolder">Web Development</h2>
                        <p>Learn to build responsive and interactive websites using the latest web technologies like HTML, CSS, and JavaScript.</p>
                        <a class="text-decoration-none" href="{{ route('shop.index') }}">
                            Explore Course
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="feature bg-dark bg-gradient text-white rounded-3 mb-3"><i class="bi bi-laptop"></i></div>
                        <h2 class="h4 fw-bolder">Data Science</h2>
                        <p>Discover the power of data analysis and machine learning. Learn to work with data and extract valuable insights.</p>
                        <a class="text-decoration-none" href="{{ route('shop.index') }}">
                            Explore Course
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <div class="feature bg-dark bg-gradient text-white rounded-3 mb-3"><i class="bi bi-pencil"></i></div>
                        <h2 class="h4 fw-bolder">Graphic Design</h2>
                        <p>Unleash your creativity and learn graphic design tools and techniques to create stunning visual content.</p>
                        <a class="text-decoration-none" href="{{ route('shop.index') }}">
                            Explore Course
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing section-->
        <section class="bg-light py-5 border-bottom">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Choose Your Plan</h2>
                    <p class="lead mb-0">Select a plan that suits your learning needs</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <!-- Pricing card beginner-->
                    <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Beginner</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">$19</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <strong>Access to 5 Courses</strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Certificate of Completion
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Access to Downloadable Resources
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Personalized Instructor Support
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Access to Premium Community
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Live Webinars
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Assignments and Quizzes
                                    </li>
                                    <li class="text-muted">
                                        <i class="bi bi-x"></i>
                                        Course Discussion Forums
                                    </li>
                                </ul>
                                <div class="d-grid"><a class="btn btn-outline-dark" href="#!">Get Started</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing card advanced-->
                    <div class="col-lg-4">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    Advanced
                                </div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">$49</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <strong>Access to 15 Courses</strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Certificate of Completion
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Access to Downloadable Resources
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Personalized Instructor Support
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Access to Premium Community
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Live Webinars
                                    </li>
                                    <li class="mb-2 text-muted">
                                        <i class="bi bi-x"></i>
                                        Assignments and Quizzes
                                    </li>
                                    <li class="text-muted">
                                        <i class="bi bi-x"></i>
                                        Course Discussion Forums
                                    </li>
                                </ul>
                                <div class="d-grid"><a class="btn btn-dark" href="#!">Get Started</a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Pricing card premium-->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body p-5">
                                <div class="small text-uppercase fw-bold text-muted">Premium</div>
                                <div class="mb-3">
                                    <span class="display-4 fw-bold">$99</span>
                                    <span class="text-muted">/ mo.</span>
                                </div>
                                <ul class="list-unstyled mb-4">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        <strong>Unlimited Access to All Courses</strong>
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Certificate of Completion
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Access to Downloadable Resources
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Personalized Instructor Support
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Access to Premium Community
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Live Webinars
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-primary"></i>
                                        Assignments and Quizzes
                                    </li>
                                    <li class="text-muted">
                                        <i class="bi bi-check text-primary"></i>
                                        Course Discussion Forums
                                    </li>
                                </ul>
                                <div class="d-grid"><a class="btn btn-outline-dark" href="#!">Get Started</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials section-->
        <section class="py-5 border-bottom">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <h2 class="fw-bolder">Student Testimonials</h2>
                    <p class="lead mb-0">Hear what our students have to say</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- Testimonial 1-->
                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-dark fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">Thank you for providing such high-quality courses. I have learned so much and it has helped me in my career!</p>
                                        <div class="small text-muted">- Michael Williams, Web Developer</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Testimonial 2-->
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex">
                                    <div class="flex-shrink-0"><i class="bi bi-chat-right-quote-fill text-dark fs-1"></i></div>
                                    <div class="ms-4">
                                        <p class="mb-1">The course content was excellent, and the instructors were very knowledgeable. I highly recommend these courses!</p>
                                        <div class="small text-muted">- Emily Johnson, Data Scientist</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        <section class="bg-light py-5">
            <div class="container px-5 my-5 px-5">
                <div class="text-center mb-5">
                    <div class="feature bg-dark bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                    <h2 class="fw-bolder">Contact Us</h2>
                    <p class="lead mb-0">Have any questions? We'd love to hear from you</p>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-6">
                        <!-- Contact Form -->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input -->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="subject" type="text" placeholder="Finance" data-sb-validations="required" />
                                <label for="subject">Subject</label>
                                <div class="invalid-feedback" data-sb-feedback="subject:required">A subject is required.</div>
                            </div>
                            <!-- Message input -->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Message sent successfully!</div>
                                    We'll get back to you soon.
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message. Please try again.</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-dark btn-lg" id="submitButton" type="submit">Contact</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-5"><p class="m-0 text-center text-white">Copyright &copy; 2021 Educatioverse</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
        <!-- SB Forms JS - To make the contact form functional-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
