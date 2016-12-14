<?php

/**
 * Description of sendMail
 *
 * @author lwilliston
 */

//****   lwilliston - check path  ****//
require_once __DIR__ . '/../vendor/autoload.php';

//use PHPMailer;

class sendMail {
    //add properties to hold mailing attributes//
    // protected can be accessed only within the class itself and by inherited classes.
    
    protected $toname;
    protected $toemail;
    protected $fromname;
    protected $fromemail;
    protected $messagetext;
    protected $messagehtml;
    protected $mailsubject;
    protected $replytoname;
    protected $replytoemail;
    

    //constructor
    /**
     * sendMail() Class
     * This class will send email using Gmail
     * 
     * @param string $replyToEmail
     * @param string $replyToName
     * @param string $mailSubject
     * @param string $messageHtml
     * @param string $messageText
     * @param string $fromEmail
     * @param string $fromName
     * @param string $toEmail
     * @param string $toName
     */
    public function __construct(string $replyToEmail, string $replyToName,
                                string $mailSubject, string $messageHtml,
                                string $messageText, string $fromEmail,
                                string $fromName,
                                string $toEmail,string $toName) {
        
        $this->replytoemail=$replyToEmail;
        $this->replytoname=$replyToName;
        $this->mailsubject=$mailSubject;
        $this->messagehtml=$messageHtml;
        $this->messagetext=$messageText;
        $this->fromemail=$fromEmail;
        $this->fromname=$fromName;
        $this->toname=$toName;
        $this->toemail=$toEmail;
        
    }
      
    public function SendMail():bool{
        
        //instantiate the mailer
        $mail = new PHPMailer();
        
        //setup PHPMailer properties
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'leanneoulton@gmail.com';
        $mail->Password = '0ulton2016';
        $mail->SMTPSecure = 'ssl';
        
        $mail->From = $this->fromemail;
        $mail->FromName = $this->fromname;
        $mail->addAddress($this->toemail, $this->toname);
        
        if(!empty ($this->replytoemail)){
            $mail->addReplyTo($this->replytoemail, $this->replytoname);
            
        }
        $mail->isHTML(true);
        $mail->Subject = $this->mailsubject;
        $mail->Body = $this->messagehtml;
        $mail->AltBody = $this->messagetext;
        
        //Send the email
        if($mail->send()){
            return true;
        }else{
            return false;
        }
                
        
    }
    
}
