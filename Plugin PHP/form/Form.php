<?php 
/*
Plugin Name: Form
Plugin URI: http://www.form_youcode.ma
Description:  Extension de formulaire de contact conviviale pour les débutants. Utilisez notre constructeur de formulaire en glisser/déposer pour créer vos formulaires WordPress.. 
Version:   0.1
Author:  youcode
*/





add_action("admin_menu", "addMenu");

function addMenu()
{
  add_menu_page("Form creator", "Form creator", 4, "Form_creator", "create_form" );
  add_submenu_page("Form_creator", "affichage_result", "affichage result", 4, "Form-affichage-Result", "affichage");
}

function create_form()
{
    $form = getform();
    ?>
    <div class="content">    
        <form method="post" action="">
            <div class="input-content">
                <input type="checkbox" id="fName" name="fName" value="true" <?php echo $form->fName == 1 ? 'checked' : '' ?>>
                <label for="">First Name</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="lName" name="lName" value="true" <?php echo $form->lName == 1 ? 'checked' : '' ?>>
                <label for="">Last Name</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="email" name="email" value="true" <?php echo $form->email == 1 ? 'checked' : '' ?>>
                <label for="">Email</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="subj" name="subj" value="true" <?php echo $form->subject == 1 ? 'checked' : '' ?>>
                <label for="">Subject</label>
            </div>
            <div class="input-content">
                <input type="checkbox" id="msg" name="msg" value="true" <?php echo $form->message == 1 ? 'checked' : '' ?>>
                <label for="">Message</label>
            </div>
            <div class="input-content">
                <button type="submit" name="formform">Create</button>
            </div>
        </form>
    </div>
    <?php
    echo 'shortcode : ' . '[contact_form]';
}

function affichage()
{
    $data = getdataform();
    ?>
    <table>
        <thead>
            <tr>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                <td>Subject</td>
                <td>Message</td>
            </tr>
        </thead>
        <tbody>
        <?php 
        foreach($data as $datum){
            ?>
            <tr>
                <td><?php echo $datum->fName ?></td>
                <td><?php echo $datum->lName ?></td>
                <td><?php echo $datum->email ?></td>
                <td><?php echo $datum->subject ?></td>
                <td><?php echo $datum->message ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
}


function formCode()
{
    getform();
    echo '<form action="" method="post">';

    if (getform()->fName) {

        echo 'Your Name (required) <br />';
        echo '<input type="text" name="fName" size="40" /><br>';
    }
    if (getform()->lName) {

        echo 'Your Name (required) <br />';
        echo '<input type="text" name="lName" size="40" /><br>';
    }
    if (getform()->email) {

        echo 'Your Email (required) <br />';
        echo '<input type="email" name="email" size="40" /><br>';
    }
    if (getform()->subject) {

        echo 'Subject (required) <br />';
        echo '<input type="text" name="subject" size="40" /><br>';
    }
    if (getform()->message) {

        echo 'Your Message (required) <br />';
        echo '<textarea rows="10" cols="35" name="message"></textarea><br>';
    }

    echo '<p><input type="submit" name="sumbit" value="sumbit"/></p>';
    echo '</form>';
}


function Form_base()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();//Récupère l'assemblage des caractères de la base de données.
    $tablename = 'form';
    $sql = "CREATE TABLE $wpdb->base_prefix$tablename (
        id INT,
        fName BOOLEAN,
        lName BOOLEAN,
        email BOOLEAN,
        subject BOOLEAN,
        message BOOLEAN
        ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    maybe_create_table($wpdb->base_prefix . $tablename, $sql);
}

function Form_insert()
{
    global $wpdb;
    $wpdb->insert(
        $wpdb->base_prefix.'form',
        [
            'id' => 1,
            'fname' => true,
            'lname' => true,
            'email' => true,
            'subject' => true,
            'message' => true
        ]
    );
}

function getform()
{
    global $wpdb;
    $tablename = 'form';
    $form = $wpdb->get_row("SELECT * FROM $wpdb->base_prefix$tablename WHERE id = 1;");
    return $form;
}

function dataform()
{
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $tablename = 'data_form';
    $sql = "CREATE TABLE $wpdb->base_prefix$tablename (
         id INT AUTO_INCREMENT,
        fName varchar(255) DEFAULT null,
        lName varchar(255) DEFAULT null,
        email varchar(255) DEFAULT null,
        subject varchar(255) DEFAULT null,
        message varchar(255) DEFAULT null,
        PRIMARY key(id)
        ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    maybe_create_table($wpdb->base_prefix . $tablename, $sql);
}


if (isset($_POST['formform'])) {
    $fName = filter_var($_POST['fName'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $lName = filter_var($_POST['lName'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $email = filter_var($_POST['email'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $subject = filter_var($_POST['subj'] ?? false, FILTER_VALIDATE_BOOLEAN) ;
    $message = filter_var($_POST['msg'] ?? false, FILTER_VALIDATE_BOOLEAN) ;

    global $wpdb;
    $wpdb->update(
        $wpdb->base_prefix.'form',
        [
            'fName' => $fName,
            'lName' => $lName,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        ],
        ['id' => 1]
    );
}

function cf_shortcode()
{
 
    formCode();

    return ob_get_clean();
}

if (isset($_POST['sumbit'])) {
    $arr = $_POST;
    unset($arr['sumbit']);

    global $wpdb;

    $wpdb->insert(
        $wpdb->base_prefix.'data_form',
        $arr
    );
}

function getdataform()
{
    global $wpdb;
    $tablename = 'data_form';
    $data = $wpdb->get_results("SELECT * FROM $wpdb->base_prefix$tablename");
    return $data;
}




add_shortcode('contact_form', 'cf_shortcode');

register_activation_hook(__FILE__, 'Form_base');
register_activation_hook(__FILE__, 'Form_insert');
register_activation_hook(__FILE__, 'dataform');
?>