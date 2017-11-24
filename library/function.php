<?php

use ResaBike\Library\Php\PHPMailer\PHPMailer;
use ResaBike\Library\Utils\Redirect;

function error_404()
{
    return '404 ça marche pas';
}

function redirectIfNotConnected()
{
    if (!isset($_SESSION['connected']))
        Redirect::toAction('tracks');
}

function redirectByRole($role, $ctr)
{
    if ($_SESSION['user']['idRole'] < $role)
        Redirect::toLastPage();
}

function redirectIntoZone($role, $ctr)
{
    if ($_SESSION['user']['idRole'] <= $role) {
        if (!isset($_GET['zone']) || empty($_GET['zone']) || $_GET['zone'] <> $_SESSION['user']['idZone']) {
//            echo $_SESSION['user']['idRole'];
//            echo $ctr->getCurrentController();
//            echo $ctr->getCurrentAction();
//            print_r(array('zone' => $_SESSION['user']['idZone'])); die();
            Redirect::toAction($ctr->getCurrentController(), $ctr->getCurrentAction(), array('zone' => $_SESSION['user']['idZone']));
        }
    }
}

function __($key, $return = false)
{
    // Langue par défaut
    $currentlang = 'en';
    // Si aucune langue n'est sélectionnée, on sélectionne la langue par défaut
    $currentlang = (isset($_SESSION['lang'])) ? strtolower($_SESSION['lang']) : $currentlang;

    // Chemin vers le fichier de langues
    $path = ASSETSPATH . DS . 'languages' . DS . $currentlang . '.json';

    // Récupération du contenu du fichier
    $a = file_get_contents($path);
    $lang = json_decode($a, true);

    // Si le fichier n'existe pas ou que le mot clé n'est pas encore traduit
    if (empty($lang) || !array_key_exists($key, $lang)) {

        // Si la langue actuelle est anglais
        if ($currentlang == 'en') {
            // Création du mot clé avec la traduction
            $lang[$key] = $key;
            // Ajout dans le fichier
            file_put_contents($path, json_encode($lang));
        } else {
            // Affichage du mot en anglais entouré de crochets
            return returnOrEcho('[' . $key . ']', $return);
        }
    }
    // Affichage de la traduction
    return returnOrEcho($lang[$key], $return);
}

function returnOrEcho($value, $isReturn)
{
    if ($isReturn) {
        return $value;
    } else {
        echo $value;
    }
    return '';
}

function sendMailBookings($subject, $intro, $to, $sender, $nbBikes, $email, $startStation, $endStation, $startDate, $token, $phone = "-", $groupName = "-", $remark = "-")
{
    $mail = initializePHPMailer('resabikepl@gmail.com', $to, $subject);
    $mail->Body = '
        <p>' . $intro . '</p>
        <ul>
            <li>Nom : ' . $sender . '</li>
            <li>Nombre de vélos : ' . $nbBikes . '</li>
            <li>Départ : ' . $startStation . '</li>
            <li>Arrivée : ' . $endStation . '</li>
            <li>Heure de départ : ' . $startDate . '</li>
            <li>Adresse e-mail : ' . $email . '</li>
            <li>N° de téléphone : ' . $phone . '</li>
            <li>Nom du groupe : ' . $groupName . '</li>
            <li>Remarques complémentaires : ' . $remark . '</li>
        </ul>
        <p>- Si vous désirez annuler votre réservation, il vous suffit de cliquer sur ce lien : http://localhost/resabike/index/delete?id=' . $token . '</p>
        <hr />
        <ul>
            <li>Name : ' . $sender . '</li>
            <li>Number of bikes: ' . $nbBikes . '</li>
            <li>Departure : ' . $startStation . '</li>
            <li>Arrival : ' . $endStation . '</li>
            <li>Departure date : ' . $startDate . '</li>
            <li>Email : ' . $email . '</li>
            <li>Telephone number : ' . $phone . '</li>
            <li>Group name: ' . $groupName . '</li>
            <li>Remark : ' . $remark . '</li>
        </ul>
        <p>- If you want to cancel your reservation, you can click on this link : http://localhost/resabike/index/delete?id=' . $token . '</p>
        <hr />
        <ul>
            <li>Name : ' . $sender . '</li>
            <li>Anzahl der Fahrräder : ' . $nbBikes . '</li>
            <li>Abfahrt : ' . $startStation . '</li>
            <li>Ankunft : ' . $endStation . '</li>
            <li>Abfahrtszeit : ' . $startDate . '</li>
            <li>Email : ' . $email . '</li>
            <li>Telefonnummer : ' . $phone . '</li>
            <li>Gruppenname : ' . $groupName . '</li>
            <li>Anmerkung : ' . $remark . '</li>
        </ul>
        <p>- Wenn Sie Ihre Reservierung stornieren möchten, klicken Sie einfach auf diesen Link : http://localhost/resabike/index/delete?id=' . $token . '</p>';

    $mail->Body .= '<p style="text-align: center;">http://localhost/resabike</p>';

    sendMail($mail);
    $mail->SmtpClose();
    unset($mail);
}

function sendMail($mail)
{
    if (!$mail->Send()) // Teste le return code de la fonction
        echo $mail->ErrorInfo; // Affiche le message d'erreur
}

function initializePHPMailer($from, $to, $subject)
{
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->SMTPAuth = true; // authentication enabled
    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; // or 465
    $mail->Username = "resabikepl@gmail.com";
    $mail->Password = '$ilaB2017';
    $mail->IsHTML(true);
    $mail->From = $from;
    $mail->AddAddress($to);
    $mail->AddReplyTo($from);
    $mail->Subject = utf8_decode($subject);
    return $mail;
}

function sendMailAwaiting($to, $sender, $nbBikes, $email, $startStation, $endStation, $startDate, $token, $phone = "-", $groupName = "-", $remark = "-")
{
    $subject = 'Resabike: Réservation en attente de confirmation, Book in pending, Reservierungsbestätigung';
    $intro =    'Votre réservation a bien été reçue. Cependant, dû à la forte demande, elle reste en attente de confirmation. Vous recevrez un message de confirmation ou d\'annulation, au plus tard, un jour avant le départ du bus. Voici un récapitulatif de la réservation / '.'<br>'.
                'Your reservation has been received. But due to a large demande, it will be in pending. You will receive a confirmation or cancelation message later one day befor the departure of the bus. Here you can find a summary of a your book / '.'<br>'.
                'Ihre Reservierung wurde erhalten. Aufgrund der hohen Nachfrage bleibt die Bestätigung jedoch ausstehend. Sie erhalten spätestens einen Tag vor Abfahrt des Busses eine Bestätigungs- oder Stornierungsnachricht. Hier ist eine Zusammenfassung der Reservierung :'.'<br>';
    sendMailBookings($subject, $intro, $to, $sender, $nbBikes, $email, $startStation, $endStation, $startDate, $token, $phone, $groupName, $remark);
}

function sendMailConfirmation($to, $sender, $nbBikes, $email, $startStation, $endStation, $startDate, $token, $phone = "-", $groupName = "-", $remark = "-")
{
    $subject = 'Resabike: Confirmation de votre réservation, Book confirmed, Reservierung bestätigt';
    $intro = '  Votre réservation a bien été effectuée. Voici un récapitulatif de la réservation / '.'<br>'.
                'Your reservation has been confirmed. Here you can find a summary of a your book / '.'<br>'.
                'Ihre Reservierung wurde vorgenommen. Hier ist eine Zusammenfassung der Reservierung : '.'<br>';
    sendMailBookings($subject, $intro, $to, $sender, $nbBikes, $email, $startStation, $endStation, $startDate, $token, $phone, $groupName, $remark);
}

function sendMailDeny($to, $sender, $nbBikes, $email, $startStation, $endStation, $startDate, $phone = "-", $groupName = "-", $remark = "-")
{
    $subject = 'Resabike: Réservation refusée, Book canceled, Reservierung storniert';
    $intro = 'Nous sommes au regret de vous annoncer que, par manque de disponibilité dans les bus, votre réservation a été refusée. Nous vous invitons toutefois à essayer de refaire une réservation en sélectionnant un autre bus. Voici un récapitulatif de la réservation: / '.'<br>'.
    'We regret to annouce you, that we don\'t have the dispoinibilty in our bus, your reservation has been canceled. We recommand you to try in an other bus. Here you can find a summary of a your book / '.'<br>'.
    'Es tut uns leid, Ihnen mitteilen zu müssen, dass Ihre Reservierung aufgrund fehlender Verfügbarkeit im Bus abgelehnt wurde. Wir empfehlen Ihnen jedoch, eine Reservierung durch Auswählen eines anderen Busses zu wiederholen. Hier ist eine Zusammenfassung der Reservierung:'.'<br>';
    sendMailBookings($subject, $intro, $to, $sender, $nbBikes, $email, $startStation, $endStation, $startDate, null, $phone, $groupName, $remark);
}

function sendMailContact($from, $subject, $remark, $sender, $phone)
{
    $mail = initializePHPMailer($from, 'resabikepl@gmail.com', $subject);
    $mail->Body = '
        <p>Vous avez reçu un nouveau mail de contact. Voici les informations reçues :</p>
        <ul>
            <li>Nom : ' . $sender . '</li>
            <li>Adresse e-mail : ' . $from . '</li>
            <li>N° de téléphone : ' . $phone . '</li>
            <li>Remarque : ' . $remark . '</li>
        </ul>'.
        '<hr />'.
        '<p>You received a new contact email. Here you can find informations received :</p>
            <ul>
                <li>Name : ' . $sender . '</li>
                <li>Email : ' . $from . '</li>
                <li>Telephone number : ' . $phone . '</li>
                <li>Remark : ' . $remark . '</li>
            </ul>'.
        '<hr />'.
        '<p>Sie haben eine neue Kontakt-E-Mail erhalten. Hier sind die erhaltenen Informationen :</p>
            <ul>
                <li>Name : ' . $sender . '</li>
                <li>Email : ' . $from . '</li>
                <li>Telefonnummer : ' . $phone . '</li>
                <li>Anmerkung : ' . $remark . '</li>
            </ul>';

    sendMail($mail);
    $mail->SmtpClose();
    unset($mail);
}