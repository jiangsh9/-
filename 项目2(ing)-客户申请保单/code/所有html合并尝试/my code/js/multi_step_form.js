$(document).ready(function() {

    /*---------------------------------------------------------*/
    $(".next_btn").click(function() {
        $(this).parent().next().fadeIn('slow');
        $(this).parent().css({
            'display': 'none'
        });
    });

    $(".pre_btn").click(function() {
        $(this).parent().prev().fadeIn('slow');
        $(this).parent().css({
            'display': 'none'
        });
    });

});

function unhide_60(id){
//   var insured_elder_id=document.getElementById(id);
//   insured_elder_id.style.display="block";
    document.getElementById(id).style.display="block";
}

function rehide_60(id){
    document.getElementById(id).style.display="none";
}


// 尝试带参数的functions
  
// function unhide_60_para(id){
//     $(id).css({display:"block"});
// }
