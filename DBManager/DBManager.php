<?php

class DBManager
{
    function createArtCostColumn() {
        if ($this->artCostIsExits())
            return false;

        global $wpdb;

        $sql = "ALTER TABLE ".$wpdb->prefix."posts ADD art_cost long";
        $result = $wpdb->query($sql);
        if($result == false)
            return false;
        else
            return true;
    }

    function artCostIsExits() {
        global $wpdb;

        $sql = "SHOW COLUMNS FROM ".$wpdb->prefix."posts LIKE 'art_cost';";
        $result = $wpdb->get_results($sql);

        $index = 0;
        foreach ($result as $value) {$index++;}

        if ($index > 0)
            return true;
        else
            return false;
    }

    function saveArtCost($postID, $art_cost) {
        if (!$this->artCostIsExits())
            return false;

        $get_art_cost = $this->geArtCost($postID);

        if ($get_art_cost == $art_cost)
            return true;

        global $wpdb;

        $result = $wpdb->update($wpdb->prefix.'posts', array('art_cost' => $art_cost), array('ID' => $postID));
        if ($result == false)
            return false;
        else
            return true;
    }

    function geArtCost($postID) {
        if (!$this->artCostIsExits())
            return false;

        global $wpdb;

        $sql = "SELECT art_cost FROM " . $wpdb->prefix . "posts WHERE ID = " . $postID;
        $result = $wpdb->get_results($sql);

        if ($result != null)
            return $result[0]->art_cost;
        else
            return false;
    }
}