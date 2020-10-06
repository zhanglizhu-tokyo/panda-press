<?php
/****************************************

	footer.php

	フッターを表示するための
	テンプレートファイルです。

	footer.php のコードに関しては、
	CHAPTER 11 で詳しく解説しています。

*****************************************/
?>
<!-- footer.php -->
</div><!-- / container -->
<!-- footer -->
<div id="footer">
		<p id="copyright" class="wrapper">
                    &copy; <?php bloginfo( 'name' ); ?> All Rights Reserved.
                <a href="/siteinfo/" class="footer-bussiness">運営者情報と免責事項</a>
                </p>                
</div>
<?php wp_footer(); ?>
</body>
</html>
<!-- /footer.php -->