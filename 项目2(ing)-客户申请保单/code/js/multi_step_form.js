// ������ jQuery ��ص� һЩ functions

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






// ������ ����javascript ��һЩ functions

// �� "�ܱ����Ƿ񳬹�60��" ʱ ѡ "��" �Ժ���ʾ����Ϣ �Ĵ���
function unhide_60(id){
    document.getElementById(id).style.display="block";
}

// �� "�ܱ����Ƿ񳬹�60��" ʱ ѡ "��" �Ժ���������Ϣ �Ĵ���
function rehide_60(id){
    document.getElementById(id).style.display="none";
}


// ���Դ�������functions
  
// function unhide_60_para(id){
//     $(id).css({display:"block"});
// }
