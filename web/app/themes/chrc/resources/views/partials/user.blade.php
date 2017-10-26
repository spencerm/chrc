<?php  
/**
 * User profile template 
 * 
 * using cmb2 
 * 
 */ 
?>

<?php

    $name       = $person['name'];
    $nameLink   = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
    $email      = $person['contact'] ?? false;
    $title      = $person['title'] ?? false;
    $bio        = $person['description'] ?? false;
    $userTitle  = $person['imagecaption'] ?? false;
    $userTitle  = $userTitle ? " / " . $userTitle : false;
    $userPhoto  = $person['image_id'] ?? false;
?>

<div class="user-profile">
  <?php if( $bio ): ?>
    <a href="#modal-bio" data-toggle="modal" data-target="#modal-bio-<?= $nameLink ?>">
  <?php endif; ?>
  <img alt="<?= $name ?>" src="<?php echo wp_get_attachment_image_src($userPhoto)[0]; ?>" class='img-fluid img-thumbnail' />
  <?php if( $bio ): ?>
    </a>
  <?php endif; ?>
  <h3><?= $name ?></h3>
  <p><?= $title ?> <?= $userTitle ?></p>
  <p><a href="mailto:<?= $email ?>"><?= $email ?></a></p>
</div>

<?php if( $bio ): ?>
    <div class="modal fade" id="modal-bio-<?= $nameLink ?>">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-title">
             <p><?= $title ?><?= $userTitle ?></p>
             <h5><?= $name ?></h5>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p><?= $bio ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-success" data-dismiss="modal">Close</button>
            <button type="button" class="btn  btn-outline-success"><a href="mailto:<?= $email ?>">Email</a></button>
          </div>
        </div>
      </div>
    </div>
<?php endif; ?>