var tax=["votre développement est notre priorité","apprendre selon votre rythme","nous sommes là a votre écoute"];
var txt=document.querySelector(".al1");
var bo=0;
function ro(){
    var lon=tax[bo].length,jk=1;
    var op=0;
    var chainetxt=tax[bo];
    function ecrireText(){
      if(op<lon){
           txt.innerHTML+=chainetxt.substr(op,1);
           op++;
           setTimeout(ecrireText,50);
       }
       else{
        bo++
       }
    }
    function effecertext(){
     if(jk<=lon){
         txt.innerHTML=chainetxt.substr(0,lon-jk);
         jk++;
         setTimeout(effecertext,50);
     }
     else{;
         if(bo==3)
              bo=0;
       }
    }
    setTimeout(ecrireText,2000);
    setTimeout(effecertext,5000);
    setTimeout(ro,6500);
}
ro();

var pl=document.getElementById("new");
var affi=document.getElementById("toto");
pl.addEventListener("keyup",function(){
     var len=pl.value.length;
    // var n =len.search("/.com|.fr|.yahoo/");
    if(len<8 && len!=""){
        affi.innerHTML="ce champ ne peut contenir moins de 8 caracteres"
    }
    else{
        affi.innerHTML="";
    }
});