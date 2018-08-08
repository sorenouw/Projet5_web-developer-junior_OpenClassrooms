<?php
  class Instagram
  {
      public $user_id = '';

      public function __construct($user_id)
      {
          $this->user_id = $user_id;
      }



      public function getMedia($count = 20)
      {
          $url = 'https://www.instagram.com/' . $this->user_id . '/media/';

          $json = $this->fetchData($url);

          $data = json_decode($json);

          if (!isset($data->items)) {
              return array();
          }

          $return = array();

          $i = 0;

          foreach ($data->items as $post) {
              $return[] = array(

'link' => $post->link,

'type' => $post->type, 'img' => $post->images->thumbnail->url,

'img2' => $post->images->low_resolution->url,

'img3' => $post->images->standard_resolution->url,

);

              $i++;

              if ($i >= $count) {
                  break;
              }
          }

          return $return;
      }



      private function fetchData($url)
      {
          $ch = curl_init();

          curl_setopt($ch, CURLOPT_URL, $url);

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          curl_setopt($ch, CURLOPT_TIMEOUT, 20);

          $result = curl_exec($ch);

          curl_close($ch);

          return $result;
      }
  }
