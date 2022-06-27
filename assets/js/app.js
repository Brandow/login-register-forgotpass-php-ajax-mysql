$(document).ready(function() {

    $('#btn-registro').on('click', function()
    {
        $('#form_login').css("display", "none");
        $('#form_registro').css("display", "block");

        const fadeout = document.querySelector('#form_registro');
        fadeout.classList.add('animate__animated', 'animate__fadeInRight');
        fadeout.addEventListener('animationend', () => {
            fadeout.style.setProperty('--animate-duration', '0.5s');
        });
    });

    $('#btn-login').on('click', function()
    {
        $('#form_login').css("display", "block");
        $('#form_registro').css("display", "none");

        const element = document.querySelector('#form_login');
        element.classList.add('animate__animated', 'animate__fadeInRight');
        element.addEventListener('animationend', () => {
            element.style.setProperty('--animate-duration', '0.5s');
        });
    });

    $('#btn-login2').on('click', function()
    {
        $('#form_esqsenha').css("display", "none");
        $('#form_login').css("display", "block");

        const element = document.querySelector('#form_login');
        element.classList.add('animate__animated', 'animate__fadeInRight');
        element.addEventListener('animationend', () => {
            element.style.setProperty('--animate-duration', '0.5s');
        });
    });

    $('#btn-esqsenha').on('click', function()
    {
        $('#form_esqsenha').css("display", "block");
        $('#form_login').css("display", "none");

        const element = document.querySelector('#form_esqsenha');
        element.classList.add('animate__animated', 'animate__fadeInRight');
        element.addEventListener('animationend', () => {
            element.style.setProperty('--animate-duration', '0.5s');
        });
    });

    $("#login-form").on('submit',(function(e) {
        e.preventDefault();       		
        $.ajax({
            url: "../../system/ajax.php?action=login",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(resp){
                if(resp=='ok')
                {
                    window.location.href = '../../admin.php';
                }
                else
                {
                    var notyf = new Notyf({duration: 5000});
                    notyf.error(resp);
                }
            }
        });
    }));

    $("#registro-form").on('submit',(function(e) {
        e.preventDefault();        		
        $.ajax({
            url: "../../system/ajax.php?action=cadastro",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(resp){
                if(resp=='ok')
                {
                    var notyf = new Notyf({duration: 3500});
                    notyf.success('Parabéns, sua conta foi criada');
                    setTimeout(function()
                    {
                        location.reload()
                    },3500)
                }
                else
                {
                    var notyf = new Notyf({duration: 5000});
                    notyf.error(resp);
                }
            }
        });
    }));

    $("#esqsenha-form").on('submit',(function(e) {
        e.preventDefault();        		
        $.ajax({
            url: "../../system/ajax.php?action=esqsenha",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(resp){
                if(resp=='ok')
                {
                    var notyf = new Notyf({duration: 5000});
                    notyf.success('Enviamos um e-mail com link de recuperação da sua senha');
                    setTimeout(function()
                    {
                        location.reload()
                    },6000)
                }
                else
                {
                    var notyf = new Notyf({duration: 5000});
                    notyf.error(resp);
                }
            }
        });
    }));

    $("#altsenha-form").on('submit',(function(e) {
        e.preventDefault();        		
        $.ajax({
            url: "../../system/ajax.php?action=altsenha",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success:function(resp){
                if(resp=='ok')
                {
                    var notyf = new Notyf({duration: 5000});
                    notyf.success('Sua senha foi alterada');
                    setTimeout(function()
                    {
                        window.location.href = '../../index.php';
                    },6000)
                }
                else
                {
                    var notyf = new Notyf({duration: 5000});
                    notyf.error(resp);
                }
            }
        });
    }));
    
});