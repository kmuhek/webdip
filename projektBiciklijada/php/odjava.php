<?php
    require_once 'sesija.class.php';

    Sesija::kreirajSesiju();
    
    Sesija::obrisiSesiju();
    header("Location: ../html/index.html");