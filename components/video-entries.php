<?php
    class VideoEntries {
        private function getCurl($url) {
            $curl = curl_init($url);

            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_TIMEOUT, 30);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

            $response = curl_exec($curl);
            curl_close($curl);

            return $response;
        }

        private function getVideoData($id) {
            $tiktok_user = '@maisadelosrios';

            $videoUrl = 'https://www.tiktok.com/oembed?url=https://www.tiktok.com/';
            $videoUrl .= $tiktok_user;
            $videoUrl .= '/video/' . $id;

            return $this->getCurl($videoUrl);
        }

        public function get_video_entries() {
            $q = "SELECT * FROM entries";
            $r = phpMethods('query', $q);
            $video_entries = array();
            $video_element_id = 0;

            if ($r) {
                while ($video_entry = phpMethods('fetch-array', $r)) {
                    $video_data = $this->getVideoData($video_entry['video']);
                    $data = json_decode($video_data);

                    if (!isset($data->{'status_msg'})) {
                        array_push($video_entries, array(
                            'thumbnail_url' => $data->thumbnail_url,
                            'title' => $data->title,
                            'video_element_id' => $video_element_id,
                            'video_id' => $video_entry['video']
                        ));

                        $video_element_id += 1;
                    }
                }
            }

            return $video_entries;
        }
    }
?>
