<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>administrator</title>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel='stylesheet' type='text/css' media='all' href='main.css'>
	<!-- <script src='main.js'></script> -->
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			overflow: hidden;/* hidden or*/
			height: 100%; 
			max-height: 100%; 
			font-family:Sans-serif;
			line-height: 1.5em;
		}
		#header {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100px; 
			overflow: scroll; /* Disables scrollbars on the header frame. To enable scrollbars, change "hidden" to "scroll" */
			background: #BCCE98;
		}
		#nav {
			position: absolute; 
			top: 100px; 
			left: 0; 
			bottom: 0;
			width: 230px;
			overflow: auto; /* Scrollbars will appear on this frame only when there's enough content to require scrolling. To disable scrollbars, change to "hidden", or use "scroll" to enable permanent scrollbars */
			background: #DAE9BC; 		
		}
		#logo {
			padding:10px;
		}
		main {/*main*/
			position: fixed;
			top: 100px; /* Set this to the height of the header */
			left: 230px; 
			right: 0;
			bottom: 0;
			overflow: auto; 
			background: #fff;
		}
		.innertube {
			margin: 15px; /* Provides padding for the content */
		}
		p {
			color: #555;
		}
		nav ul {
			list-style-type: none;
			margin: 0;
			padding: 0;
		}
		nav ul a {
			color: darkgreen;
			text-decoration: none;
		}	
		/*IE6 fix*/
		* html body{
			padding: 100px 0 0 230px; /* Set the first value to the height of the header and last value to the width of the nav */
		}
		* html main{ 
			height: 100%; 
			width: 100%; 
		}
		</style>	
</head>
<FRAMESET ROWS="90%,10%" frameBorder=no>
<FRAMESET COLS="20%,80%" frameBorder=no>
<FRAMESET ROWS="18%,82%" frameBorder=no>
<FRAME SRC="logo.html" scrolling=no>
<FRAME SRC="menu.html" scrolling=no>
</FRAMESET>
<FRAME SRC="index.html" NAME="main" scrolling=auto>	
</FRAMESET>
<FRAME SRC="footers.html" scrolling=no>
</FRAMESET>
</html>