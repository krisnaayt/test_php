$(function(){$("#login").validate({ignore:":hidden",rules:{user_id:{required:!0}},errorPlacement:function(n,o){n.appendTo(o.closest(".controls"))},submitHandler:function(n){const o=$("#loginButton").text();disableButton("#loginButton");var t=$(n).serialize();$.ajax({type:"get",url:window.location.origin+"/auth/doLogin",data:t}).done(function(n){enableButton("#loginButton",o),swal("success","Success","You have login","/")}).fail(function(){enableButton("#loginButton",o),swalErrorServer()})}})});
