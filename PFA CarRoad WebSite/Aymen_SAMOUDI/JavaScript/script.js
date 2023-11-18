function getElementsByAttribute(attribute, name)
{
    var matchingElements = [];
    var allElements = document.getElementsByTagName('*');
    for (var i = 0; i < allElements.length; i++)
        {
        if (allElements[i].getAttribute(attribute)===name)
        {
            matchingElements.push(allElements[i]);
        }
    }
    return matchingElements;
}
 
//fonction de mise à jour du total
function updateTotal() {
    var total = 0,
        tempEl, quantity, unitPrice, i, elemNumber;
 
    for(i = 1, elemNumber = document.getElementsByClassName("elm").length; i <= elemNumber; i++) {   
        tempEl = getElementsByAttribute("name","nbjour"+i)[0];
        quantity = tempEl.value;
        tempEl = getElementsByAttribute("name","amount"+i)[0];
        unitPrice = tempEl.value;
         
        total += quantity*unitPrice;
    }
     
    tempEl = document.getElementById("total");
    tempEl.innerHTML = "<p>total: "+total+"</p>"
};
 
var tempEl, i, elemNumber;
 
for(i = 1, elemNumber = document.getElementsByClassName("elm").length; i <= elemNumber; i++) {   
    tempEl = getElementsByAttribute("name","nbjour"+i)[0];
    tempEl.addEventListener("change", updateTotal, false);
}

//Sidebar
(function($) {

    "use strict";

    var fullHeight = function() {

        $('.js-fullheight').css('height', $(window).height());
        $(window).resize(function(){
            $('.js-fullheight').css('height', $(window).height());
        });

    };
    fullHeight();

    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);

        //Model Detail Popup
           $(document).ready(function(){
            $('.openPopup').on('click',function(){
                var dataURL = $(this).attr('data-href');
                $('.modal-body').load(dataURL,function(){
                    $('#myModal').modal({show:true});
                });
            }); 
        });

//Nombre de visiteurs/
 
 $(document).ready(function(){
    setInterval(function()
    {
        $.ajax
        ({
            type:'post', 
            url:'', 
            data:{get_online_visitor:"online_visitor",
        },
        success:function(response){
            if(response!="")
            {
                $("#online_visitor_val").html(reponse);
            }
            }
           });
        }, 10000)
});

//Filtree les objets avec jquery





//----------------------------------------------------------