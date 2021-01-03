var sup=document.querySelectorAll(".supprimer");
sup.forEach(element => {
    element.addEventListener("click",function(e){
        if(confirm("voulez vous vraiment supprimer cet article definitivement dans votre base de données?")){
            
        }
        else{
            e.preventDefault();
        }
    });
});
 