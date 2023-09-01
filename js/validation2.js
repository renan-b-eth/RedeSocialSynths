/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    $("#atualizarDados").validate({
        rules: {
            registeredName:{
               required: false,
               nowhitespace: true,
               minlength: 3
            },
            registeredLastName:{
               required: false,
               minlength: 4
            },
            registeredPassword: {
                required: true,
            },
            registeredPassword2: {
                required: true,
                equalTo: "#password"
            },

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
            registeredPassword: {
                required: "Por favor, digite uma senha."
            },
            registeredPassword2: {
                required: "Por favor, digite sua senha novamente.",
                equalTo: "Sua senha deve ser a mesma digitada anteriormente."
            },
        },
    });
});
