<?php
    class News {
        private function getTags($tags) {
            $tags_html = '<div class="news-tags-wrapper">';

            for ($i = 0; $i < count($tags); $i++) {
                $tags_html .= '<div class="news-tag">' . $tags[$i] . '</div>';
            }

            return $tags_html . '</div>';
        }

        private function getFilteredNews($news) {
            $filtered_news = array();

            for ($i = 0; $i < count($news); $i++) {
                $tags = !empty($news[$i]['tags']) ? explode(',', $news[$i]['tags']) : array();

                if (!empty($tags) && in_array($this->filter, $tags)) {
                    array_push($filtered_news, $news[$i]);
                }
            }

            return $filtered_news;
        }

        private function parsedNews($news) {
            $output = array();
            $apply_filter = $this->filter != null;

            while($n = phpMethods('fetch-array', $news)) {
                $tags = !empty($n['tags']) ? explode(',', $n['tags']) : '';

                $nn = array(
                    'id' => $n['id'],
                    'date' => $n['fecha'],
                    'title' => $n['titulo'],
                    'tags' => $n['tags'],
                    'html_tags' => !empty($tags) ? $this->getTags($tags) : '',
                    'small_image' => $n['imagen1'],
                );

                array_push($output, $nn);
            }

            if ($apply_filter) {
                return $this->getFilteredNews($output);
            }

            return $output;
        }

        private function getNews() {
            $q = "SELECT * FROM noticias ORDER BY fecha DESC";
            $r = phpMethods('query', $q);

            if ($r == false) {
                return null;
            }

            return $r;
        }

        public function getAllNews($filter) {
            $this->filter = $filter;
            $news = $this->getNews();

            if ($news == null) {
                return 'error, no se pudieron recuperar las noticias';
            }

            return $this->parsedNews($news);

        }

        public function getSingleNews($get) {
            $id = $get;
            $q = "SELECT * FROM noticias WHERE id = " . $id;

            return phpMethods('query', $q);
        }
    }
?>
