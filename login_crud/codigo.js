$('#formLogin').submit(function(e){
   e.preventDefault();
   var usuario = $.trim($("#usuario").val());    
   var password =$.trim($("#password").val());    
    
   if(usuario.length == "" || password == ""){
      Swal.fire({
          type:'warning',
          title:'Debe ingresar un usuario y/o password',
      });
      return false; 
    }else{
        $.ajax({
           url:"bd/login.php",
           type:"POST",
           datatype: "json",
           data: {usuario:usuario, password:password}, 
           success:function(data){               
               if(data == "null"){
                   Swal.fire({
                       type:'error',
                       title:'Usuario y/o password incorrecta',
                   });
               }else{
                Swal.fire({
                    type:'success',
                    title:'¡Conexión exitosa!',
                    showConfirmButton: false,
                    //Oculto el boton de OK
                    timer: 1500,
                //Seteo un tiempo en pantalla antes de cerrar el alert
               }).then(function () {
                 window.location.href = "../inicio-admin.php";
                //Redirecciono al Index
                   })
                   
               }
           }    
        });
    }     
});