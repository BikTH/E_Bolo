<?php 

/*login*/


if (isset($_GET['dabord'])) : 
    echo "<script>
          Swal.fire({
            icon: 'info',
            title: 'Oops...',
            text: 'Il est obligatoire de vous connecter pour lire un cours!',
          });
      </script>";
endif;


 /*inscription*/
if (isset($pseudo_error) && $pseudo_error == 1) :
    echo "<script>
          Swal.fire('Ce pseudo est déjà pris, choisissez un autre!','Ooups...','error');
      </script>";
endif;

if (isset($email_error) && $email_error == 1) :
    echo "<script>
          Swal.fire('Adresse email déjà prise, choisissez une autre!','Ooups...','error');
      </script>";
endif;

if (isset($phone_error) && $phone_error == 1) :
    echo "<script>
          Swal.fire('Ce numéro de téléphone est déjà pris, choisissez un autre!','Ooups...','error');
      </script>";
endif;

if (isset($password_lengt_error) && $password_lengt_error == 1) :
    echo "<script>
          Swal.fire('Mot de passe pas assez sécurisé, choisissez-en un autre !','Ooups...','error');
      </script>";
endif;

if (isset($password_confirm_error_update) && $password_confirm_error_update == 1) :
    echo "<script>
          Swal.fire('La confirmation du mot de passe a échoué !','Ooups...','error');
      </script>";
endif;

if (isset($error) && $error == 1) :
    echo "<script>
          Swal.fire('Le remplissage de tous les champs est obligatoire!','Ooups...','error');
      </script>";
endif;








/*apres*/
if (isset($_GET['add_success']) && $_GET['add_success'] == 1) :
    echo "<script>
          Swal.fire('Ajout &eacute;ffectu&eacute;e avec succ&egrave;s!','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['vente_success']) && $_GET['vente_success'] == 1) :
    echo "<script>
          Swal.fire('Vente &eacute;ffectu&eacute;e avec succ&egrave;s!','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['update_success']) && $_GET['update_success'] == 1) :
    echo "<script>
          Swal.fire('Mise &agrave; jour &eacute;ffectu&eacute;e avec succ&egrave;s!','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1) :
    echo "<script>
          Swal.fire('Suppréssion &eacute;ffectu&eacute;e avec succ&egrave;s!','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['status_success']) && $_GET['status_success'] == 1) :
    echo "<script>
          Swal.fire('Changement de status &eacute;ffectu&eacute;e avec succ&egrave;s!','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['supp_success_user']) && $_GET['supp_success_user'] == 1) :
    echo "<script>
          Swal.fire('Suppréssion de l\'utilisateur &eacute;ffectu&eacute;e avec succ&egrave;s!','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['set_success_user']) && $_GET['set_success_user'] == 1) :
    echo "<script>
          Swal.fire('Cet utilisateur est désormais !','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['set_success']) && $_GET['set_success'] == 1) :
    echo "<script>
          Swal.fire('Ce produit est désormais à vendre!','message','success');
      </script>";
endif; ?>

<?php if (isset($_GET['res_danger']) && $_GET['res_danger'] == 1) :
    echo "<script>
          Swal.fire('Ce produit est désormais libre d'etre vendu!','message','success');
      </script>";
endif; ?>


<?php if (isset($_GET['res_success']) && $_GET['res_success'] == 1) :
    echo "<script>
          Swal.fire('Ce produit est désormais réservé !','message','success');
      </script>";
endif; ?>
<?php if (isset($_GET['add_success']) && $_GET['add_success'] == 1) : ?>
    <div class="row px-4 justify-content-center mx-0">
        <div class="col-md-11">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                Enregistrement &eacute;ffectu&eacute; avec succ&egrave;s!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_GET['update_success']) && $_GET['update_success'] == 1) : ?>
    <div class="row px-4 justify-content-center mx-0">
        <div class="col-md-11">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                Mise &agrave; jour &eacute;ffectu&eacute;e avec succ&egrave;s!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_GET['contact_success']) && $_GET['contact_success'] == 1) : ?>
    <div class="row px-4 justify-content-center mx-0">
        <div class="col-md-11">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                Votre message a été envoyé avec succès !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>