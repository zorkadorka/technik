<footer>
	<div class="separator"></div>
	<p><small>FS Technik - ANNO 1953 - Powered By Wordpress</small></p>
</footer>

<!-- SVG filter for Firefox  -->
<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
    <filter id="blur">
     	<feGaussianBlur stdDeviation="3"/>
    </filter>
    <filter id="drop-shadow">
	    <feGaussianBlur in="SourceAlpha" stdDeviation="2"/>
	    <feOffset dx="5" dy="5" result="offsetblur"/>
	    <feFlood flood-color="#000000"/>
	    <feComposite in2="offsetblur" operator="in"/>
	    <feMerge>
		    <feMergeNode/>
		    <feMergeNode in="SourceGraphic"/>
	    </feMerge>
	</filter>
</defs>
</svg>	
</div> <!-- .wrap -->
</div> <!-- #container -->
<?php wp_footer(); ?>
</body>
</html>
