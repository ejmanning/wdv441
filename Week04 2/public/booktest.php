<?php
// we need to include the class definition in order to create an instance
require_once("../inc/book.class.php");

// create an instance of the book
$book = new Book();

// read the current page
echo "<br>" . $book->getCurrentPageText();

// turn the page
$book->nextPage();

// read the current page
echo "<br>" . $book->getCurrentPageText();

// turn the page
$book->nextPage();

// read the current page
echo "<br>" . $book->getCurrentPageText();

// turn the page back
$book->previousPage();

// read the current page
echo "<br>" . $book->getCurrentPageText();

?>