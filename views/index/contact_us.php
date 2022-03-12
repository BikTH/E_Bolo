<?php include('views/navbar/navbar_index.php') ?>

<?php

include 'views/others/errors.php';

?>


<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card bg-transparent text-sendary o-hidden border-0 shadow-lg my-5">

            <div class="card-body justify-content-center p-0">
                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-center my-4">
                    <?php if (what_langauge() == 0) : ?>
                        Ecrivez Nous
                    <?php else : ?>
                        Write to us
                    <?php endif; ?>
                </h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">
                    <?php if (what_langauge() == 0) : ?>
                        Vous avez des questions ? N'hésitez pas à nous contacter directement. Notre équipe vous répondra dans les délais suivants
                        une question d'heures pour vous aider.
                    <?php else : ?>
                        Do you have a question ? Do not hesitate to contact us directly. our team will respond within a matter of hours to help you.
                    <?php endif; ?>
                </p>

                <div class="row mb-3">

                    <!--Grid column-->
                    <div class="col-md-9 mb-md-0 mb-5 ">
                        <form class="user m-3" id="contact-form" name="contact-form" action="controllers/index/contact_us_controller.php" method="POST">

                            <!--Grid row-->
                            <container>
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-6 mb-2">
                                        <label for="name" class="">
                                            <?php if (what_langauge() == 0) : ?>
                                                Votre Nom
                                            <?php else : ?>
                                                Your Name
                                            <?php endif; ?>
                                        </label>
                                        <input type="text" id="name" name="name" class="form-control form-control-user bg-dark text-light" required>
                                    </div>
                                    <!--Grid column-->

                                    <!--Grid column-->
                                    <div class="col-md-6 mb-md-2">
                                        <label for="email" class=""><?php if (what_langauge() == 0) : ?>
                                                Votre Adresse Email
                                            <?php else : ?>
                                                Your Email Address
                                            <?php endif; ?></label>
                                        <input type="text" id="email" name="email" class="form-control form-control-user bg-dark text-light" required>
                                    </div>
                                    <!--Grid column-->

                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row my-2">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <label for="subject" class="">
                                                <?php if (what_langauge() == 0) : ?>
                                                    Sujet
                                                <?php else : ?>
                                                    Subject
                                                <?php endif; ?>
                                            </label>
                                            <input type="text" id="subject" name="subject" class="form-control form-control-user bg-dark text-light" required>
                                        </div>
                                    </div>
                                </div>
                                <!--Grid row-->

                                <!--Grid row-->
                                <div class="row">

                                    <!--Grid column-->
                                    <div class="col-md-12">

                                        <div class="md-form mb-sm-2">
                                            <label for="message">
                                                <?php if (what_langauge() == 0) : ?>
                                                    Votre Message
                                                <?php else : ?>
                                                    Your Message
                                                <?php endif; ?>
                                            </label>
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control form-control-user bg-dark text-light md-textarea" required></textarea>
                                        </div>

                                    </div>
                                </div>
                                <!--Grid row-->
                            </container>
                            <div class="row mt-2">
                                <div class="col offset-sm-3">
                                    <button name="submit_contact_us" type="submit" class="btn btn-info btn-user btn-block">
                                        <i class="fab fa-sign-in "></i>
                                        <?php if (what_langauge() == 0) : ?>
                                            ENVOYER
                                        <?php else : ?>
                                            SEND
                                        <?php endif; ?>
                                    </button>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>



                        </form>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-3 text-center align-self-center">
                        <ul class="list-unstyled mb-0">
                            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                                <p>Awae, Yaoundé, CMR</p>
                            </li>

                            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                                <p>+ 237 694 716 842</p>
                            </li>

                            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                                <p>rupadante1@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                </div>

            </div>

        </div>

    </div>

</div>