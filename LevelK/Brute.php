<?php

namespace Hackathon\LevelK;

class Brute
{
    private $hash;
    public $origin;
    private $method; // md5 - crc32 - base64 - sha1

    public function __construct($hash)
    {
        $this->hash = $hash;
    }

    /**
     * @TODO :
     *
     * Cette méthode essaye de trouver par la force à quel mot de 4 lettres correspond ce hash.
     * Sachant que nous ne connaissons pas le hash (enfin si... il suffit de regarder les commentaires de l'attribut privé $methode.
     */
    public function force()
    {
        var_dump($this->method);
        var_dump($this->hash);
            for ($i = ord("a"); $i <= ord("z"); $i++)
            {
                for ($j = ord("a"); $j <= ord("z"); $j++)
                {
                    for ($k = ord("a"); $k <= ord("z"); $k++)
                    {
                        for ($l = ord("a"); $l <= ord("z"); $l++)
                        {
                            $tmp = chr($i) . chr($j) . chr($k) . chr($l);
                            if (md5($tmp) == $this->hash)
                            {
                                $this->origin = $tmp;
                                $this->method = "md5";
                                return $tmp;
                            }
                            if (crc32($tmp) == $this->hash)
                            {
                                $this->origin = $tmp;
                                $this->method = "crc32";
                                return $tmp;
                            }
                            if (base64_encode($tmp) == $this->hash)
                            {
                                $this->origin = $tmp;
                                $this->method = "base64";
                                return $tmp;
                            }
                            if (sha1($tmp) == $this->hash)
                            {
                                $this->origin = $tmp;
                                $this->method = "sha1";
                                return $tmp;
                            }
                        }
                    }
                }
            }
       // }
        // @TODO
}
}
