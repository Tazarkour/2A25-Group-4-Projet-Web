function test() {
//1.saisie de control sur nom et prenom


//3.sasie de control sur numero de telephone
    phone = window.document.getElementById('tel').value;
    console.log(phone);
    z = phone.length;
    console.log(z);
    if (z < 8) {
        alert('your phone number must include more than 8 numbers');
    }

    // 4.sasie de control sur profession
    var y = document.getElementById("lastname").value;
    console.log(y);
    if (y=='select')
    { alert ('select votre profession');}


    //saise de control sur style de musique
    var x=document.getElementById("email").value;
    var atposition=x.indexOf("@");
    var dotposition=x.lastIndexOf(".");
    if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){
        alert("Please enter a valid e-mail address ");
        return false;}



    }






