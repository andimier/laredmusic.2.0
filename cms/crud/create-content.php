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

		private function getNewsDefaultSettings($post) {
			date_default_timezone_set('America/Bogota');
			$date = date("Y-m-d");

			return [
                'fecha' => "'" . $date . "'",
                'titulo' => "'" . $post['titulo'] . "'",
                'alt' => "''",
                'tags' => "''",
                'contenido' => "''",
                'imagen1' => "'../iconos/photo2.png'",
                'imagen2' => "'../iconos/photo2.png'",
                'imagen3' => "'../iconos/photo2.png'",
                'video' => "''",
            ];
		}

		private function getNewsEntrieSettings($post) {
			date_default_timezone_set('America/Bogota');
			$date = date("Y-m-d");

			return [
                'creation_date' => "'" . $date . "'",
                'title' => "'" . $post['title'] . "'",
                'video' => "'" . $post['video'] . "'",
            ];
		}

		private function insertContent($post) {
			global $contentCreated;

			$table = $post['table'];
			$default_settings =  null;

			switch ($table) {
				case 'noticias':
					$default_settings = $this->getNewsDefaultSettings($post);
					break;
				case 'entries':
					$default_settings = $this->getNewsEntrieSettings($post);
					break;
			}

            $q = $this->getQuery($table, $default_settings);
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
			global $contentCreated;

            $this->insertContent($post);
		    header('Location: ../' . $post['redirect-page'] . '?contentCreated=' . $contentCreated);
        }
	}

	try {
        $new_content = new Content;
		$new_content->tryCreateContent($_POST);
	} catch (Exception $e) {
		echo $e;
	}
?>