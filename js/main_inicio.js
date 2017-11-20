$(document).ready(function(){
            $('#inicio').click(function() {
                
                 $('#dash_ini').fadeIn(500) && $('#dash_equi').fadeOut(300) && $('#dash_table').fadeOut(300) /*&& $('#genernomina').fadeOut(300) && $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300)*/;
            })
            $('#listEq').click(function() {
                
                 $('#dash_equi').fadeIn(500) && $('#dash_ini').fadeOut(300) && $('#dash_table').fadeOut(300) /*&& $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300)*/;
            })
            /*$('#listprove').click(function() {
                
                 $('#listproveedor').fadeIn(500) && $('#dashanalisis').fadeOut(300) && $('#listempleados').fadeOut(300)&& $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300);
            })
            $('#regservicio').click(function() {
                
                 $('#regiservicio').fadeIn(500) && $('#listproveedor').fadeOut(300) && $('#listempleados').fadeOut(300) && $('#dashanalisis').fadeOut(300) && $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300);
            })
            $('#genpago').click(function() {
                
                 $('#generpago').fadeIn(500) && $('#listproveedor').fadeOut(300) && $('#listempleados').fadeOut(300) && $('#dashanalisis').fadeOut(300) && $('#regiservicio').fadeOut(300) && $('#genernomina').fadeOut(300);
            })
            $('#gennomina').click(function() {
                
                 $('#genernomina').fadeIn(500) && $('#listproveedor').fadeOut(300) && $('#listempleados').fadeOut(300) && $('#dashanalisis').fadeOut(300) && $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300);
            })*/
      })