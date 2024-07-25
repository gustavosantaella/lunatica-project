<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LunaTICA</title>
</head>

<link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"
    type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <div>
        <!-- Life is available only in the present moment. - Thich Nhat Hanh -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="ml-4 d-flex justify-content-between w-100">
                <div class="d-flex">
                    <a class="navbar-brand" href="#"><img width="50px" height="50px"
                            src="https://www.multiplicalia.com/wp-content/uploads/2019/05/772x595.png" /></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('home') }}">Tienda <span class="sr-only">(current)</span></a>
                            </li>

                        </ul>

                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#contacto">Contacto </a>
                            </li>

                        </ul>

                    </div>
                </div>
                <div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cart') }}">
                                <button class="btn btn-primary">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid p-5">
            @yield('content')
        </div>
        <div class="mt-5 footer">
            <!-- Remove the container if you want to extend the Footer to full width. -->
            <div class=" ">
                <!-- Footer -->
                <footer class="text-center text-white" style="background-color: #3f51b5">
                    <!-- Grid container -->
                    <div class="container">
                        <!-- Section: Links -->
                        <section class="mt-5">
                            <!-- Grid row-->
                            <div class="row text-center d-flex justify-content-center pt-5">
                                <!-- Grid column -->

                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-md-2">
                                    <h6 class="text-uppercase font-weight-bold">
                                        <a href="#!" class="text-white">Tienda</a>
                                    </h6>
                                </div>

                            </div>
                            <!-- Grid row-->
                        </section>
                        <!-- Section: Links -->

                        <hr class="my-5" />

                        <!-- Section: Text -->
                        <section class="mb-5">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-8" id="contacto">
                                    <section class="resume-section text-center" id="contact">
                                        <div >
                                          <h2 class="mb-4"> Contactame</h2>
                                          <form
                                            class="contact-form d-flex flex-column align-items-center"
                                            action="/contacto/enviar"
                                            method="POST">
                                            <div class="form-group w-100 mb-2">
                                              <input type="name" class="form-control"
                                                placeholder="Nombre"
                                                name="name"
                                                  />
                                            </div>
                                            <div class="form-group w-100 mb-2">
                                              <input
                                                type="email"
                                                class="form-control"
                                                placeholder="Correo"
                                                name="name"

                                              />
                                            </div>

                                            <div class="form-group w-100 mb-2">
                                              <textarea  class="form-control"
                                                type="text" placeholder="Message" rows="7" name="name"  > Escriba su mensaje...</textarea>
                                            </div>
                                            <button type="submit" class="btn btn-submit btn-info w-100"> Enviar </button>
                                          </form>
                                        </div>
                                      </section>
                                </div>
                                <div class="col-lg-8">
                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                        distinctio earum repellat quaerat voluptatibus placeat nam,
                                        commodi optio pariatur est quia magnam eum harum corrupti
                                        dicta, aliquam sequi voluptate quas.
                                    </p>
                                </div>
                            </div>
                        </section>
                        <!-- Section: Text -->

                        <!-- Section: Social -->
                        <section class="text-center mb-5">
                            <a href="" class="text-white me-4">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="" class="text-white me-4">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="" class="text-white me-4">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="" class="text-white me-4">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="" class="text-white me-4">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="" class="text-white me-4">
                                <i class="fab fa-github"></i>
                            </a>
                        </section>
                        <!-- Section: Social -->
                    </div>
                    <!-- Grid container -->

                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                        © {{ now()->year }} Copyright
                        <a class="text-white" href="#">Todos los derechos reservados</a>
                    </div>
                    <!-- Copyright -->
                </footer>
                <!-- Footer -->
            </div>
            <!-- End of .container -->
        </div>
    </div>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #dce3f0;
        }






        .main-heading {

            font-size: 40px;
            color: red !important;
        }

        .ratings i {

            color: orange;

        }

        .user-ratings h6 {
            margin-top: 2px;
        }
    </style>
</body>

</html>
