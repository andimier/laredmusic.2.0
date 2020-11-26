<?php
	require_once("../cnx/session.php");
	require_once("../cnx/connection.php");
	require_once('../../utils/phpfunctions.php');
	require_once('../../utils/checks.php');
	require_once('../includes/functions.php');

	$contentCreated = 'false';

	class Content {

        private function getQuery($table, $query_array) {
			$columns = "";
			$values = "";
			$i = 0;

			foreach($query_array as $key => $val) {
				$columns .= $key;
				$values .= $val;

				if ($i < (count($query_array) - 1)) {
					$columns .= ", ";
					$values .= ", ";
				}
				$i++;
			}

			return " INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $values . ")";
		}

		private function insertContent($post) {
            global $contentCreated;

            date_default_timezone_set('America/Bogota');
            $date = date("Y-m-d");

            $q = $this->getQuery($post['tabla'], [
                'fecha' => "'" . $date . "'",
                'titulo' => "'" . $post['titulo'] . "'",
                'alt' => "'undefined'",
                'tags' => "'undefined'",
                'contenido' => "'undefined'",
                'imagen1' => "'../iconos/photo2.png'",
                'imagen2' => "'../iconos/photo2.png'",
                'imagen3' => "'../iconos/photo2.png'",
                'video' => "'undefined'",
            ]);

			$r = phpMethods('query', $q);

			if ($r == false) {
				throw new Exception('Hubo un error al actualizar la base de datos. '. phpMethods('error', null));
			}

			$contentCreated = 'true';
        }

        private function hasMissingData($post) {
            return !isset($post['create-content']) ||
                !empty(checkRequiredFields($post, ['titulo']));

        }

        public function tryCreateContent($post) {
            if ($this->hasMissingData($post) == true) {
                throw new Exception('Hubo un error al actualizar la base de datos. '. phpMethods('error', null));
            }

            $this->insertContent($post);
		    header('Location: ../noticias.php?contentCreated=' . $contentCreated);
        }
	}

	try {
        $new_content = new Content;
		$new_content->tryCreateContent($_POST);
		header('Location: ../noticias.php?contentCreated=' . $contentCreated);
	} catch (Exception $e) {
		echo $e;
	}
?>