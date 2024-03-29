<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link rel="icon" type="image/x-icon" href="img/logo.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/offer.css" rel="stylesheet" />
    <link href="css/login.css" rel="stylesheet" />
</head>

<body id="page-top">
    <div id="chatbot">
        <!-- CHAT BAR BLOCK -->
        <div class="chat-bar-collapsible">
            <button id="chat-button" type="button" class="collapsible">Need help? Chat with Luxy!
            </button>

            <div class="content">
                <div class="full-chat-block">
                    <!-- Message Container -->
                    <div class="outer-container">
                        <div class="chat-container">
                            <!-- Messages -->
                            <div id="chatbox">
                                <h5 id="chat-timestamp"></h5>
                                <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                            </div>

                            <!-- User input box -->
                            <div class="chat-bar-input-block">
                                <div id="userInput">
                                    <input id="textInput" class="input-box" type="text" name="msg"
                                        placeholder="Tap 'Enter' to send a message">
                                    <p></p>
                                </div>

                                <div class="chat-bar-icons">
                                    <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                        onclick="heartButton()"></i>

                                </div>
                            </div>

                            <div id="chat-bar-bottom">
                                <p></p>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="ilux.js"></script>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top"><img src="img/ilux2.png" id="logo">iLux</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#what-we-do">What We Do</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#offers">Offers</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#reviews">Reviews</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#contact-us">Contact Us</a></li>
                </ul>
                <?php
                use App\Http\Controllers\WalletController;
                ?>
                @if (auth('sanctum')->user())
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            ₱<?php
                            $bal = new WalletController();
                            echo $bal->showBalance();
                            ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/add-fund">Add Fund</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            echo auth()->user()->username;
                            ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="/dashboard">Account</a>
                            <a class="dropdown-item" href="/api/auth/logout">Logout</a>
                        </div>
                    </div>
                @else
                    <div>
                        <a class="btn btn-primary" href="login">Login</a>
                        <a class="btn btn-primary" href="/register">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </nav>
    <!-- User Account -->
    <section class="projects-section bg-light" id="offer-page">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="container tm-container-gallery">
                <div class="row row-offer">
                    <div class="text-center col-12">
                        <div class="form_message text-danger">
                            @if (Session::get('status') == false)
                                {{ Session::get('message') }}
                            @endif
                        </div>
                        <div class="form_message text-success">
                            @if (Session::get('status') == true)
                                {{ Session::get('message') }}
                            @endif
                        </div>
                        <h2 class="tm-text-primary tm-section-title mb-4">@
                            <?php
                            echo auth()->user()->username;
                            ?>
                        </h2>
                        <a href="/change-pass">
                            <p class="mx-auto tm-section-desc">
                                Change Password
                        </a>
                        </p><br>

                        <p class="mx-auto tm-section-desc">
                            Cant't find your order in the offers? Since you are special for us, we can make it for you!
                        </p>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#ordercustomModal"> Boost Now! </button>

                        <!-- Custom Modal -->
                        <div class="modal fade" id="ordercustomModal" tabindex="-1"
                            aria-labelledby="orderfacebookModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="facebookModalLabel">FACEBOOK</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--Order Form FB-->
                                        <div id="order-form">
                                            <div class="container-login ">
                                                <div class="form_message form_message--error">
                                                    @if (Session::get('status') == false)
                                                        {{ Session::get('message') }}
                                                    @endif
                                                </div>
                                                <div class="form_message text-success">
                                                    @if (Session::get('status') == true)
                                                        {{ Session::get('message') }}
                                                    @endif
                                                </div>

                                                <form action="{{ url('/order/form-submit') }}" method="POST"
                                                    class="form" id="order">
                                                    @csrf

                                                    <h5 class="form_title">Order Process Form</h5>
                                                    <h3 class="form_title">Facebook</h3>
                                                    <div class="form_message form_message--error">
                                                    </div>
                                                    <div class="form_input-group">
                                                        <input type="text" name="link" class="form_input"
                                                            autofocus placeholder="URL Account">
                                                    </div>
                                                    <div class="form_input-group">
                                                        <input type="text" name="social_media" class="form_input"
                                                            autofocus placeholder="Social Media">
                                                    </div>
                                                    <div class="form_input-group">
                                                        <input type="text" name="custom_order" class="form_input"
                                                            autofocus placeholder="Custom Order">
                                                    </div>
                                                    <div class="form_input-group">
                                                        <input type="number" name="quantity" class="form_input"
                                                            min="100" max="100000" step="100" autofocus
                                                            placeholder="Quantity">
                                                    </div>
                                                    <div class="form_input-group">
                                                        <label type="number" name="price"
                                                            class="form_input">Price</label>
                                                    </div>
                                                    <button class="form_button mb-3" type="submit"
                                                        href="/dashboard">Order Now</button>
                                                    <p class="form_text">
                                                        <a class="form_link" href="/offer">Back to
                                                            Offers</a>
                                                    </p>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table-->
                <div class="row gx-0 mb-5 mb-lg-0 justify-content-center table">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            use App\Http\Controllers\OrderController;
                            $query = new OrderController();
                            ?>
                            @foreach ($query->showUserOrders() as $record)
                                <tr>
                                    <td>{{ $record->local_id }}</td>
                                    <td>{{ $record->service_name }}</td>
                                    <td>{{ $record->price }}</td>
                                    <td>{{ $record->status }}</td>
                                    <td>{{ $record->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; iLux 2012. All Rights Reserved. We are not affiliated with
            Instagram, Facebook, Twitter, YouTube, Tiktok.</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/login.js"></script>
</body>

</html>
