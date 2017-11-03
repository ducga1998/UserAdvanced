$(document).ready(function() {
    
    $('#input-1').on("keyup input", function() {
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $('#result');
        if (inputVal.length) {
            $.get("./core/application/view/backend/BackendSearchSmartAJAX.php", {
                term: inputVal
            }).done(function(data) {
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else {
            resultDropdown.empty();
        }
    });

    // Set search input value on click of result item
    $(document).on("click", "#result span", function() {
        $("#input-1").val($(this).text());
        $(this).parent("#result").empty();
    });

var check = [];
$(".checkAll").click(function() {
    
             if ($(".checkboxclass").prop("checked") == false) {
                 $(".checkboxclass").prop("checked", true);
               
             } else {
                 $(".checkboxclass ").prop("checked", false);
             }
         });
$(document).on("click", ".btn-check", function() {
            check = $(this).attr("idcheck");
           console.log(check);
           $.ajax({
                type: "GET",
                url: "./core/application/view/backend/AcceptAJAX.php",

                data: {
                    'browse': check

                },
                cache: false,
                success: function(data) {

                }
            });
});
//xử lý phần select
$(document).on('click', '.btn-searchpost', function() {
    var valinput = $("#input-1").val();
   
   

   
    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/pagingAJAX.php",

        data: {
            'search': valinput
        },
        cache: false,
        success: function(data) {
            $(".wrapAjaxChange").html(data);

        }
    });
});
$(document).on('click', '.ClickPaging', function() {
    var pageTotal = $(this).attr("page");
    var page = $(this).attr("pageUser");
    var search=$("#input-1").val();
    console.log(page);

   
    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/pagingAJAX.php",

        data: {
            'page': page,
            'pageTotal': pageTotal,
            'search':search

        },
        cache: false,
        success: function(data) {
            $(".wrapAjaxChange").html(data);

        }
    });
});
$(document).on('click', '.ClickPagingCheck', function() {
    var pageTotal = $(this).attr("page");
    var page = $(this).attr("pageUser");
    console.log(pageTotal);

   
    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/pagingAJAX.php",

        data: {
            'pageCheck': page,
            'pageTotalCheck': pageTotal

        },
        cache: false,
        success: function(data) {
            $(".containerCheck").html(data);

        }
    });
});
$(document).on('click', '.btn-view-model', function() {
    var content = $(this).parent().text();
    var username = $(this).parent().parent().find(".nameUserPost").text();
    var category = $(this).parent().parent().find(".category").text();



    var content = content.replace("Detail", "");
    $(".ShowContent").html(content);
    $(".usernameinsert").text(username);
    $(".ShowCategory").html(category);

});
$('#input-1').on('keydown', function(e) {
    if (e.which == 13) {
        e.preventDefault();
        $('.btn-searchpost', 'body').trigger('click');
        $("#result").text("");
    }
});
//setup 
$(".hides").fadeOut();


//end setup
$(document).on("click", ".showConfession", function() {
    $(".hides").fadeOut();
    $(".Confession").fadeIn("slow");
    var pageTotal =5;
    var page = 1;
   

   
    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/pagingAJAX.php",

        data: {
            'page': page,
            'pageTotal': pageTotal,
            'search':""

        },
        cache: false,
        success: function(data) {
            $(".wrapAjaxChange").html(data);

        }
    });
});
$(document).on("click", ".Config", function() {
    $(".hides").fadeOut();
    $(".ConfigView").fadeIn("slow");

});
$(document).on("click", ".PostConfessions", function() {
    $(".hides").fadeOut();
    $(".PostConfession").fadeIn("slow");
   

});
$(document).on("click", ".Confession", function() {
    
    $("#result").text("");

});


$(document).on("click", ".CheckPost", function() {
    $(".hides").fadeOut();
    $(".CheckPostContainer").fadeIn("slow");

});
$(document).on("click", ".ShowPostHistory", function() {
    $(".hides").fadeOut();

    $(".PostHistory").fadeIn("slow");
});
$(document).on("click", ".ShowPostHistory", function() {
    // xóa đi cái cũ
    $(".hides").fadeOut();

    // thêm .show để nó hiển thị
    $(".PostHistory").fadeIn("slow");
});
$(document).on("click", ".GrantRight", function() {
    // xóa đi cái cũ
    $(".hides").fadeOut();

    // thêm .show để nó hiển thị
    $(".GrantUser").fadeIn("slow");
});
$(document).on("click",".InfoMation", function() {
    // xóa đi cái cũ
    $(".hides").fadeOut();
    
    // thêm .show để nó hiển thị
    $(".InfomationUser").fadeIn("slow");
});

$(document).on("click", ".btn-updateInfo", function() {
    var form = $('#FormUpdateInfoUser').serialize();
    console.log(form);
    var MailUser = $("[name='MailUser']").val();
    var idUser = $("[name='idUser']").val();
    var NameUser = $("[name='NameUser']").val();
    var NumberPhoneUser = $("[name='NumberPhoneUser']").val();
    var birthDay = $("[name='birthDay']").val();
    var GrantUser = $("[name='GrantUser']").val();

    var CountryUser = $("[name='CountryUser']").val();
    var StringArray = idUser + "." + NameUser + "." + NumberPhoneUser + "." + birthDay + "." + GrantUser + "." + CountryUser + "." + MailUser;



    /*  var formData = $(form).serialize(); */
    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/UpdateInfoUserAJAX.php",

        data: {
            'formData': StringArray

        },
        cache: false,
        success: function(data) {

        }
    });

});

/* event click btn-updateinfo */
$(document).on("click", ".btn-post", function(e) {
    /* id, UserName, Title,Content,view,Category */
    e.preventDefault();
    var StringArray = "";
    var StringCheck="";
    var arrayData = new Array();
    var arrayData2 = new Array();
    var j=0
    var i = 0;
    $('.checkCategory:checked').each(function() {
        check = $(this).attr("idcategory");
        arrayData2[j]=check;
        j++;
        
    });
   
    var data = $("#formPostConfession").serializeArray();

    data.forEach(function(e) {
        StringArray+=e.value+"*||*";
        i++;

    }, this);
   
    
    StringCheck= arrayData2.toString();
    console.log(StringArray);


    /*    var id = $(this).attr("iduser");
      var id_post = $(this).attr("id_post");

      var UserName = $(this).attr("username");
      var title = $("#TitleConfession").val();
      var Category = $("#Category").val();
      var content = $("#Content").val();
      var StringArray = id + "." + UserName + "." + title + "." + content + "." + Category + "." + id_post; */

    $a=$.ajax({
        type: "GET",
        url: "./core/application/view/backend/PostAJAX.php",

        data: {
            'StringArray': StringArray,
            'StringCheck':StringCheck

        },
        cache: false,
        success: function(data) {
          
            $(".success").addClass("alert").addClass("alert-success");
            $(".success").html(data);
            $(".TitleConfession").val("");
            $("#Category").val("");
            $("#Content").val("");
        }
    });
console.log($a);

});
$("#input-38").bind("focus",function(){
    $(".success").text("");
    $(".success").removeClass("alert").removeClass("alert-success");
});
$(document).on("click", ".btn-browse", function() {
    /* id, UserName, Title,Content,view,Category */
    if (confirm("You are sure to browse?")) {
        
        
        
                $('.containerCheck input:checked').each(function() {
                    check = $(this).attr("idcheck");
                    $(this).parent().parent().text("");
                    var Sez = check.toString();
                    console.log(Sez);
        
        
        
                    $.ajax({
                        type: "GET",
                        url: "./core/application/view/backend/AcceptAJAX.php",
        
                        data: {
                            'browse': Sez
        
                        },
                        cache: false,
                        success: function(data) {
        
                        }
                    });
        
                });
            }


});
$(document).on("click", ".btn-delete", function() {
    /* id, UserName, Title,Content,view,Category */
    if (confirm("You are sure to delete?")) {
        
        
        
                $('.containerCheck input:checked').each(function() {
                    check = $(this).attr("idcheck");
                    $(this).parent().parent().text("");
                    var Sez = check.toString();
                    console.log(Sez);
        
        
        
                    $.ajax({
                        type: "GET",
                        url: "./core/application/view/backend/AcceptAJAX.php",
        
                        data: {
                            'DeletePost2': Sez
        
                        },
                        cache: false,
                        success: function(data) {
        
                        }
                    });
        
                });
            }

});
$(document).on("click", ".btnDelete", function() {
    /* id, UserName, Title,Content,ciew,Category */
    var id = $(this).attr("id");
    console.log(id);


    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/DeleteInfoUserAJAX.php",

        data: {
            'id_delete': id

        },
        cache: false,
        success: function(data) {

        }



    });
    /*  $(this).parent().parent().html(""); */


});

/* code  cho select category */
$('#selectCategory').change(function() {
    var element = $(this);
    var SelectName = element.val();
    console.log("test");

    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/AcceptAJAX.php",

        data: {
            'selectName': SelectName

        },
        cache: false,
        success: function(data) {

            $("#SubSelectCategory").html(data);

        }



    });

});

function clickOption(id) {
    console.log(id);
}
$(".clickOption").focus(function() {
    var id = $(this).attr("idcategory");
    console.log(id);
});
$('[data-toggle="tooltip"]').tooltip(); 


$('#AddCategory').change(function() {
    var element = $(this);
    var SelectName = element.val();
    var id = element.attr("idcategory");
    // get attr option khi change select
    var option = $('option:selected', this).attr('idcategory');
    console.log(option);

    $.ajax({
        type: "GET",
        url: "./core/application/view/backend/AcceptAJAX.php",

        data: {
            'selectName': option

        },
        cache: false,
        success: function(data) {

            $("#SubAddCategory").html(data);

        }



    });
   
      

});


});

//code smart search input fitler user name post confession
