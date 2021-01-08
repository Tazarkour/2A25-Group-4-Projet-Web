function test() {
//1.saisie de control sur nom et prenom


//3.sasie de control sur numero de telephone


    // 4.sasie de control sur profession



    //saise de control sur style de musique
    var x=document.getElementById('email').value;
    var atposition=x.indexOf("@");
    var dotposition=x.lastIndexOf(".");
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
        alert("Please enter a valid e-mail address ");
        return false;}



}











