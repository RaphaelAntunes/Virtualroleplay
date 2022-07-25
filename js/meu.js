        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
        var box1 = document.getElementById('box1');
        var drop1 = document.getElementById('drop1');


        $(box1).click(function() {
            $(drop1).toggleClass("rotatedrop");
        });
        var box2 = document.getElementById('box2');
        var drop2 = document.getElementById('drop2');


        $(box2).click(function() {
            $(drop2).toggleClass("rotatedrop");
        });
        var box3 = document.getElementById('box3');
        var drop3 = document.getElementById('drop3');


        $(box3).click(function() {
            $(drop3).toggleClass("rotatedrop");
        });

        var grid = document.getElementById('sidebarCollapse');
        var bar = document.getElementById('bar');
        $(grid).click(function() {
            $(bar).toggleClass("bar");
        });

        var barra = document.getElementById('sidebarCollapse');
        var content = document.getElementById('content');
        $(barra).click(function() {
            $(content).toggleClass("retrait");
        });

        // BUTTON DESABLE FORM



        document.getElementById("button-desable-form").addEventListener("click", event => {
            event.preventDefault()

            location.href = 'https://mail.google.com/mail/u/0/#inbox'

        });

        // BUTTON DESABLE FORM