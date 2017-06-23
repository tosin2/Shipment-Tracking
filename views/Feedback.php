
<!DOCTYPE HTML>
<HTML>
	 <HEAD>
	   	<TITLE>Feedback Form</TITLE>
	 </HEAD>
	<BODY>
		<form action="send_mail.php" method="post">
			<?php
				if (isset($_GET['error'])){
					echo "<p style='color: red'>The PIN you entered is incorrect. Please try again</p>";	
				}

			 ?>
			<table>
				<tr>
					<td>Secret PIN:</td>
					<td>
						<input type="text" name="pin" value="" maxlength="8" minlength="8"  required/>
					</td>
				</tr>
				<tr>
					<td>Comments:</td>
					<td>
						<textarea rows="10" cols="50" name="comments" required></textarea>
					</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<input type="submit" value="Submit" />
					</td>
				</tr>
			</table>
		</form>
	</BODY>
</HTML>