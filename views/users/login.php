<?php include('views/navbar/navbar_index.php') ?>

<?php
include 'views/others/errors.php';
is_login2($db);

?>

<?php if (isset($_GET['error']) && $_GET['error'] == 1) : ?>
    <div class="row pt-4 justify-content-center mx-0">
        <div class="col-md-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if (what_langauge() == 0) : ?>
                    <strong>Email</strong> ou <strong>Mot de passe</strong> incorrect !.
                <?php else : ?>
                    incorrect <strong>Email</strong> or <strong>password</strong> !.
                <?php endif; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_GET['error']) && $_GET['error'] == 2) : ?>
    <div class="row pt-4 justify-content-center mx-0">
        <div class="col-md-4">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php if (what_langauge() == 0) : ?>
                    <strong>Votre entreprise estactuellement bloquée ! </strong>
                <?php else : ?>
                    <strong> Your company is currently blocked ! </strong>
                <?php endif; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>


<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card bg-transparent text-sendary o-hidden border-0 shadow-lg my-5">

            <div class="card-body p-0">

                <div class="row">
                    <div class="col-lg-6 mt-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-Secondary-900 mb-4">
                                    <?php if (what_langauge() == 0) : ?>
                                        BIENVENUE
                                    <?php else : ?>
                                        WELCOME BACK
                                    <?php endif; ?>
                                </h1>
                            </div>
                            <form class="user mb-2 needs-validation" method="post" action="index.php?page=controllers/users/login_controller">
                                <div class="form-group">
                                    <input required type="email" name="email" value="<?= $_GET['email'] ?? '' ?>" class="form-control form-control-user bg-dark text-light" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?php if (what_langauge() == 0) : ?>Entrez votre Email...<?php else : ?>Enter your Email adresse...<?php endif; ?>">
                                </div>
                                <div class="invalid-feedback">
                                    erreur
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user bg-dark text-light" id="exampleInputPassword" placeholder="<?php if (what_langauge() == 0) : ?>Entrez votre Mot de passe...<?php else : ?>Enter your Password...<?php endif; ?>">
                                </div>
                                <!-- <div class="row">
                                    <div class="col-lg-6">

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input " id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
                                                    <?php if (what_langauge() == 0) : ?>
                                                        Se rappeler de moi !
                                                    <?php else : ?>
                                                        remember me !
                                                    <?php endif; ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="text-right">
                                            <a class="small text-light" href="index.php?page=views/users/forgot_password">
                                                <?php if (what_langauge() == 0) : ?>
                                                    Mot de passe oublié ?
                                                <?php else : ?>
                                                    Password forgotten ?
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                    </div>

                                </div> -->
                                <button name="submit_login" type="submit" class="btn btn-info btn-user btn-block mt-4">
                                    <i class="fab fa-sign-in "></i>
                                    <?php if (what_langauge() == 0) : ?>
                                        CONNEXION
                                    <?php else : ?>
                                        LOGIN
                                    <?php endif; ?>
                                </button>
                                <!-- <hr>
                                <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a> -->
                            </form>

                            <hr>

                            <div class="text-center mt-2">
                                <a class="small text-light" href="index.php?page=views/users/register">
                                    <?php if (what_langauge() == 0) : ?>
                                        Vous n'avez pas de compte? Inscrivez vous!
                                    <?php else : ?>
                                        You don't have an account ? register now !
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="text-center">
                                <a class="small text-light" href="index.php?page=views/users/register_inc">
                                    <?php if (what_langauge() == 0) : ?>
                                        Vous voulez Ajouter votre entreprise? Inscrivez là!
                                    <?php else : ?>
                                        Your Company are not register ? register her now !
                                    <?php endif; ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 d-none d-lg-block ">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block p-0 " src="public/images/logoapp.png" width="600" height="600" alt="First slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h2 class="font-italic font-weight-bold float-md-right"></h5>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block p-0" src="public/images/Direct.jpg" width="600" height="600" alt="Second slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5></h5>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block p-0" src="public/images/IAI.png" width="600" height="600" alt="Third slide">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5></h5>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a> -->
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>