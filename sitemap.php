<?php

class Sitemap
{

    public $records = array();


    /**
     * Add new sitemap item to $records array
     */
    public function add($loc, $lastmod = null, $priority = '0.50', $freq = 'monthly')
    {
        $this->records[] = array(
            'loc' => $loc,
            'lastmod' => $lastmod,
            'priority' => $priority,
            'freq'=> $freq
        );
    }


    /**
     * Returns xml document with all sitemap items from $records
     */
    public function render()
    {
        return Response::make(Response::view('sitemap::view', array('records' => $this->records)), 200, array('Content-type' => 'text/xml; charset=utf-8'));
    }

}