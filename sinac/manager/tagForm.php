<?php
	class TagForms {
		
		private $html= "";
		private $query = "";
		
		public function __construct($html, $query){
			$this->html= $html;
			$this->query= $query;
		}
		
		public function setHtml(TagForms $html){
			$this->html= $html;
		}
		
		public function getHtml() {
			return $this->html;
		}
		
		public function setQuery(TagForms $query){
			$this->query= $query;
		}
		
		public function getQuery() {
			return $this->query;
		}
        
        public function getTagValuetoIdentifyForm(){
            /*$html = '
            <div id="idAddForm" style="visibility:hidden" attrLoc="add">
                ...
            </div>';*/
            $entrytemp = "";
            $doc = DOMDocument::loadHTML($this->getHtml());
            $xpath = new DOMXPath($doc);
            //$query = "//div[@id='idAddForm']";
            $entries = $xpath->query($this->getQuery());
            foreach ($entries as $entry) {
                $entrytemp = $entry->getAttribute("attrloc");
            }
            return $entrytemp;
        }
	}
?>