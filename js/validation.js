/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    $("#dataRecorder").validate({
        rules: {
            registeredName:{
               required: true,
               nowhitespace: true,
               minlength: 3
            },
            registeredLastName:{
               required: true,
               minlength: 4
            },
            registeredEmail: {
                required: true,
                email: true
            },
            registeredPassword: {
                required: true,
            },
            registeredPassword2: {
                required: true,
                equalTo: "#password"
            },
            registeredNickname: {
                required: true,
                nowhitespace: true
            }
        },
        messages: {
            registeredName: {
                required: "Por favor, digite um nome.",
                nowhitespace: "Seu nome não pode conter espaço.",
                minlength: "Por favor, digite um nome com mais de 3 caracteres."
            },
            registeredLastName: {
                required: "Por favor, digite um sobrenome.",
                minlength: "Por favor, digite um sobrenome com mais de 4 caracteres."
            },
            registeredEmail: {
                required: "Por favor, digite um email.",
                email: "Por favor, digite um email <em>válido</em>."
            },
            registeredEmail: {
                required: "Por favor, digite um email.",
                email: "Por favor, digite um email <em>válido</em>."
            },
            registeredPassword: {
                required: "Por favor, digite uma senha."
            },
            registeredPassword2: {
                required: "Por favor, digite sua senha novamente.",
                equalTo: "Sua senha deve ser a mesma digitada anteriormente."
            },
            registeredNickname: {
                required: "Por favor, digite um nickname.",
                nowhitespace: "Seu nickname não pode conter espaço."
            }
        },
    });

    $("#validateEmail").validate({
        rules: {
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            email: {
                required: "<div style='position:relative; left:40px; top:3px;'>Por favor, digite o seu email.</div>",
                email: "<div style='position:relative; left:30px; top:3px;'>Por favor, digite um email <em>válido</em>.</div>"
            }
        },
    });

    $("#validatePassword").validate({
        rules: {
            password: {
                required: true
            }
        },
        messages: {
            password: {
                required: "<div style='position:relative; left:40px; top:3px;'>Por favor, digite uma senha.</div>"
            }
        },
    });
});
