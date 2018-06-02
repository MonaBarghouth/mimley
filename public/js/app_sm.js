var postId=0;
var postBodyElement=null;
// $('.post').find('.interaction').find('.delete').on('click',function() {
// alert("This post will be deleted and you won't be able to find it anymore!!");
// });alert("This post will be deleted and you won't be able to find it anymore!!");
document.getElementById("edit").addEventListener("click",EditPost);

function EditPost() {
    event.preventDefault();
    postBodyElement=event.target.parentNode.parentNode.parentNode.parentNode.parentNode.childNodes[3];

    // postBodyElement=event.target.parentNode.parentNode.childNodes[1];
    var postBody=postBodyElement.textContent;
    postId=event.target.parentNode.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
      console.log(postId);
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
}

document.getElementById("modal-save").addEventListener("click",SaveEditPost);

function SaveEditPost () {
    event.preventDefault();

    $.ajax({
        method:'POST',
        url:url,
        data:{body:$('#post-body').val(), postId: postId ,_token:token}
    })
        .done(function(msg){
            console.log(postBodyElement.innerHTML+url);
            postBodyElement.innerHTML= msg['new_body'];
            // $(postBodyElement).text(msg['new_body']);
            $('#edit-modal').modal('hide');

        });

}


// document.getElementById("do_comment").addEventListener("click",ViewToComment);

function ViewToComment () {
    event.preventDefault();
    // console.log("dddddddddddd");

    event.target.nextElementSibling.style.display = 'block';
}





$('.post').find('.interaction').find('.edit').on('click',function(){
    event.preventDefault();
    postBodyElement=event.target.parentNode.parentNode.childNodes[3];
    var postBody=postBodyElement.textContent;
    postId=event.target.parentNode.parentNode.dataset['postid'];
      // console.log(postBody);
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});


// $('#modal-save').on('click',function(){
//     $.ajax({
//         method:'POST',
//         url:url,
//         data:{body:$('#post-body').val(), postId: postId ,_token:token}
//     })
//         .done(function(msg){
//             console.log(JSON.stringify(msg)+url);
//             $(postBodyElement).text(msg['new_body']);
//             $('#edit-modal').modal('hide');
//
//         });
//
// });
$('.action').on('click',function (event) {
    event.preventDefault();
    postId=event.target.parentNode.parentNode.dataset['postid'];
    var isAction=event.target.dataset['action'];

    $.ajax({
        method:'POST',
        url:urlaction,
        data:{isAction:isAction, postId: postId ,_token:token}
    })
        .done(function(){
          //  console.log(isAction);

          if(isAction==1) {
              if (event.target.innerText == 'You Like it') event.target.innerText = 'Like';
              else event.target.innerText = 'You Like it';
              event.target.nextElementSibling.innerText='Love';
              event.target.nextElementSibling.nextElementSibling.innerText='Smile';
          }else if(isAction==2) {
                if (event.target.innerText == 'You Love it') event.target.innerText = 'Love';
                else event.target.innerText = 'You Love it';
              event.target.nextElementSibling.innerText='Smile';
              event.target.previousElementSibling.innerText='Like';


          }else   {
              if (event.target.innerText == 'You Smile it') event.target.innerText = 'Smile';
              else event.target.innerText = 'You Smile it';
              event.target.previousElementSibling.innerText='Love';
              event.target.previousElementSibling.previousElementSibling.innerText='Like'
          }


        });

});





$('.post').find('.interaction').find('.do_comment').on('click',function(event){
    event.preventDefault();
    event.target.nextElementSibling.style.display = 'block';
  //   var isComment=event.target.dataset['add_comment'];


    // postBodyElement=event.target.parentNode.parentNode.childNodes[3];
    // var postBody=postBodyElement.textContent;
    // postId=event.target.parentNode.parentNode.dataset['postid'];
    // //   console.log(postBody);
    // $('#post-body').val(postBody);
    // $('#edit-modal').modal();
});

