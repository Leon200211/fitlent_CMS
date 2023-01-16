$('#redactor').redactor({
    imageUpload: '/ajax/redactor/core/uploadImage/',
    fileUpload: '/ajax/redactor/core/uploadFile/',
    plugins: ['table', 'video', 'source'],
    imagePosition: true,
    imageResizable: true
});