$(document).ready(function(){
            $('#listEq').click(function() {
                
                 $('#dash_equi').fadeIn(500) && $('#deportistas').fadeOut(300) && $('#cronoini').fadeOut(500) && $('#dash_ini').fadeIn(300) /*&& $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300)*/;
            })
            $('#dep_tistas').click(function() {
                
                 $('#deportistas').fadeIn(500) && $('#dash_equi').fadeOut(300) && $('#cronoini').fadeOut(300) & $('#dash_ini').fadeOut(300) /*&&& $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300)*/;
            })
            $('#partido').click(function() {
                
                 $('#cronoini').fadeIn(500) && $('#dash_equi').fadeOut(300) && $('#deportistas').fadeOut(300) && $('#dash_ini').fadeOut(300) /*&& $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300)*/;
            })
            /*$('#regservicio').click(function() {
                
                 $('#regiservicio').fadeIn(500) && $('#listproveedor').fadeOut(300) && $('#listempleados').fadeOut(300) && $('#dashanalisis').fadeOut(300) && $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300);
            })
            $('#genpago').click(function() {
                
                 $('#generpago').fadeIn(500) && $('#listproveedor').fadeOut(300) && $('#listempleados').fadeOut(300) && $('#dashanalisis').fadeOut(300) && $('#regiservicio').fadeOut(300) && $('#genernomina').fadeOut(300);
            })
            $('#gennomina').click(function() {
                
                 $('#genernomina').fadeIn(500) && $('#listproveedor').fadeOut(300) && $('#listempleados').fadeOut(300) && $('#dashanalisis').fadeOut(300) && $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300);
            })*/
      })
