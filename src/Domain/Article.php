<?php

namespace MicroCMS\Domain;

use MicroCMS\DAO\ArticleDAO;

class Article 
{
    /**
     * Article id.
     *
     * @var integer
     */
    private $id;

    /**
     * Article title.
     *
     * @var string
     */
    private $title;

    /**
     * Article content.
     *
     * @var string
     */
    private $content;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {

        $content = str_replace("[b]", "<strong>", $content);
        $content = str_replace("[/b]", "</strong>", $content);
        
        $content = str_replace("[br/]", "<br/>", $content);
        $content = str_replace("[br]", "", $content);
        
        $content = str_replace("[i]", "<em>", $content);
        $content = str_replace("[/i]", "</em>", $content);
        
        $content = str_replace("[code]", "<code>", $content);
        $content = str_replace("[/code]", "</code>", $content);
        $content = preg_replace('#\[u](.+?)\[/u]#si','<span style="text-decoration:underline;">$1</span>',$content );
        $content = preg_replace('#\[size= x-small](.+?)\[/size]#si','<span style="font-size:8px;">$1</span>',$content );
        $content = preg_replace('#\[size= x-large](.+?)\[/size]#si','<span style="font-size:35px;">$1</span>',$content);
        $content = preg_replace('#\[size= medium](.+?)\[/size]#si','<span style="font-size:15px;">$1</span>',$content );
        $content = preg_replace('#\[size= small](.+?)\[/size]#si','<span style="font-size:10px;">$1</span>',$content );
        $content = preg_replace('#\[size= large](.+?)\[/size]#si','<span style="font-size:25px;">$1</span>',$content );
                        
        
        $content = preg_replace('#\[url=([^\]]+)\](.+?)\[/url\]#si','<a href="$1" >$2</a>',$content );
        $content = preg_replace('#\[url\](.+?)\[/url\]#si', '<a href="$1" target="_blank">$1</a>',$content );
        $content = preg_replace('#\[img\](.+?)\[/img\]#si', '<img src="$1" border="0">',$content );


        $this->content = $content;
        return $this;
    }
}
