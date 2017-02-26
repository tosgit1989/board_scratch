<?php
namespace Services;
class Methods {
    // getarticleId($reqURL)
    public function getarticleId($reqURL) {
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