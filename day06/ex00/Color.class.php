<?php
    class Color {
        public $red;
        public $green;
        public $blue;
        public static $verbose = False;

        public function __construct(array $color) {
            if (isset($color['red']) && isset($color['green']) && isset($color['blue'])) {
                $this->red = intval($color['red'], 10);
                $this->green = intval($color['green'], 10);
                $this->blue = intval($color['blue'], 10);
            }
            else if (isset($color['rgb'])) {
                $this->red = ($color['rgb']>>16) & 255;
                $this->green = ($color['rgb']>>8) & 255;
                $this->blue = $color['rgb'] & 255;
            }
            if (self::$verbose)
                printf($this . " constructed.\n");
        }

        public function __destruct() {
            if (self::$verbose)
                printf($this . " destructed.\n");
        }

        public function __toString() {
            return (vsprintf("Color( red: %3d, green: %3d, blue: %3d )", array($this->red, $this->green, $this->blue)));
        }

        public static function doc() {
            if ($docs = file_get_contents("Color.doc.txt"))
                echo ($docs);
            else
                echo ("Error: Documentation not found!");
        }

        public function add($color) {
            $new = new Color(array('red' => $this->red + $color->red, 'green' => $this->green + $color->green, 'blue' => $this->blue + $color->blue));
            return $new;
        }

        public function sub($color) {
            $new = new Color(array('red' => $this->red - $color->red, 'green' => $this->green - $color->green, 'blue' => $this->blue - $color->blue));
            return $new;
        }

        public function mult($factor) {
            $new = new Color(array('red' => $factor * $this->red, 'green' => $factor * $this->green, 'blue' => $factor * $this->blue));
            return $new;
        }
    }
?>
