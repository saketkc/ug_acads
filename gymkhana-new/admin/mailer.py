import sys
email = str(sys.argv[1])+"@gmail.com"
subject = str(sys.argv[2])
message = str(sys.argv[3])
from smtplib import SMTP
import datetime
debuglevel = 1
smtp = SMTP()
smtp.set_debuglevel(debuglevel)
smtp.connect("smtp-auth.iitb.ac.in",25)
smtp.starttls()
smtp.login('saket.kumar', 'thisisit1314.')
from_addr = "Gymkhana IIT Bombay <do-not-reply@iitb.ac.in>" #Example : "Anil Shanbhag <anil@cse.iitb.ac.in>"
to_addr = email
subj =  subject
date = datetime.datetime.now().strftime( "%d/%m/%Y %H:%M" )
message_text = message
msg = "From: %s\nTo: %s\nSubject: %s\nDate: %s\n\n%s" % ( from_addr, to_addr, subj, date, message_text )
smtp.sendmail(from_addr, to_addr, msg)
smtp.quit()

