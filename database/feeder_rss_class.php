<?php
 class rss {
        var $feed;
        function rss($feed){
            $this->feed = $feed;
        }

        function parse(){
            $rss = simplexml_load_file($this->feed);

            //print_r($rss);die; /// Check here for attributes

            $rss_split = array();

            foreach ($rss->channel->item as $item) {

              $title = (string) $item->title; 
              $link   = (string) $item->link; 
              $pubDate   = (string) $item->pubDate; 
              $description = (string) $item->description; 
              $image = $rss->channel->item->enclosure->attributes();
              $image_url =   $image['url'];

             $rss_split[] = '
                    <li>
                        <h5><a href="'.$link.'">'.$title.'</a></h5>
                        <span class="dateWrap">'.$pubDate.'</span>
                        <p>'.$description.'</p>
                        <a href="'.$link.'">Read Full Story</a>
                    </li>
                ';
            }
            return $rss_split;
        }

        function display($numrows,$head){

            $rss_split = $this->parse();
            $i = 0;
            $rss_data = '<h2>'.$head.'</h2><ul class="newsBlock">';
            while($i<$numrows){
              $rss_data .= $rss_split[$i];
              $i++;
            }
            $trim = str_replace('', '',$this->feed);
            $user = str_replace('&lang=en-us&format=rss_200','',$trim);


            $rss_data.='</ul>';

            return $rss_data;
        }
}
?>