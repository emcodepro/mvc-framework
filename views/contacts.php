<?php
/**
 * Created by PhpStorm.
 * User: grand
 * Date: 28-Feb-21
 * Time: 12:12
 */

use emcode\phpmvc\form\Form;
use emcode\phpmvc\form\TextAreaField;

/** @var $this \emcode\phpmvc\View */
/** @var $model \app\models\ContactForm */

$this->title = 'Contacts';


?>

<?php  $form = Form::begin("" ,"post"); ?>
<?php echo $form->field($model, 'subject'); ?>
<?php echo $form->field($model, 'email'); ?>
<?php echo new TextAreaField($model, 'body'); ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php Form::end(); ?>
