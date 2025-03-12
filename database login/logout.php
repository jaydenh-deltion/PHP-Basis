<?php
// deze regel start een sessie om gegevens van gebruikers op te slaan zodat ze op meerdere pagina's gebruikt kunnen worden 
session_start();

//deze regel vernietigd de sessie en worden de gegevens verwijderd 
session_destroy();

// stuurt de gebruiker naad de login pagina 
header("location: login.php");
// stopt het uitvoeren van de code 
exit;