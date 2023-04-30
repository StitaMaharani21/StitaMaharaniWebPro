@extends('layouts.web')

@section('title', 'Welcome')

@section('content')
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
        <div class="hero-container" data-aos="fade-in">
            <h1>Stita Maharani</h1>
            <p>IT Student <span class="typed" data-typed-items="of BINUS University"></span></p>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="section-title">
                    <h2>About</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <img src="assets/img/foto.jpg" class="img-fluid" alt="" style="width: 100%">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                        <h3>Code is Art: A Collection of My IT Creations.</h3>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>21 June
                                            2003</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <span>www.example.com</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+6282 14528
                                            7612</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Malang, East
                                            Java</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>19</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Education:</strong> <span>BINUS
                                            University</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                        <span>i.maharani@binus.ac.id</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                        <span>Available</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p>I am a student currently studying at Bina Nusantara University. A big interest in the field of
                            information technology. I have already studied several programming courses such as C language,
                            Python, Java, and computer networking. I am also active in PANORAMA student activities as a
                            journalist. In the future, I hope to develop my skills in IT and contribute to creating
                            technology solutions that benefit society.</p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container">

                <div class="section-title">
                    <h2>Project</h2>
                    <p>Here are some of the assignments and projects that I have completed during my studies.</p>
                </div>

                <table class="table align-middle table-bordered"
                    style="width: 100%; margin-top: 10px; text-align: center; vertical-align: middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Project Title</th>
                            <th>Project Description</th>
                            <th>Image Project</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td><img src="{{ asset($item->image_url) }}" style="width: 200px; height: 100px"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row" data-aos="fade-in">
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>University Village, Genitri, Tirtomoyo, Malang Regency, East Java</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>i.maharani@binus.ac.id</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p>+6282 14528 7612</p>
                            </div>

                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.618289394938!2d112.67905460000001!3d-7.941617699999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62928bfc2bcf5%3A0x15809432020077dc!2sUniversity%20Village!5e0!3m2!1sen!2sid!4v1651240071000!5m2!1sen!2sid"
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>iPortfolio</span></strong>
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End  Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
@endsection
</body>
