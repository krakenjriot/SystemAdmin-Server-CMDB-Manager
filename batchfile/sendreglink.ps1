     Param(
        [Parameter(Mandatory=$True,Position=1)]
            [string]$email,[string]$hash,
        [switch]$force = $false
       )


	#C:\xampp\htdocs\kraken\batchfile\report\$reportname
	
	$html = "<!DOCTYPE html>
			<html>
			<head><title>Reset Password</title></head>
			<body>
			<p>click the link below to reset password</p>
			<p><a href='http://hwinv/kraken/verify_registration_link.php?email=$email&x=$hash' ><em>click here!</em></a>
			</p>
			</body>
			</html>
			"
	
	
	
	###########Define Variables########

    $fromaddress = "donotreply@nwc.com.sa"
    $toaddress = $email
    #$bccaddress = "testastika_report@nwc.com.sa"
    #$CCaddress = "rolly@nwc.com.sa"
	
	
	
	
    $Subject = "Testastika Verify Registration Mail"
    $body = $html
	#$body = "_" get-content .\content.htm
    $attachment = ""
    $smtpserver = "smtp.nwc.com.sa"

    ####################################

    $message = new-object System.Net.Mail.MailMessage
    $message.From = $fromaddress
    $message.To.Add($toaddress)
    $message.CC.Add($CCaddress)
    $message.Bcc.Add($bccaddress)
    $message.IsBodyHtml = $True
    $message.Subject = $Subject
    $attach = new-object Net.Mail.Attachment($attachment)
    $message.Attachments.Add($attach)
    $message.body = $body
    $smtp = new-object Net.Mail.SmtpClient($smtpserver)
    $smtp.Send($message)

    #################################################################################
