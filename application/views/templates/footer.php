                <style type="text/css">
                	html {
					  position: relative;
					  min-height: 100%;
					}
					body {
					  /* Margin bottom by footer height */
					  margin-bottom: 60px;
					}
					.footer {
					  position: absolute;
					  bottom: 0;
					  width: 100%;
					  /* Set the fixed height of the footer here */
					  height: 60px;
					  background-color: #f5f5f5;
					}

					/* This is not required for sticky footer Just styling for footer */
					body > .container {
					  padding: 60px 15px 0;
					}
					.container .text-muted {
					  margin: 20px 0;
					}
					.footer > .container {
					  padding-right: 15px;
					  padding-left: 15px;
					}
                </style>

                <footer class="footer">
			      	<div class="container">
			        	<p class="text-muted">Place sticky footer content here.</p>
			      	</div>
			    </footer>
        </body>
</html>

<script type="text/javascript">
$(document).ready(function() {
    $('.dropdown-toggle').dropdown()
});
</script>