$('.category').find('.interaction').find('.editajax').on('click', function(event){
    //console.log("Worksss");
    event.preventDefault();
    var editcat = event.target.parentNode.parentNode.firstChild.textContent;
    $('#nameEdit').val(editcat);

    $('#edit-category-modal').modal();
});
