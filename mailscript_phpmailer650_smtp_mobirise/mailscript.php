<?php
/*
 * mailscript.php versenden über SMTP
 * Version vom 21.07.2021
 * 
 * Erfolgreich getestet mit: PHPMailer Version: 6.5.0
 */

// PHPMailer einbinden
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master/src/Exception.php";
require "PHPMailer-master/src/PHPMailer.php";
require "PHPMailer-master/src/SMTP.php";

// Danke und Fehlerseite
$dankeSeite = "danke.html"; // Danke - Seite, die Mail wurde erfolgreich versandt.
$fehlerSeite = "fehler.html"; // Fehler - Seite, falls die Mail nicht versandt werden konnte.

// Betreff
// Jede E-Mail benötigt einen Betreff, da jedoch im Formular kein
// entsprechendes Feld gesetzt wurde, wird ein fester Betreff hinzugefügt.
$betreffEmail = "Kontaktformular Homepage";


// Wurden POST-Daten gesendet?
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Zeitzone und das aktuelle Datum setzen
  date_default_timezone_set("Europe/Berlin");
  $datum = date("d.m.Y H:i");

  // HTML-Tags entfernen
  $_POST = array_map('strip_tags', $_POST);

  // Inhalt der E-Mail setzen
  $inhaltEmail = "Gesendet am: $datum Uhr
   Name: " . $_POST["name"] . "
   E-Mail: " . $_POST["email"] . "
   Phone: " . $_POST["phone"] . "

   Nachricht: " . $_POST["message"] . "
  ";

  // Instanz und Zeichenkodierung setzen
  $mail = new PHPMailer();
  $mail->CharSet = "UTF-8";

  // Servereinstellungen
  $mail->isSMTP(); // Senden mit SMTP
  $mail->Host = "smtp.ionos.de"; // Postausgangsserver (SMTP)
  $mail->SMTPAuth = true; // SMTP-Authentifizierung aktivieren
  $mail->Username = "mail@example.com"; // SMTP Benutzername
  $mail->Password = "***********"; // SMTP Passwort
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Implizite TLS-Verschlüsselung aktivieren
  $mail->Port = 465; // Port - Postausgangsserver (SMTP)

 // Absender und Empfänger
 $mail->setFrom("mail@example.com", "John Doe"); // Absender
 $mail->addAddress("jane@outlook.com", "Jane Foo"); // Empfänger

  // Betreff und Body setzen
  $mail->Subject = $betreffEmail;
  $mail->Body = $inhaltEmail;

 // E-Mail versenden
 if ($mail->Send()) {
  header("Location: " . $dankeSeite);
 }
 else {
  header("Location: " . $fehlerSeite);
 }
}
?>