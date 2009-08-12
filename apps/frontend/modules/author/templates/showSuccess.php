
<h1><?php echo $user->getUsername() ?></h1>
<?php if ($user['Author']): ?>
<?php use_helper("Gravatar") ?>

<?php echo gravatar_image_tag($user['Author']['email']) ?>
<p>
<strong>Name:</strong>  
<span class='author-name'>
  <?php echo mail_to($user['Author']['email'], $user['Author']['first_name'].' '.$user['Author']['last_name']) ?>
</span>
</p>

<?php if (trim($user['Author']['bio'])): ?>
<strong>Bio:</strong>
<p>
  <?php echo $user['Author']['bio'] ?>
</p>
<?php endif ?>
<?php else: ?>
  <strong>This user has yet to enter any profile information</strong>
<?php endif ?>



<?php if ($user['Plugins']->count() > 0): ?>
<h3>Plugins <span class='plugin-count'>(<?php echo (string)$user['Plugins']->count() ?>)</span></h3>
<ol>
<?php foreach ($user['Plugins'] as $plugin): ?>
  <li><?php include_partial('plugin/list_item', array('plugin' => $plugin)) ?></li>
<?php endforeach ?>
</ul>
<?php else: ?>
  <p>This user has yet to register any plugins</p>
<?php endif ?>