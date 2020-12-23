<?php
    class News {
        private function getTags($tags) {
            $tags_html = '<div class="news-tags-wrapper">';

            for ($i = 0; $i < count($tags); $i++) {
                $tags_html .= '<div class="news-tag">' . $tags[$i] . '</div>';
            }

            return $tags_html . '</div>';
        }

        private function getFilteredNewsByTag($apply_filter, $news) {
            $filtered_news = array();

            for ($i = 0; $i < count($news); $i++) {
                $tags = !empty($news[$i]['tags']) ? explode(',', $news[$i]['tags']) : array();

                if (!$apply_filter && empty($tags)) {
                    array_push($filtered_news, $news[$i]);
                }

                if ($apply_filter && !empty($tags) && in_array($this->filter, $tags)) {
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


            return $this->getFilteredNewsByTag($apply_filter, $output);

        }

        private function getNews() {
            $q = "SELECT * FROM noticias ORDER BY fecha DESC";

            $r = phpMethods('query', $q);

            if ($r == false) {
                return null;
            }

            return $r;
        }

        private function getReducedNewsSet($newsSet) {
            $reduced_news = array();
            $limiter = 5;

            for ($i = 0; $i < count($newsSet); $i++) {
                if ($i == $limiter) {
                    break;
                }

                array_push($reduced_news, $newsSet[$i]);
            }

            return $reduced_news;
        }

        public function getAllNews($filter, $isFeaturedNews) {
            $this->filter = $filter;
            $this->isFeaturedNews = $isFeaturedNews;

            $news = $this->getNews();

            if ($news == null) {
                return 'error, no se pudieron recuperar las noticias';
            }

            $parsed_news = $this->parsedNews($news);

            return $isFeaturedNews ? $this->getReducedNewsSet($parsed_news) : $parsed_news;
        }

        public function getSingleNews($get) {
            $id = $get;
            $q = "SELECT * FROM noticias WHERE id = " . $id;

            return phpMethods('query', $q);
        }
    }
?>
