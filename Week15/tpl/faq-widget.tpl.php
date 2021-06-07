<style>
  .faq-widget {
    width: 15%;
    background-color: gray;
    text-align: center;
    padding: 1%;
    border: thin solid gray;
    float: right;
  }

  .faq-widget h2 {
    text-decoration: underline;
  }

  .faq-question {
    border-top: thin dashed black;
    padding-top: 5%;
  }

</style>
  <div class = "faq-widget">
    <h2>FAQ</h2>
		<?php foreach ($faqList as $faqInfo) { ?>
			<?php if ($faqCount++ >= $faqLimit) break; ?>
			<h3 class="faq-question">Q: <?php echo $faqInfo["faqQuestion"]; ?></h3>
      <div class="faq-answer"><p>A: <?php echo $faqInfo["faqAnswer"]; ?></p></div>
		<?php } ?>
    <a href="faq-list.php"><button>View All FAQs</button></a>
  </div>
