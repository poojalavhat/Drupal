/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function($){
    $.fn.loggy = function(data){
        console.log(data);
        $(".result_message").append("Hello" +data);
    };
})(jQuery);

