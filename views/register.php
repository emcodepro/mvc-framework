<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 28-Feb-21
 * Time: 12:12
 */

use emcode\phpmvc\form\Form;

?>

<h3>Create account</h3>

<?php $form = Form::begin("", "post"); ?>
<div class="row">
    <div class="col"><?php echo $form->field($model, 'firstname'); ?></div>
    <div class="col"><?php echo $form->field($model, 'lastname'); ?></div>
</div>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'password')->passwordField(); ?>
<?php echo $form->field($model, 'confirmPassword')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>