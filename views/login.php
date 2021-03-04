<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 28-Feb-21
 * Time: 12:12
 */
/** @var $mode \app\models\User */
use emcode\phpmvc\form\Form;

?>

<h3>Login</h3>

<?php $form = Form::begin("", "post"); ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo $form->field($model, 'password')->passwordField(); ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>