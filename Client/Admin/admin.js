var edit1;
var edit2;


$.ajax({
    url:"http://localhost/Serveur/TDW/Serveur/View.php",
    type:'POST',
    dataType:'text',
    data:JSON.stringify({
        service:"Vlogin",
        id_user: localStorage.getItem("id"),
        hashcode: localStorage.getItem("code")
    }),
    success:(Data)=>{ 
        if(JSON.parse(Data)['etat']==false){
            location.replace("../Login/Login.html");
        }
    },   
});

 $(document).ready(function(){

    $("#Deconnect").click(function(){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"deconnect",
                id_user: localStorage.getItem("id")         
            })   
        });
        localStorage.removeItem('id');
        localStorage.removeItem('code');
        location.replace("../Login/Login.html");
    });

    

    function AddT1(){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"listT1"        
            }),
            success:(Data)=>{
                var listT1= JSON.parse(Data);
                $(".bd1").html("<tr> <th scope='row'> Somme</th> <td class='somme'></td>  <td class='somme'></td>   <td id='add11' colspan='2'> <svg id='add' class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'></path></svg></td> </tr>");
                $("#add11").click(function(){
                    $(".add1").show(1000);   
                 });
                listT1.forEach(element => {
                    let th = $("<th></th>").text(element['Nom_culture']).attr("scope","row");                
                    let col1 = $("<td></td>").text(element['Superficie']).addClass("valTdT11");  
                    let col2 = $("<td></td>").text(element['Production']).addClass("valTdT12");
                    let supicon ="<svg id='supicon' class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg>"
                    let idsup="s"+element['Id_culture'];
                    let supprimer = $("<td></td>").html(supicon).attr('id', idsup);
                    let editicon = "<svg id='editicon' class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path></svg>"
                    let idedit="e"+element['Id_culture'];
                    let modifier  = $("<td></td>").html(editicon).attr('id', idedit);   
                    $(".bd1").children("tr").last().before( $("<tr></tr>").append(th,col1,col2,supprimer,modifier));
                    
                    $("#"+idsup).click(function(){
                        let sup= parseInt($(this).attr('id').substring(1));
                        supEelemntT1(sup,AddT1);
                    });
                    
                    $("#"+idedit).click(function(){
                        edit1 = parseInt($(this).attr('id').substring(1));
                        $(".mod1").show(1000);
                        $(".edit_culture").val(element['Nom_culture']);
                        $(".edit_Superficie").val(element['Superficie']);
                        $(".edit_Production").val(element['Production']);
                    });
                });
                AddSomme()
            } 
        });
    }

    $(".edit1").submit(function(e){ 
        e.preventDefault();
        editEelemntT1(edit1,$(".edit_culture").val(),$(".edit_Superficie").val(),$(".edit_Production").val(),AddT1);
    });

    $("#canceledit1").click(function(){
        $(".mod1").hide(500);
    });


    function AddT2(){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"listT2"        
            }),
            success:(Data)=>{
                var listT2= JSON.parse(Data);
                $(".bd2").html("<tr><th scope='row'> Somme</th><td class='somme'></td>  <td id='add22' colspan='2'> <svg id='add' class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 6v6m0 0v6m0-6h6m-6 0H6'></path></svg></td></tr>");
                $("#add22").click(function(){
                    $(".add2").show(1000);   
                 });
                listT2.forEach(element => {
                    let th = $("<th></th>").text(element["Nom_animal"]).attr("scope","row");                
                    let col = $("<td></td>").text(element["Nombre_tete"] ).addClass("valTdT2");      
                    let supicon ="<svg id='supicon' class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg>"
                    let idsup="ss"+element["Id_elevage"];
                    let supprimer = $("<td></td>").html(supicon).attr('id', idsup);
                    let editicon = "<svg id='editicon' class='w-6 h-6' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z'></path></svg>"
                    let idedit="ee"+element["Id_elevage"];
                    let modifier  = $("<td></td>").html(editicon).attr('id', idedit);           
                    $(".bd2").children("tr").last().before($("<tr></tr>").append(th,col,supprimer,modifier))
                     
                    $("#"+idsup).click(function(){
                        let sup= parseInt($(this).attr('id').substring(2));
                        supEelemntT2(sup,AddT2);
                    });


                    $("#"+idedit).click(function(){
                        edit2 = parseInt($(this).attr('id').substring(2));
                        $(".mod2").show(1000);
                        $(".edit_Espece").val(element["Nom_animal"]);
                        $(".edit_Nombre").val(element["Nombre_tete"]);                                      
                    });
                });
                AddSomme();
            }     
        });
    }


    $(".edit2").submit(function(e){ 
        e.preventDefault();
        editEelemntT2(edit2,$(".edit_Espece").val(),$(".edit_Nombre").val(),AddT2);
    });

    $("#canceledit2").click(function(){
        $(".mod2").hide(500);
    });



    AddT1();
    AddT2();


    $(".add1").submit(function(e){ 
        e.preventDefault();
        let culture = $(".culture").val();
        $(".culture").val("")
        let Superficie = $(".Superficie").val();
        $(".Superficie").val("")
        let Production = $(".Production").val();
        $(".Production").val("")
        inserEelemntT1(culture,Superficie,Production,AddT1); 
     });

     $("#canceladd1").click(function(){
       $(".add1").hide(500);

    });

  
     $(".add2").submit(function(e){ 
        e.preventDefault();
        let Espece = $(".Espece").val();
        $(".Espece").val("")
        let Nombre = $(".Nombre").val();
        $(".Nombre").val("")
        inserEelemntT2(Espece,Nombre,AddT2);
     });

     $("#canceladd2").click(function(){
        $(".add2").hide(500);
    });




     

    function CalculeSomme(Col){
        var somme = 0;
        var col = $("."+Col);
        var j = 1;
        for(let i = 0 ; i<col.length ; i++){
           j = col.eq(i).attr('rowspan');
           if(j==null) j=1;
           somme+=j*parseInt(col.eq(i).text().replace(/ /g,""))
        }   
        return somme;
     }  
     
     function AddSomme(){
        $(".somme").eq(0).text(CalculeSomme("valTdT11"));
        $(".somme").eq(1).text(CalculeSomme("valTdT12"));
        $(".somme").eq(2).text(CalculeSomme("valTdT2"));
     }
  
    

     function inserEelemntT1(c,s,p,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"inserEelemntT1",
                Nom_culture:c,
                Superficie:s,
                Production:p
            }),
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }  
        });
     }

     function inserEelemntT2(e,n,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"inserEelemntT2",
                Nom_animal:e,
                Nombre_tete:n
            }), 
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }      
        });
    }

    function supEelemntT1(n1,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"supEelemntT1",
                num_sup_culture:n1
            }),  
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }    
        });
    }

    function supEelemntT2(n2,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"supEelemntT2",
                num_sup_Espece:n2
            }),
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }     
        });
    }

    function editEelemntT1(a1,b1,c1,d1,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"editEelemntT1",
                num_edit_culture:a1,
                edit_culture:b1,
                edit_Superficie:c1,
                edit_Production:d1
            }),
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }      
        });
    }

    function editEelemntT2(a2,b2,c2,callfunction){
        $.ajax({
            url:"http://localhost/Serveur/TDW/Serveur/View.php",
            type:'POST',
            dataType:'text',
            data:JSON.stringify({
                service:"editEelemntT2",
                num_edit_Espece:a2,
                edit_Espece:b2,
                edit_Nombre :c2,
            }), 
            success:(res)=>{
                callfunction();
            }, 
            error:(res)=>{
               console.log(res);
            }     
        });
    }


});