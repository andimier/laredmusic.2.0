<?php
    class Nav {
        private function getSectionsHtml() {
            $html = '<ul>';

            for ($i = 0; $i < count($this->sections); $i++) {
                if ($this->sections[$i] == 'noticias') {
                    $html .= '<li><a href="noticias.php">' . $this->sections[$i] . '</a></li>';
                } else {
                    $html .= '<li><a href="editar-contenido.php">' . $this->sections[$i] . '</a></li>';
                }
            }
            // <a href=\"editar-seccion.php?seccion=" . urlencode($seccion["id"]) . "\">{$seccion["titulo"]}</a></li><br />

            return $html .= '</ul>';
        }

        public function getSections() {
            $this->sections = [
                'music masters',
                'noticias'
            ];

            return $this->getSectionsHtml();
        }
    }
?>