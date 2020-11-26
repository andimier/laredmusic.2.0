<?php
    class EntriesReader {
        private function confirm_query($result_set){
            if (!$result_set) {
                die("La busqueda en la Base de Datos fallo: " . phpMethods('error', null));
            }
        }

        public static function get_all_news_entries(){
            global $connection;
            $q = "SELECT * FROM noticias ORDER BY fecha DESC";
            $r = phpMethods('query', $q);

            self::confirm_query($r);
            return $r;
        }

        public static function get_all_entries(){
            global $connection;
            $q = "SELECT * FROM entries ORDER BY creation_date DESC";
            $r = phpMethods('query', $q);

            self::confirm_query($r);
            return $r;
        }
    }
?>