<?php
    class Vertex {
		public static $verbose = False;
		private $_x;
		private $_y;
		private $_z;
		private $_w = 1.0;
		private $_color;

		public static function doc() {
            if ($docs = file_get_contents("Vertex.doc.txt"))
                echo ($docs);
            else
                echo ("Error: Documentation not found!");
        }

		public function __construct(array $coords) {
			$this->_x = $coords['x'];
			$this->_y = $coords['y'];
			$this->_z = $coords['z'];
			if (isset($coords['w']))
				$this->_w = $coords['w'];
			if (isset($coords['color']))
				$this->_color = $coords['color'];
			else
				$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));

			if (self::$verbose)
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}
		
		public function __destruct() {
			if (self::$verbose)
                printf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue);
		}

        public function __toString() {
			if (self::$verbose)
				return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f, Color( red: %3d, green: %3d, blue: %3d ) )", array($this->_x, $this->_y, $this->_z, $this->_w, $this->_color->red, $this->_color->green, $this->_color->blue)));
           	return (vsprintf("Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f )", array($this->_x, $this->_y, $this->_z, $this->_w)));
        }		

		public function getX() {
			return ($this->_x);
		}

		public function setX($newX) {
			$this->_x = $newX;
		}

		public function getY() {
			return ($this->_y);
		}

		public function setY($newY) {
			$this->_y = $newY;
		}

		public function getZ() {
			return ($this->_z);
		}

		public function setZ($newZ) {
			$this->_z = $newZ;
		}

		public function getW() {
			return ($this->_w);
		}

		public function setW($newW) {
			$this->_w = $newW;
		}

		public function getColor() {
			return ($this->_color);
		}

		public function setColor($newColor) {
			$this->_color = $newColor;
		}
    }
?>
