// 以下是 jQuery 相关的 一些 functions

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






// 以下是 常规javascript 的一些 functions

// 在 "受保人是否超过60岁" 时 选 "是" 以后，显示新信息 的代码
function unhide_60(id){
    document.getElementById(id).style.display="block";
}

// 在 "受保人是否超过60岁" 时 选 "否" 以后，隐藏新信息 的代码
function rehide_60(id){
    document.getElementById(id).style.display="none";
}


// 尝试带参数的functions
  
// function unhide_60_para(id){
//     $(id).css({display:"block"});
// }
