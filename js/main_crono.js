$(document).ready(function(){
            $('#crono').click(function() {
                
                 $('#cronoini').fadeIn(500) && $('#cronoregistro').fadeOut(300) && $('#crono_arbitro').fadeOut(300) /*&& $('#genernomina').fadeOut(300) && $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300)*/;
            })
            $('#crearcrono').click(function() {
                
                 $('#cronoregistro').fadeIn(500) && $('#cronoini').fadeOut(300) && $('#crono_arbitro').fadeOut(300) /*&& $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300)*/;
            })
            $('#asigarbitro').click(function() {
                
                 $('#crono_arbitro').fadeIn(500) && $('#cronoregistro').fadeOut(300) && $('#cronoini').fadeOut(300) /*&& $('#regiservicio').fadeOut(300) && $('#generpago').fadeOut(300) && $('#genernomina').fadeOut(300)*/;
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