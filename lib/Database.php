<?php

    class Database extends PDO {
        function __construct() {		
            parent::__construct('mysql:host=localhost;dbname=jf_cars', 'jf_admin', 'C4rs2018!');
        }
    }
