<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-icon">
                    <span class="strava">STRAVA</span>
                </div>
                <div class="info">
                    <h4 class="text-center">Configurez votre compte Strava</h4>
                    <p><a href="#myModal" role="button" data-toggle="modal">Créez d'abord votre application</a> sur strava et renseignez votre jeton d'accès ci-dessous :</p>
                    <?php echo form_open('home/index'); ?>
                        <label for="app_key">Jeton d'accès</label>
                        <input type="input" name="app_key" id="app_key" />
                        <input type="submit" class="btn" name="submit" value="Récupérer mes données" />
                        <?php if(isset($errorMsg)) {
                            echo '<div class="alert alert-danger text-center">';
                            echo $errorMsg;
                            echo '</div>';
                          }
                        ?>
                        <?php echo validation_errors('<div class="alert alert-danger text-center">', '</div>'); ?>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Créez votre application Strava</h4>
            </div>
            <div class="modal-body">
                <ul>
                  <li>Connectez vous à votre compte Strava</li>
                  <li>Rendez-vous sur <a href="https://www.strava.com/settings/api" target="_blank">"Mon application"</a></li>
                  <li>
                      Créez votre application :
                      <img class="img-responsive" src="<?php echo  base_url('assets/images/create.png');?>" alt="écran de création d'application" title="Création d'application">
                  </li>
                  <li>
                      Générez et récupérez votre jeton d'accès :
                      <img class="img-responsive" src="<?php echo  base_url('assets/images/accessKey.png');?>" alt="écran jeton d'accès" title="Jeton d'accès">
                  </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
