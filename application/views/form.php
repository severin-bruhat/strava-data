<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="box">
                <div class="box-icon">
                    <span class="strava">STRAVA</span>
                </div>
                <div class="info">
                    <h4 class="text-center">Configurez votre compte Strava</h4>
                    <p>Créé d'abord votre application sur strava et renseignez votre app key ci-dessous :</p>
                    <?php echo form_open('home/index'); ?>
                        <label for="app_key">App Key</label>
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
