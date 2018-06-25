var frmvalidator  = new Validator("register");
frmvalidator.EnableOnPageErrorDisplay();
frmvalidator.EnableMsgsTogether();
frmvalidator.addValidation("name","req","Please provide your name");
frmvalidator.addValidation("email","req","Please provide your email address");
frmvalidator.addValidation("email","email","Please provide a valid email address");
frmvalidator.addValidation("username","req","Please provide a username");
frmvalidator.addValidation("password","req","Please provide a password");

function RegisterUser()
{
    if(!isset($_POST['submitted']))
    {
       return false;
    }
    
    $formvars = array();
    
    if(!$this->ValidateRegistrationSubmission())
    {
        return false;
    }
    
    $this->CollectRegistrationSubmission($formvars);
    
    if(!$this->SaveToDatabase($formvars))
    {
        return false;
    }
    
    if(!$this->SendUserConfirmationEmail($formvars))
    {
        return false;
    }

    $this->SendAdminIntimationEmail($formvars);
    
    return true;
}

function SaveToDatabase(&$formvars)
   {
       if(!$this->DBLogin())
       {
           $this->HandleError("Database login failed!");
           return false;
       }
       if(!$this->Ensuretable())
       {
           return false;
       }
       if(!$this->IsFieldUnique($formvars,'email'))
       {
           $this->HandleError("This email is already registered");
           return false;
       }
       
       if(!$this->IsFieldUnique($formvars,'username'))
       {
           $this->HandleError("This UserName is already used. Please try another username");
           return false;
       }        
       if(!$this->InsertIntoDB($formvars))
       {
           $this->HandleError("Inserting to Database failed!");
           return false;
       }
       return true;
   }