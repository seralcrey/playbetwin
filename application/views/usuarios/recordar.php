<?php template_set('title', 'Recordar') ?>

<?= miga_pan() ?>

<div class="container-fluid" style="padding-top:20px">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Login</h3>
        </div>
        <div class="panel-body">
          <?php if ( ! empty(error_array())): ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors() ?>
            </div>
          <?php endif ?>
          <?= form_open('usuarios/recordar') ?>
            <div class="form-group">
              <?= form_label('Nick:', 'nick') ?>
              <?= form_input('nick', set_value('nick', '', FALSE),
                             'id="nick" class="form-control"') ?>
            </div>
            <?= form_submit('recordar', 'Recordar Contraseña', 'class="btn btn-success"') ?>
            <?= anchor('/usuarios/login', 'Volver', 'class="btn btn-info" role="button"') ?>
          <?= form_close() ?>
        </div>
      </div>
    </div>
  </div>
</div>
