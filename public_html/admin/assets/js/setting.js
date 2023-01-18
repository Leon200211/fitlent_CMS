var setting = {
    ajaxMethod: 'POST',


    update: function (){

        // serialize - собирает все данные формы по ее id
        var formData =  $('#settingForm').serialize();

        $.ajax({
            url: '/admin/settings/update/',
            type: this.ajaxMethod,
            data: formData,
            beforeSend: function () {

            },
            success: function (result){
                console.log(result);
            }
        });

    }

};

