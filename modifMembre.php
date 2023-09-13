<?php include("top.php"); ?>
<?php include("header.php"); ?>
<?php include("aside.php"); ?>

<!-- Debut du main -->
  <main class="main" id="main">
    <div class="container">
        <div class="row">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
  
                <div class="d-flex justify-content-center py-4">
                  <a href="index.html" class="logo d-flex align-items-center w-auto">
                    <img src="assets/img/yetemali.jpg" alt="">
                    <span class="d-none d-lg-block text-success">Yete</span>
                    <span class="d-none d-lg-block text-warning">mali</span>
                  </a>
                </div><!-- End Logo -->
  
                <div class="card mb-2">
                  <div class="card-body">
                    <form class="row g-3 needs-validation" novalidate>
                      <div class="col-12">
                        <label for="" class="form-label">Nom </label>
                        <div class="input-group has-validation">
                          <input type="text" name="" class="form-control " id="yourUsername" required>
                          <div class="invalid-feedback">Votre nom.</div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="" class="form-label">Prenom</label>
                        <input type="text" name="" class="form-control " id="yourPassword" required>
                        <div class="invalid-feedback">Entrer votre Prenom!</div>
                      </div>
                      <div class="col-12">
                          <label for="" class="form-label">Adresse</label>
                          <input type="text" name="" class="form-control " id="yourPassword" required>
                          <div class="invalid-feedback">Entrer votre Adresse!</div>
                        </div>
                      <div class="col-12">
                          <label for="" class="form-label">Telephone</label>
                          <input type="text" name="" class="form-control " id="yourPassword" required>
                          <div class="invalid-feedback">Entrer votre Contact!</div>
                        </div>
                        <div class="col-12">
                          <label for="" class="form-label">Date_Adhesion</label>
                          <input type="date" name="" class="form-control " id="yourPassword" required>
                          <div class="invalid-feedback">Entrer la date!</div>
                        </div>
                        <div class="col-12">
                          <label for="" class="form-label"><table>Tontine</table></label>
                          <input type="text" name="" class="form-control " id="yourPassword" required>
                          <div class="invalid-feedback">Entrer le nom de votre tontine!</div>
                        </div>
                      <div class="col-12">
                        <button class="btn btn-success boutton" type="submit">Enregistrer</button>
                      </div>   
                    </form>
                  </div>
                </div>
                <div class="credits">
                  <!-- All the links in the footer should remain intact. -->
                  <!-- You can delete the links only if you purchased the pro version. -->
                  <!-- Licensing information: https://bootstrapmade.com/license/ -->
                  <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                  Designed by <a class="text-success">Yetemali</a>
                </div>
                
              </div>
            </div>
          </div>
        </div>
    </div>
  </main><!-- End #main -->
<!-- Fin du main -->

<?php include("footer.php"); ?>
<?php include("script.php"); ?>
<!-- End #main -->



