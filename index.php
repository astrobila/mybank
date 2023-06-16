<?php 

$pageTitle = 'Index';

include 'inc.config.php';
include 'layouts/inc.header.tag.php';
include 'layouts/inc.navbar.php';
include 'layouts/inc.content.begin.php';

Helpers::noLoginRedirect('login.php');

?>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center pb-4 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="mb-5">Hello, User!</h1>
            </div>
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary pt-5 pb-4 px-4">
                        <h5 class="mt-4">Your Balance</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <br>
                        <h3>Rp. 300.000,00</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="position-relative border border-primary ini pt-5 pb-4 px-4">
                        <h5 class="mt-4">Recent Transactions</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <div class="form-floating">
                            <a class="btn btn-outline-light itu py-3 px-5 mt-2" href="">transfer dari ibu</a>

                        </div>
                        <br>
                        <div class="form-floating">
                            <a class="btn btn-outline-light itu py-3 px-5 mt-2" href="">transfer dari ibu</a>
                        </div>
                        <br>
                        <div class="form-floating">
                            <a class="btn btn-outline-light itu py-3 px-5 mt-2" href="">transfer dari ibu</a>

                        </div>
                        <div class="form-floating">
                            <a class="btn btn-outline-light situ py-3 px-5 mt-2" href="">see more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row gy-5 gx-4 justify-content-center">
                <div class="col-lg-4 col-sm-6 text-center pt-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="position-relative border border-primary sini pt-5 pb-4 px-4">
                        <h5 class="mt-4">Top Wishlist</h5>
                        <hr class="w-25 mx-auto bg-primary mb-1">
                        <hr class="w-50 mx-auto bg-primary mt-0">
                        <br>
                        <div class="foto">
                            <img src="index_docs\img\orca.jpeg" alt="">
                            <h1>boneka orca</h1>
                            <p>Rp. 200.000,00/300.000,00</p>
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                80%
                            </div>
                            <a class="btn btn-outline-light situ py-3 px-5 mt-5" href="">see more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

include 'layouts/inc.content.end.php';
include 'layouts/inc.footer.tag.php';