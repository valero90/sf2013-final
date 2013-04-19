<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo url_for('@homepage') ?>">Sf2013</a>
          <div class="nav-collapse collapse navbar-responsive-collapse">
            <ul class="nav">
              <?php if ($sf_user->isAuthenticated()): ?>
                <li><a href="<?php echo url_for('@verLibros') ?>">Libros</a></li>
                <li><a href="<?php echo url_for('@verVocabulario') ?>">Vocabulario</a></li>
                <li><a href="<?php echo url_for('@verGramatica') ?>">Gramatica</a></li>
                <li><a href="<?php echo url_for('@sf_guard_signout') ?>">Logout</a></li>
              <?php else: ?>
              <li><a href="<?php echo url_for('@sf_guard_signin') ?>">Login</a></li>
              <li><a href="<?php echo url_for('@sf_guard_register') ?>">Registrate</a></li>
              <?php endif; ?>
            </ul>
          </div><!-- /.nav-collapse -->
        </div>
      </div><!-- /navbar-inner -->
    </div><!-- /navbar -->
    <?php if ($sf_user->hasFlash('success')): ?>
      <div class="flash_notice text-success"><?php echo $sf_user->getFlash('success') ?></div>
    <?php endif; ?>
    
    <?php if ($sf_user->hasFlash('notice')): ?>
      <div class="flash_notice text-info"><?php echo $sf_user->getFlash('notice') ?></div>
    <?php endif; ?>
     
    <?php if ($sf_user->hasFlash('error')): ?>
      <div class="flash_error text-success"><?php echo $sf_user->getFlash('error') ?></div>
    <?php endif; ?>
    <div class="content">
      <?php echo $sf_content ?>
    </div>
    
    <script type="text/javascript">
    </script>
  </body>
</html>
