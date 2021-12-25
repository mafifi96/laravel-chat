$(function(){

    messages();
    setInterval(messages, 1000);

    var sc = function(){

        const chat = document.getElementById("messages");
    
        chat.scrollTop = chat.scrollHeight - chat.clientHeight;
        
    };

setTimeout(sc , 2000);    
    
    function messages() {

        var friend = $("#send").data("to");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "POST",
            url: "/ajax-messages",
            data: {
                friend: friend
            },
            success: function (data) {

                get_history(data);
                
            },
            error: function (error) {
                document.write(error);
                console.log(error)
            }

        });
    }


    function get_history(messages) {

        let auth = $("#send").data("from");
        var data = '';

        messages.forEach(message => {

            if (message.to == auth) {
                
                data += "<div class='p-1  mt-3 text-left'><span class='rounded bg-light shadow shadow-sm shadow-light p-2'>" + message.message + "</span></div>";
            } else {
                
                data += "<div class='p-1 mt-3 text-right '><span class='rounded bg-light shadow shadow-sm shadow-light p-2'>" + message.message + "</span></div>";

            }
        });

        $(".messages").html(data);

    }


    $("#send").click(function (e) {

        e.preventDefault();

        var friend = $(this).data("to");

        var message = $("#message").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            method: "POST",
            url: "/send",
            data: {
                to: friend,
                message: message
            },
            success: function (response) {
                $("#message").val("");
                messages();
                setTimeout(sc,1000);
                                 
            },
            error: function (error) {
                
                console.log(error)
            }

        });


    });


});