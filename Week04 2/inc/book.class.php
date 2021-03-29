<?php
class Book {
	
	// the total number of pages in the book
	var $pageCount = 0;
	// the current page 
	var $currentPage = 0;	
	// the list of pages in the book
	var $pages = array(
		"this is the title page",
		"this is page 1",
		"this is page 2",
		"this is page 3",
		"this is page 4"
	);
	
	
	// get the current page textdomain
	function getCurrentPageText() {
		return $this->pages[$this->currentPage];
	}
	
	// update the current page to the next page
	function nextPage() {
		$this->currentPage++;
		//$this->currentPage = $this->currentPage + 1;
	}
	
	// update the current page to the previous page
	function previousPage() {
		$this->currentPage--;
		//$this->currentPage = $this->currentPage - 1;
	}
		
}
?>