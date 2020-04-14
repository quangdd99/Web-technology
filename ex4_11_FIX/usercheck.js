class user_configuration{
    constructor(){
        this.username=document.getElementById("username");
        this.mail=document.getElementById("mail");
        this.tel=document.getElementById("tel");
        this.submit=document.getElementById("submit");
        this.check();
    }

    telephoneCheck(str) {
        var key1=/^([1] |)[0-9][0-9][0-9]-[0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/g;
        var key2=/^([1] ||[1])(\([0-9][0-9][0-9]\))[0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/g;
        var key3=/^([1] |)(\([0-9][0-9][0-9]\)) [0-9][0-9][0-9]-[0-9][0-9][0-9][0-9]$/g;
        var key4=/^([1] |)[0-9][0-9][0-9] [0-9][0-9][0-9] [0-9][0-9][0-9][0-9]$/g;
        var key5=/^([1] |)[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/g;
        var key6=/^[1] [0-9][0-9][0-9] [0-9][0-9][0-9] [0-9][0-9][0-9][0-9]$/g;
        if(key1.test(str)||key2.test(str)||key3.test(str)||key4.test(str)||key5.test(str)||key6.test(str))
            {
                document.getElementById("tel_check").innerHTML="";
            return true;
        }
        else {
            document.getElementById("tel_check").innerHTML="Must be 1 xxx xxx xxxx with x is number";
            return false;
        }
    }
    
    mailCheck(str){
        var mail_regex=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/g;
        if(mail_regex.test(str)){
            document.getElementById("mail_check").innerHTML="";
            return true;
        }
        else {
            document.getElementById("mail_check").innerHTML="Mustbe someone@somemail.domain";
            return false;}
    }
    
    userCheck(str){
        var username_regex=/^[a-zA-Z0-9_-]{3,15}$/g;
        if(username_regex.test(str)){
            document.getElementById("user_check").innerHTML="";
            return true;
        }
        else {
            document.getElementById("user_check").innerHTML="User name must 3-15 Alphabet, number and _ character";
            return false;
        }
    }

    submitCheck(){
        if(this.userCheck(this.username.value)&&this.mailCheck(this.mail.value)&&this.telephoneCheck(this.tel.value)){
            document.getElementById("submit_check").innerHTML="You've entered true value... coming soon...";
        }
        else document.getElementById("submit_check").innerHTML="Please enter value as true form";
    }

    check(){
        this.username.addEventListener("keyup",()=>this.userCheck(this.username.value));
        this.mail.addEventListener("keyup",()=>this.mailCheck(this.mail.value));
        this.tel.addEventListener("keyup",()=>this.telephoneCheck(this.tel.value));
        this.submit.addEventListener("mouseup",()=>this.submitCheck());

    }

}

var g=new user_configuration();

