//Delay load anim for admin pannel
window.onload=function (){
 document.getElementById('admin_loader').style.display="none";
 document.getElementById('admin_content').style.display="block";
}

//The visible and unvisible part for admin page
let divs = ["Menu","Menu1", "Menu2", "Menu3", "Menu4","Menu5", "Menu6", "Menu7", "Menu8", "Menu9","Menu10"];
let visibleDivId = null;
function toggleVisibility(divId) {
  if(visibleDivId === divId) {
    //visibleDivId = null;
  } else {
    visibleDivId = divId;
  }
  hideNonVisibleDivs();
}
function hideNonVisibleDivs() {
  let i, divId, div;
  for(i = 0; i < divs.length; i++) {
    divId = divs[i];
    div = document.getElementById(divId);
    if(visibleDivId === divId) {
      div.style.display = "block";
    } else {
      div.style.display = "none";
    }
  }
}


//Package edit show in form (grabing data from the table and showing in input field)
$(document).on('click', '.pack_edit', function() {
  let _this = $(this).parents('tr');
  $('#pack_id').val(_this.find('.id').text());
  $('#pack_name').val(_this.find('.packagename').text());
  $('#pack_range').val(_this.find('.packagespeed').text());
  $('#pack_type').val(_this.find('.packageactivity').text());
  $('#pack_tag').val(_this.find('.packagecode').text());
  $('#pack_cost').val(_this.find('.packagecosting').text());
});

//admin edit show in form (grabing data from the table and showing in input field)
$(document).on('click', '.admin_edit', function() {
  let _this = $(this).parents('tr');
  $('#admin_id').val(_this.find('.id').text());
  $('#admin_area').val(_this.find('.adminarea').text());
});

//User edit show in form (grabing data from the table and showing in input field)
$(document).on('click', '.user_edit', function() {
  let _this = $(this).parents('tr');
  $('#user_id').val(_this.find('.id').text());
  $('#user_mail').val(_this.find('.usermail').text());
  $('#user_pass').val(_this.find('.userpass').text());
  $('#user_package').val(_this.find('.userpackage').text());
});

//Admin profile edit show in form (grabing data from the table and showing in input field)
$(document).on('click', '.adminProfile_edit', function() {
  let _this = $(this).parents('div');
  $('#adminprofile_id').val(_this.find('.id').text());
  $('#admin_name').val(_this.find('.adminsname').text());
  $('#admin_pic').val(_this.find('.adminspic').text());
});

//User profile edit show in form (grabing data from the table and showing in input field)
$(document).on('click', '.userProfile_edit', function() {
  let _this = $(this).parent.parentNode('div');
  $('#userprofile_id').val(_this.find('.userid').text());
  $('#users_name').val(_this.find('.usersname').text());
  $('#users_review').val(_this.find('.usersreview').text());
  $('#users_img').val(_this.find('.usersimg').text());
});


