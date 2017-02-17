<?php
namespace Services;
class Methods {
    // getArticleId($reqURL)
    public function getArticleId($reqURL) {
        $id = null;
        if ($reqURL == "/new.php") {
            $id = 'new';
        } else {
            $id = array_pop(explode('/', $reqURL));
        }
        return $id;
    }
}
?>