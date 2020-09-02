
var adsMessForm = document.querySelector('#addMessForm');


if (adsMessForm != null) {
  adsMessForm.onsubmit = function(sobit){


  sobit.preventDefault();
  var komu = adsMessForm.querySelector("input[name='komu_user_id']");
  var ot = adsMessForm.querySelector("input[name='ot_user_id']");
  var text = adsMessForm.querySelector("textarea[name='message']");
  


  var data = "sub=1" + 
      "&komu_user_id=" + komu.value + 
      "&ot_user_id=" + ot.value + 
      "&message=" + text.value;


      console.log(data);

  var ajax = new XMLHttpRequest();

    ajax.open("POST", adsMessForm.action, false);

    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );

    ajax.send(data);
    
    var listMess = document.querySelector("#chatAjax");
    listMess.innerHTML = ajax.response;
    console.dir(ajax.response);
    adsMessForm.reset();
    
  }
}