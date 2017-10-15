<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title></title>
		<meta name="" content="">

	</head>
	<body bgcolor="wheat" onload="gettime();">

		<script>
						function confirmSubmit()
			{
			if(document.forms[0].elements[0].value != "" &&
			document.forms[0].elements[1].value != "" &&
			document.forms[0].elements[2].value != "" &&
			document.forms[0].elements[3].value != "")
			{
			return true;
			}
			else
			{
			window.alert("Please fill in all fields before submitting");
			return false;
			}
			}

			function gettime()
			{
			var today = new Date();
			var year = today.getFullYear();
			var month = today.getMonth();
			var day = today.getDate();
			var hour = today.getHours();
			var minute = today.getMinutes();
			var second = today.getSeconds();
			
			//insert into table1(approvaldate)values('20120618 10:34:09 AM');

            document.forms[0].elements[2].style.visibility = "hidden";
			document.forms[0].elements[2].value = year + "-" + month + "-" + day + " " + hour +":"+ minute +":"+second;
						
			}
		</script>

		<br />
		<h1>PHP Q&A Message Board</h1>

		<b>
		<p>
			Welcome to the PHP Q&A message board where you can ask questions and provide answers to questions.
		</p></b>

		<br />

		<h2>Post New Message</h2>
		<hr>
		<form action="PostMessage.php" method="POST">
			<span style="font-weight:bold">Subject:</span>
			<input type="text" name="subject" />
			<span style="font-weight:bold">Name:</span>
			<input type="text" name="name" />
			<input type="text" name="cur_time" />
			<br />
			<br />
			<textarea name="message" rows="6" cols="80"></textarea>
			<br />
			<br />

			<input type="submit" name="submit" onClick="return confirmSubmit();" value="Post Message"/>
			<input type="reset" name="reset" value="Reset Form"/>
		</form>
		<hr />
		<p>
			<a href="MessageBoard.php">View Messages</a>

		</p>
	</body>
</html>